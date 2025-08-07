<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorResource\Pages;
use App\Models\Visitor;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class VisitorResource extends Resource
{
    protected static ?string $model = Visitor::class;
    protected static ?string $navigationIcon = 'heroicon-o-eye';
    protected static ?string $navigationLabel = 'Visitors';
    protected static ?string $navigationGroup = 'Analytics';
    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Visit Time')
                    ->dateTime('M j, Y H:i')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->searchable()
                    ->copyable(),

                Tables\Columns\TextColumn::make('page_visited')
                    ->label('Page')
                    ->searchable()
                    ->formatStateUsing(function (string $state): string {
                        return $state === '/' ? 'Home' : ucfirst(str_replace(['/', '-'], [' ', ' '], $state));
                    }),

                Tables\Columns\TextColumn::make('country')
                    ->label('Country')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Local' => 'gray',
                        'Unknown' => 'gray',
                        default => 'success',
                    }),

                Tables\Columns\TextColumn::make('user_agent')
                    ->label('Browser')
                    ->limit(50)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('referer')
                    ->label('Referer')
                    ->limit(30)
                    ->placeholder('Direct')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('country')
                    ->options([
                        'Egypt' => 'Egypt',
                        'USA' => 'USA',
                        'UK' => 'UK',
                        'Germany' => 'Germany',
                        'France' => 'France',
                        'Local' => 'Local',
                        'Unknown' => 'Unknown',
                    ]),

                SelectFilter::make('page_visited')
                    ->label('Page')
                    ->options([
                        '/' => 'Home',
                        '/projects' => 'Projects',
                        '/about' => 'About',
                        '/contact' => 'Contact',
                        '/skills' => 'Skills',
                        '/experiences' => 'Experiences',
                    ]),

                Filter::make('today')
                    ->label('Today')
                    ->query(fn(Builder $query): Builder => $query->whereDate('created_at', Carbon::today())),

                Filter::make('week')
                    ->label('This Week')
                    ->query(fn(Builder $query): Builder => $query->whereBetween('created_at', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek()
                    ])),

                Filter::make('month')
                    ->label('This Month')
                    ->query(fn(Builder $query): Builder => $query->whereMonth('created_at', Carbon::now()->month)),
            ])
            ->actions([
                // No actions needed for view-only resource
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitors::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Prevent manual creation of visitor records
    }
}

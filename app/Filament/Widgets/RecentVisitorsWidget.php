<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentVisitorsWidget extends TableWidget
{
    protected static ?string $heading = 'Recent Visitors';
    protected static ?int $sort = 5;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Visitor::query()
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Visit Time')
                    ->dateTime('M j, H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->copyable(),

                Tables\Columns\TextColumn::make('page_visited')
                    ->label('Page')
                    ->formatStateUsing(function (string $state): string {
                        return $state === '/' ? 'Home' : ucfirst(str_replace(['/', '-'], [' ', ' '], $state));
                    }),

                Tables\Columns\TextColumn::make('country')
                    ->label('Country')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Local' => 'gray',
                        'Unknown' => 'gray',
                        default => 'primary',
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated(false);
    }
}

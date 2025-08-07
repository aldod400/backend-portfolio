<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class PopularPagesWidget extends TableWidget
{
    protected static ?string $heading = 'Popular Pages';
    protected static ?int $sort = 6;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Visitor::query()
                    ->selectRaw('page_visited, COUNT(*) as visits, MIN(id) as id')
                    ->groupBy('page_visited')
                    ->orderBy('visits', 'desc')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('page_visited')
                    ->label('Page')
                    ->formatStateUsing(function (string $state): string {
                        return $state === '/' ? 'Home' : ucfirst(str_replace(['/', '-'], [' ', ' '], $state));
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('visits')
                    ->label('Visits')
                    ->numeric()
                    ->sortable(),
            ])
            ->paginated(false);
    }

    public function getTableRecordKey($record): string
    {
        return (string) $record->page_visited;
    }
}

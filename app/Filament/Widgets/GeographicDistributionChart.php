<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Widgets\ChartWidget;

class GeographicDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'Geographic Distribution';
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'half';

    protected function getData(): array
    {
        $countries = Visitor::selectRaw('country, COUNT(*) as count')
            ->groupBy('country')
            ->orderBy('count', 'desc')
            ->limit(8)
            ->get();

        $colors = [
            '#3B82F6', // Blue
            '#10B981', // Green  
            '#F59E0B', // Yellow
            '#EF4444', // Red
            '#8B5CF6', // Purple
            '#06B6D4', // Cyan
            '#F97316', // Orange
            '#84CC16', // Lime
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data' => $countries->pluck('count')->toArray(),
                    'backgroundColor' => $colors,
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $countries->pluck('country')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
            'cutout' => '60%',
        ];
    }

    public function getHeight(): int
    {
        return 300;
    }
}

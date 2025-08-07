<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class VisitorAnalyticsChart extends ChartWidget
{
    protected static ?string $heading = 'Visitor Analytics (Last 30 Days)';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $days = [];
        $visits = [];
        $uniqueVisits = [];

        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $days[] = $date->format('M j');
            $visits[] = Visitor::whereDate('created_at', $date)->count();
            $uniqueVisits[] = Visitor::whereDate('created_at', $date)->distinct('ip_address')->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Visits',
                    'data' => $visits,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'borderWidth' => 2,
                    'fill' => true,
                ],
                [
                    'label' => 'Unique Visitors',
                    'data' => $uniqueVisits,
                    'backgroundColor' => 'rgba(34, 197, 94, 0.1)',
                    'borderColor' => 'rgb(34, 197, 94)',
                    'borderWidth' => 2,
                    'fill' => true,
                ]
            ],
            'labels' => $days,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
            ],
        ];
    }

    public function getHeight(): int
    {
        return 400;
    }
}

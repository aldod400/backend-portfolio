<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Widgets\ChartWidget;

class PopularPagesChart extends ChartWidget
{
    protected static ?string $heading = 'Most Visited Pages';
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'half';

    protected function getData(): array
    {
        $pages = Visitor::selectRaw('page_visited, COUNT(*) as visits')
            ->groupBy('page_visited')
            ->orderBy('visits', 'desc')
            ->limit(6)
            ->get();

        $labels = $pages->map(function ($page) {
            return match ($page->page_visited) {
                '/' => 'Home',
                '/projects' => 'Projects',
                '/about' => 'About',
                '/contact' => 'Contact',
                '/skills' => 'Skills',
                '/experiences' => 'Experience',
                '/education' => 'Education',
                '/certifications' => 'Certifications',
                default => ucfirst(str_replace(['/', '-'], [' ', ' '], $page->page_visited))
            };
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Visits',
                    'data' => $pages->pluck('visits')->toArray(),
                    'backgroundColor' => [
                        '#3B82F6',
                        '#10B981',
                        '#F59E0B',
                        '#EF4444',
                        '#8B5CF6',
                        '#06B6D4',
                    ],
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
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
                    'display' => false,
                ],
            ],
            'indexAxis' => 'y',
        ];
    }

    public function getHeight(): int
    {
        return 300;
    }
}

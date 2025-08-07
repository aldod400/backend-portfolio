<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Skill;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class DashboardStatsOverview extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $todayVisits = Visitor::todayVisitsCount();
        $yesterdayVisits = Visitor::whereDate('created_at', Carbon::yesterday())->count();
        $todayChange = $yesterdayVisits > 0 ? (($todayVisits - $yesterdayVisits) / $yesterdayVisits) * 100 : 0;

        $weekVisits = Visitor::weekVisitsCount();
        $lastWeekVisits = Visitor::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();
        $weekChange = $lastWeekVisits > 0 ? (($weekVisits - $lastWeekVisits) / $lastWeekVisits) * 100 : 0;

        return [
            Stat::make('Total Visits', Visitor::totalVisitsCount())
                ->description('All time portfolio visits')
                ->descriptionIcon('heroicon-m-eye')
                ->chart($this->getWeeklyChart())
                ->color('primary'),

            Stat::make('Today', $todayVisits)
                ->description($this->getChangeDescription($todayChange))
                ->descriptionIcon($todayChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($todayChange >= 0 ? 'success' : 'danger'),

            Stat::make('This Week', $weekVisits)
                ->description($this->getChangeDescription($weekChange))
                ->descriptionIcon($weekChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($weekChange >= 0 ? 'success' : 'danger'),

            Stat::make('Unique Visitors', Visitor::uniqueVisitorsCount())
                ->description('Different IP addresses')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
        ];
    }
    private function getWeeklyChart(): array
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $data[] = Visitor::whereDate('created_at', $date)->count();
        }
        return $data;
    }

    private function getChangeDescription(float $change): string
    {
        if ($change > 0) {
            return '+' . number_format($change, 1) . '% from last period';
        } elseif ($change < 0) {
            return number_format($change, 1) . '% from last period';
        }
        return 'No change from last period';
    }
}

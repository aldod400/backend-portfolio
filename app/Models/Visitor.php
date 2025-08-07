<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'page_visited',
        'country',
        'city',
        'referer'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Get unique visitors count
    public static function uniqueVisitorsCount()
    {
        return static::distinct('ip_address')->count();
    }

    // Get total visits count
    public static function totalVisitsCount()
    {
        return static::count();
    }

    // Get visits for today
    public static function todayVisitsCount()
    {
        return static::whereDate('created_at', Carbon::today())->count();
    }

    // Get visits for this week
    public static function weekVisitsCount()
    {
        return static::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
    }

    // Get visits for this month
    public static function monthVisitsCount()
    {
        return static::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
    }

    // Get daily visits for chart (last 7 days)
    public static function dailyVisitsChart()
    {
        $visits = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $visits[] = [
                'date' => $date->format('M j'),
                'count' => static::whereDate('created_at', $date)->count()
            ];
        }
        return $visits;
    }

    // Get most visited pages
    public static function popularPages($limit = 5)
    {
        return static::selectRaw('page_visited, COUNT(*) as visits')
            ->groupBy('page_visited')
            ->orderBy('visits', 'desc')
            ->limit($limit)
            ->get();
    }
}

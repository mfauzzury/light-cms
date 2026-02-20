<?php

namespace App\Filament\Resources\ActivityResource\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\DB;

class ActivityStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $todayCount = Activity::whereDate('created_at', today())->count();
        $weekCount = Activity::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $yesterdayCount = Activity::whereDate('created_at', today()->subDay())->count();

        $todayChange = $yesterdayCount > 0
            ? round((($todayCount - $yesterdayCount) / $yesterdayCount) * 100, 1)
            : 0;

        // Most active user
        $mostActiveUser = Activity::select('causer_id', DB::raw('count(*) as total'))
            ->whereNotNull('causer_id')
            ->whereBetween('created_at', [now()->subDays(7), now()])
            ->groupBy('causer_id')
            ->orderBy('total', 'desc')
            ->with('causer')
            ->first();

        // Activity breakdown
        $createdCount = Activity::where('description', 'like', '%created%')
            ->whereBetween('created_at', [now()->subDays(7), now()])
            ->count();
        $updatedCount = Activity::where('description', 'like', '%updated%')
            ->whereBetween('created_at', [now()->subDays(7), now()])
            ->count();
        $deletedCount = Activity::where('description', 'like', '%deleted%')
            ->whereBetween('created_at', [now()->subDays(7), now()])
            ->count();

        return [
            Stat::make('Today\'s Activity', $todayCount)
                ->description($todayChange >= 0 ? "{$todayChange}% increase" : "{$todayChange}% decrease")
                ->descriptionIcon($todayChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($todayChange >= 0 ? 'success' : 'danger')
                ->chart([
                    Activity::whereDate('created_at', today()->subDays(6))->count(),
                    Activity::whereDate('created_at', today()->subDays(5))->count(),
                    Activity::whereDate('created_at', today()->subDays(4))->count(),
                    Activity::whereDate('created_at', today()->subDays(3))->count(),
                    Activity::whereDate('created_at', today()->subDays(2))->count(),
                    Activity::whereDate('created_at', today()->subDays(1))->count(),
                    $todayCount,
                ]),

            Stat::make('This Week', $weekCount)
                ->description('Total activities this week')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary')
                ->chart([
                    Activity::whereDate('created_at', now()->startOfWeek())->count(),
                    Activity::whereDate('created_at', now()->startOfWeek()->addDay())->count(),
                    Activity::whereDate('created_at', now()->startOfWeek()->addDays(2))->count(),
                    Activity::whereDate('created_at', now()->startOfWeek()->addDays(3))->count(),
                    Activity::whereDate('created_at', now()->startOfWeek()->addDays(4))->count(),
                    Activity::whereDate('created_at', now()->startOfWeek()->addDays(5))->count(),
                    Activity::whereDate('created_at', now()->startOfWeek()->addDays(6))->count(),
                ]),

            Stat::make('Most Active User', $mostActiveUser ? $mostActiveUser->causer?->name ?? 'System' : 'No activity')
                ->description($mostActiveUser ? "{$mostActiveUser->total} actions this week" : 'No recent activity')
                ->descriptionIcon('heroicon-m-user-circle')
                ->color('info'),

            Stat::make('Last 7 Days Breakdown', "{$createdCount} / {$updatedCount} / {$deletedCount}")
                ->description('Created / Updated / Deleted')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('warning')
                ->chart([$createdCount, $updatedCount, $deletedCount]),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}

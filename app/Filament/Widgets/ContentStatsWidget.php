<?php

namespace App\Filament\Widgets;

use App\Models\Content;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContentStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Published', Content::where('status', 'published')->count())
                ->description('Live content')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('Drafts', Content::where('status', 'draft')->count())
                ->description('In progress')
                ->descriptionIcon('heroicon-o-pencil-square')
                ->color('warning'),
            Stat::make('Archived', Content::where('status', 'archived')->count())
                ->description('Archived content')
                ->descriptionIcon('heroicon-o-archive-box')
                ->color('gray'),
            Stat::make('Total', Content::count())
                ->description('All content')
                ->descriptionIcon('heroicon-o-document-text'),
        ];
    }
}

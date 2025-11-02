<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\ContactMessage;
use App\Models\NewsletterSubscriber;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardOverViewStat extends StatsOverviewWidget
{

    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = [
        'md' => 12,
        'xl' => 12,
    ];
    protected function getStats(): array
    {
        $totalSubscribers = NewsletterSubscriber::count();
        $newSubscribers = NewsletterSubscriber::where('created_at', '>=', now()->subDays(30))->count();
        $unread = ContactMessage::where('is_read', false)->count();
        $total = Project::count();
        $active = Project::where('is_active', true)->count();
        $inactive = Project::where('is_active', false)->count();
        $newThisMonth = Project::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $activePercentage = $total > 0 ? round(($active / $total) * 100, 1) : 0;
        return [
            Stat::make('Total Subscribers', number_format($totalSubscribers))
                ->description("{$newSubscribers} new this month")
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
            Stat::make('Unread Messages', number_format($unread))
                ->description('Pending review')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),
            Stat::make('Total Projects', number_format($total))
                ->description('All uploaded projects')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('primary'),
            Stat::make('Active Projects', number_format($active))
                ->description("{$activePercentage}% active")
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Inactive Projects', number_format($inactive))
                ->description('Awaiting activation')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),

            Stat::make('New This Month', number_format($newThisMonth))
                ->description('Recently added')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info')
        ];
    }
}

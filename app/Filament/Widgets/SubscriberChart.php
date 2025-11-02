<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use App\Models\NewsletterSubscriber;

class SubscriberChart extends ChartWidget
{
    protected ?string $heading = 'Monthly Subscribers';
    protected static ?int $sort = 3;



    protected function getData(): array
    {
        $subscribers = NewsletterSubscriber::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Generate data for all 12 months (fill missing with 0)
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $subscribers[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Subscribers Created',
                    'data' => $data,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59,130,246,0.3)',
                    'tension' => 0.4,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}

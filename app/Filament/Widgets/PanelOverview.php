<?php

namespace App\Filament\Widgets;

use App\Models\Auth\User;
use App\Models\Order\Order;
use App\Models\Product\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PanelOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::query()->count()),
            Stat::make('Products', Product::query()->count()),
            Stat::make('Orders', Order::query()->count()),
        ];
    }
}

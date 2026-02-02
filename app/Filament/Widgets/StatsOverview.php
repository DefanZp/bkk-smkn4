<?php

namespace App\Filament\Widgets;
use App\Models\User;
use App\Models\vacancie;
use App\Models\Application;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
            ->description('semua pengguna')
            ->icon('heroicon-o-users'),
            Stat::make('Total lowongan', vacancie::count())
            ->description('lowongan tersedia')
            ->icon('heroicon-o-briefcase'),
            Stat::make('Total lamaran', Application::count())
            ->description('lamaran yang masuk')
            ->icon('heroicon-o-document-text'),
            
        ];
    }
}

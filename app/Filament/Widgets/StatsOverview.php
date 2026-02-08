<?php

namespace App\Filament\Widgets;
use App\Models\User;
use App\Models\vacancie;
use App\Models\Application;
use App\Models\Contacts;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Tracer Study', User::whereNotNull('status')->count())
            ->description('Pengisi Tracer Study')
            ->icon('heroicon-m-users')
            ->view('filament.widgets.custom-stat')
            ->extraAttributes([
                'iconColor' => 'text-indigo-600',
                'iconBg' => 'bg-indigo-200/80',
            ]),
            Stat::make('Total lowongan', vacancie::count())
            ->description('Lowongan tersedia')
            ->icon('heroicon-m-briefcase')
            ->view('filament.widgets.custom-stat')
            ->extraAttributes([
                'iconColor' => 'text-emerald-600',
                'iconBg' => 'bg-emerald-200/80',
            ]),
            Stat::make('Total lamaran', Application::count())
            ->description('Lamaran yang masuk')
            ->icon('heroicon-m-document-text')
            ->view('filament.widgets.custom-stat')
            ->extraAttributes([
                'iconColor' => 'text-blue-600',
                'iconBg' => 'bg-blue-200/80',
            ]),
            Stat::make('Total pesan', Contacts::count())
            ->description('Pesan dari pengguna')
            ->icon('heroicon-m-chat-bubble-left-right')
            ->view('filament.widgets.custom-stat')
            ->extraAttributes([
                'iconColor' => 'text-yellow-500',
                'iconBg' => 'bg-yellow-200/80',
            ]),
            
        ];
    }
}

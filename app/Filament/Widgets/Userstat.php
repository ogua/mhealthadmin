<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Userstat extends BaseWidget
{
    
    protected static ?int $navigationSort = 1;

    protected function getStats(): array
    {
        
        $user = User::count();
        $patient = User::where('role','Patient')->count();
        $admin = User::where('role','Admin')->count();
        
        return [
                Stat::make('Total User', $user)
                    ->color('success'),
                Stat::make('Total Patients', $patient)
                    ->color('danger'),
                Stat::make('Total Admin', $admin)
                    ->color('success'),
            ];
    }
}

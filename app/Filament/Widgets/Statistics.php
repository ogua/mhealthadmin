<?php

namespace App\Filament\Widgets;

use App\Models\Appointments;
use App\Models\Medication;
use App\Models\Support;
use App\Models\Symptoms;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Statistics extends BaseWidget
{
    protected static ?int $navigationSort = 2;

    protected function getStats(): array
    {
        $user = Medication::count();
        $patient = Symptoms::count();
        $admin = Support::count();
        
        return [
                Stat::make('Total Medication', $user)
                    ->color('success'),
                Stat::make('Total Symptoms', $patient)
                    ->color('danger'),
                Stat::make('Total Supports', $admin)
                    ->color('success'),
            ];
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\Activity;
use App\Models\Appointments;
use App\Models\Measurement;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Otherstate extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Activity::count();
        $patient = Measurement::count();
        $app = Appointments::count();
        
        return [
                Stat::make('Total Activities', $user)
                    ->color('success'),
                Stat::make('Total Measurements', $patient)
                    ->color('danger'),
                Stat::make('Total Appointments',$app)
                    ->color('success'),
            ];
    }
}

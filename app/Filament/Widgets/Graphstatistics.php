<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class Graphstatistics extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => ['Medication Graph'],
                    'data' => [0, 10]
                ]
            ],
            'labels' => ['Jan','Feb']
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

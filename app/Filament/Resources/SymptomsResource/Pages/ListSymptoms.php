<?php

namespace App\Filament\Resources\SymptomsResource\Pages;

use App\Filament\Resources\SymptomsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSymptoms extends ListRecords
{
    protected static string $resource = SymptomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

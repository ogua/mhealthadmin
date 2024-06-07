<?php

namespace App\Filament\Resources\SymptomsResource\Pages;

use App\Filament\Resources\SymptomsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSymptoms extends EditRecord
{
    protected static string $resource = SymptomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

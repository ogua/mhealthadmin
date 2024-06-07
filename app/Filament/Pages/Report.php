<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Report extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Generate Report';

    protected static ?int $navigationSort = 7;

    protected static string $view = 'filament.pages.report';
}

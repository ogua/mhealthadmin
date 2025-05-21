<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;

class Report extends Page
{
    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Generate Report';

    protected static ?int $navigationSort = 7;

    protected static string $view = 'filament.pages.report';

    public ?array $data = [];

    public function mount(): void
    {
        $this->fillForm();
    }

    public function fillForm(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                    ->description('')
                    ->schema([

                        Forms\Components\Select::make('report_type')
                            ->options([
                                'Orphan' => 'Orphan',
                                'Donations' => 'Donations',
                                'Expenses' => 'Expenses',
                            ])
                            ->required(),

                        Forms\Components\DatePicker::make('from_date')
                            // ->label('Appointment date')
                            ->extraAttributes([
                                'name' => 'from_date',
                            ])
                            ->required(),

                        Forms\Components\DatePicker::make('to_date')
                            // ->label('Appointment date')
                            ->extraAttributes([
                                'name' => 'to_date',
                            ])
                            ->required()

                    ])->columns(3)
            ])->statePath('data');
    }
}

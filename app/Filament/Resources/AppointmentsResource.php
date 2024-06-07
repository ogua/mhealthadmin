<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentsResource\Pages;
use App\Filament\Resources\AppointmentsResource\RelationManagers;
use App\Models\Appointments;
use App\Models\Support;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppointmentsResource extends Resource
{
    protected static ?string $model = Appointments::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('support_id')
                    ->label('Support name')
                    ->required()
                    ->options(Support::pluck('name','id')),
                Forms\Components\DatePicker::make('app_date')
                    ->required(),
                Forms\Components\Select::make('app_time')
                    ->required()
                    ->options([
                    '06:00' => '06:00',
                    '07:00' => '07:00',
                    '08:00' => '08:00',
                    '09:00' => '09:00',
                    '10:00' => '10:00',
                    '11:00' => '11:00',
                    '12:00' => '12:00',
                    '13:00' => '13:00',
                    '14:00' => '14:00',
                    '15:00' => '15:00',
                    '16:00' => '16:00',
                    '17:00' => '17:00',
                    '18:00' => '18:00',
                    '19:00' => '19:00',
                    '20:00' => '20:00',
                    '21:00' => '21:00',
                    '22:00' => '22:00',
                    '23:00' => '23:00',
                ])
                ->searchable(),
                Forms\Components\Textarea::make('note')
                    ->required()
                    ->columnSpanFull(),
                // Forms\Components\TextInput::make('remainder')
                //     ->required()
                //     ->maxLength(255)
                //     ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('patientname')
                // ->label('Patient name')
                // ->formatStateUsing(fn (Appointments $record) => $record->support?->user?->name ?? "")
                // ->sortable(),
                Tables\Columns\TextColumn::make('support.name')
                ->label('Support name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('app_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('app_time')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('remainder')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointments::route('/create'),
            'edit' => Pages\EditAppointments::route('/{record}/edit'),
        ];
    }
}

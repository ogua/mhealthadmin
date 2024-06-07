<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SymptomsResource\Pages;
use App\Filament\Resources\SymptomsResource\RelationManagers;
use App\Models\Symptoms;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class SymptomsResource extends Resource
{
    protected static ?string $model = Symptoms::class;

    protected static ?string $navigationIcon = 'heroicon-o-stop';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Patient')
                    ->required()
                    ->options(User::where('role','Patient')->pluck('name','id')),
                Forms\Components\TextInput::make('mode')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('mdate'),
                Forms\Components\Select::make('mtime')
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
                Forms\Components\Textarea::make('symptoms')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Patient')
                    ->sortable(),
                Tables\Columns\TextColumn::make('mode')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('mdate')
                ->label('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mtime')
                ->label('Time')
                    ->searchable(),
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
            'index' => Pages\ListSymptoms::route('/'),
            'create' => Pages\CreateSymptoms::route('/create'),
            'edit' => Pages\EditSymptoms::route('/{record}/edit'),
        ];
    }
}

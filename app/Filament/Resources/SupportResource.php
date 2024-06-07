<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupportResource\Pages;
use App\Filament\Resources\SupportResource\RelationManagers;
use App\Models\Support;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupportResource extends Resource
{
    protected static ?string $model = Support::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Patient')
                    ->required()
                    ->options(User::where('role','Patient')->pluck('name','id')),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('utype')
                    ->required()
                    ->label('Type')
                    ->maxLength(255)
                    ->default('healthcare'),
                Forms\Components\TextInput::make('speciality')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('street')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('zipcode')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('website')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->label('Patient')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                ->label('Support name')
                    ->searchable(),
                 Tables\Columns\TextColumn::make('utype')
                ->label('Type')
                ->badge()
                ->searchable(),
                Tables\Columns\TextColumn::make('speciality')
                    ->searchable(),
                Tables\Columns\TextColumn::make('street')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('zipcode')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('website')
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
            'index' => Pages\ListSupports::route('/'),
            'create' => Pages\CreateSupport::route('/create'),
            'edit' => Pages\EditSupport::route('/{record}/edit'),
        ];
    }
}

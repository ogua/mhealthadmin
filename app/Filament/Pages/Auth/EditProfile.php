<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Form;
use Filament\Forms;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('avatar_url')
                    ->image(),
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->tel(),
                Forms\Components\Select::make('role')
                    ->options(['Admin' => 'Admin', 'Patient' => 'Patient']),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}

<?php

namespace App\Filament\Customer\Resources\classes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class classesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('class_name')->required(),
                TextInput::make('limit_student')->required(),
            ]);
    }
}

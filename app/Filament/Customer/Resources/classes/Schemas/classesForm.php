<?php

namespace App\Filament\Customer\Resources\classes\Schemas;

use Filament\Forms\Components\Select;
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
                Select::make('is_active')
                    ->label('وضعیت')
                    ->options([
                        1 => 'فعال',
                        0 => 'غیرفعال',
                    ])
                    ->required()
            ]);
    }
}

<?php

namespace App\Filament\Customer\Resources\Customers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('email')->unique()->email()->required(),
                TextInput::make('password')->password()->required(),
                TextInput::make('melicode')->required(),
                Select::make('class_id')
                    ->label('کلاس')
                    ->relationship('classes', 'class_name')
                    ->searchable()
                    ->preload()
                    ->required(),
                
            ]);
    }
}

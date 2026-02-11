<?php

namespace App\Filament\Customer\Resources\Absences\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Morilog\Jalali\Jalalian;

class AbsenceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('دانش اموز')
                    ->relationship('users', 'name')
                    ->searchable()
                    ->preload(),
                Select::make('class_id')
                    ->label('کلاس')
                    ->relationship('classes', 'class_name')
                    ->searchable()
                    ->preload(),

                TextInput::make('created_at')
                    ->label('تاریخ ثبت')
                    ->formatStateUsing(
                        fn($state) =>
                        $state
                        ? Jalalian::fromDateTime($state)->format('Y/m/d')
                        : '-'
                    )
            ]);
    }
}

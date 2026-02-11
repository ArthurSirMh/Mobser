<?php

namespace App\Filament\Customer\Resources\Absences\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Morilog\Jalali\Jalalian;


class AbsencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('users.name')->label('نام')->searchable(),
                TextColumn::make('classes.class_name')->label('کلاس'),
                TextColumn::make('created_at')->formatStateUsing(fn($state) => Jalalian::fromDateTime($state)->format('Y/m/d'))->label('تاریخ ثبت')

            ])
            ->filters([
            ])
            ->headerActions([
                Action::make('sendMessage')
                    ->label('ارسال پیام')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('success')
                    ->action(function () {
                        \Log::info('دکمه بالای جدول کلیک شد');

                    }),
            ])

            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

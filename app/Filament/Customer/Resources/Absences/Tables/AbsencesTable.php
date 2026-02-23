<?php

namespace App\Filament\Customer\Resources\Absences\Tables;

use App\Models\Absence;
use App\Models\User;
use Exception;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Kavenegar\KavenegarApi;
use Morilog\Jalali\Jalalian;


class AbsencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('users.name')->label('نام')->searchable(),
                TextColumn::make('classes.class_name')->label('کلاس'),
                TextColumn::make('created_at')->formatStateUsing(fn($state) => Jalalian::fromDateTime($state)->format('Y/m/d'))->label('تاریخ ثبت'),
                TextColumn::make('users.phone_number')->label('شماره تلفن')

            ])
            ->filters([
            ])
            ->headerActions([
                Action::make('sendAllMessages')
                    ->label('ارسال پیام')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('success')
                    ->action(function () {
                        $absences = Absence::where('message_is_send', '0')->get();
                        dd($absences);
                    }),
            ])
            ->actions([
                Action::make('sendMessage')
                    ->label(
                        fn($record) =>
                        $record->message_is_send ? 'ارسال شده' : 'ارسال پیام'
                    )
                    ->icon(fn($record) => $record->message_is_send ? 'heroicon-s-check-circle' : 'heroicon-o-paper-airplane')
                    ->color(fn($record) => $record->message_is_send ? 'success' : 'warning')->disabled(fn($record) => $record->message_is_send == 1)
                    ->action(function ($record) {
                        try {
                            $user = User::where('id', $record->user_id)->get('phone_number');
                            $sender = "2000660110";
                            $receptor = "$user";
                            $message = "درود خدمت والدین عزیز ,غیبت برای فرزند شما به دلیل عدم حضور ثبت شد";
                            $api = new KavenegarApi("316C395071374D62496E30575231524652486775657959496E6B62705636365736364F316B596F455A72413D");
                            // $res = $api->Send($sender, $receptor, $message);
                            Absence::where('id', $record->id)->update(['message_is_send' => '1']);
                            Notification::make()
                                ->title('عملیات با موفقیت انجام شد')
                                ->success()
                                ->send();
                        } catch (Exception) {
                            Absence::where('id', $record->id)->update(['message_is_send' => '0']);
                            Notification::make()
                                ->title('خطا در ارتباط با سرور')->body('با پشتیبانی تماس بگیرید')
                                ->danger()
                                ->send();
                        }
                    }),
            ])
            ->toolbarActions([
            ]);
    }
}

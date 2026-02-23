<?php

namespace App\Filament\Customer\Resources\Users\Pages;

use App\Filament\Customer\Resources\Users\UserResource;
use App\Models\classes;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['class_id'])) {
            return $data;
        }
        $limit = classes::where('id', $data['class_id'])->firstOrFail('limit_student');
        $count = User::where('class_id', $data['class_id'])->count();
        if ($count > intval($limit['limit_student'])) {
            Notification::make()
                ->title('این کلاس ظرفیت ندارد')
                ->danger()
                ->send();

            $this->halt(); // توقف عملیات
        }

        return $data;
    }
}

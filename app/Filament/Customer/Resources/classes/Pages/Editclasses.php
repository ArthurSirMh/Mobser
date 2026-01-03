<?php

namespace App\Filament\Customer\Resources\classes\Pages;

use App\Filament\Customer\Resources\classes\classesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class Editclasses extends EditRecord
{
    protected static string $resource = classesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}

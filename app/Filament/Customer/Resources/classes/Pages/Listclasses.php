<?php

namespace App\Filament\Customer\Resources\classes\Pages;

use App\Filament\Customer\Resources\classes\classesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class Listclasses extends ListRecords
{
    protected static string $resource = classesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

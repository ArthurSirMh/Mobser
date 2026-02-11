<?php

namespace App\Filament\Customer\Resources\Absences\Pages;

use App\Filament\Customer\Resources\Absences\AbsenceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAbsence extends CreateRecord
{
    protected static string $resource = AbsenceResource::class;
}

<?php

namespace App\Filament\Customer\Resources\Absences;

use Absence;
use App\Filament\Customer\Resources\Absences\Pages\CreateAbsence;
use App\Filament\Customer\Resources\Absences\Pages\EditAbsence;
use App\Filament\Customer\Resources\Absences\Pages\ListAbsences;
use App\Filament\Customer\Resources\Absences\Schemas\AbsenceForm;
use App\Filament\Customer\Resources\Absences\Tables\AbsencesTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AbsenceResource extends Resource
{
    protected static ?string $navigationLabel = 'لیست غیبت ها';
    protected static ?string $pluralLabel = 'لیست غیبت‌ها';

    protected static ?string $model = \App\Models\Absence::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return AbsenceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AbsencesTable::configure($table);
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereDate('created_at', now())
            ->orderByDesc('created_at');
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAbsences::route('/'),
            'create' => CreateAbsence::route('/create'),
            'edit' => EditAbsence::route('/{record}/edit'),
        ];
    }
}

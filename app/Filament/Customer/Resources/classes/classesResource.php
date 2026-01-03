<?php

namespace App\Filament\Customer\Resources\classes;

use App\Filament\Customer\Resources\classes\Pages\Createclasses;
use App\Filament\Customer\Resources\classes\Pages\Editclasses;
use App\Filament\Customer\Resources\classes\Pages\Listclasses;
use App\Filament\Customer\Resources\classes\Schemas\classesForm;
use App\Filament\Customer\Resources\classes\Tables\classesTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class classesResource extends Resource
{
    protected static ?string $model = \App\Models\classes::class;
    protected static ?string $navigationLabel = 'کلاس ها';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'classes';

    public static function form(Schema $schema): Schema
    {
        return classesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return classesTable::configure($table);
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
            'index' => Listclasses::route('/'),
            'create' => Createclasses::route('/create'),
            'edit' => Editclasses::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

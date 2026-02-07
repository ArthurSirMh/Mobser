<?php

use App\Http\Controllers\absenceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('filament.customer.pages.dashboard');
});
Route::prefix('customer')->group(function () {
    Route::post('create-absence', [AbsenceController::class, 'create_absence']);
    Route::post('delete-absence', [AbsenceController::class, 'delete_absence']);

});

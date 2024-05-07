<?php

use App\Http\Controllers\TrabajoAcademicoController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::controller(TrabajoAcademicoController::class)->group(function () {
    Route::get('/', 'create')->name('postulations.create');
});

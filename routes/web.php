<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrabajoAcademicoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfDocumentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(TrabajoAcademicoController::class)->group(function () {
    Route::get('/trabajoTerminal', 'index')->name('trabajo.index');
});
Route :: controller(TrabajoAcademicoController::class)->group(function(){
    Route::get('/subirTrabajo', 'SubirTrabajo')->name('trabajo.subir');
});

Route::get('/upload-pdf', [PdfDocumentController::class, 'showUploadForm'])->name('pdf.upload_form');

Route::post('/upload-pdf', [PdfDocumentController::class, 'store'])->name('pdf.upload');

Route::get('/pdf/{id}/preview', [PdfDocumentController::class, 'showPdfPreview'])->name('pdf.preview');
Route::get('/pdf/{id}/show', [PdfDocumentController::class, 'showPdf'])->name('pdf.show');


require __DIR__ . '/auth.php';

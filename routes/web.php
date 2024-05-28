<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrabajoAcademicoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfDocumentController;
use App\Http\Controllers\AdminController;

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

Route::get('/SubirTerminado', [PdfDocumentController::class, 'SubirTerminadoForm'])->name('trabajo.subirTerminadoForm');  
Route::post('/SubirTerminado', [PdfDocumentController::class, 'SubirTerminado'])->name('SubirTerminado');

Route::get('/RegistrarTrabajo', [PdfDocumentController::class, 'registrarTrabajoForm'])->name('trabajo.registrarTrabajoForm');
Route::post('/RegistrarTrabajo', [PdfDocumentController::class, 'registrarTrabajo'])->name('RegistrarTrabajo');

Route::get('/pdf/{id}/preview', [PdfDocumentController::class, 'showPdfPreview'])->name('pdf.preview');
Route::get('/pdf/{id}/show', [PdfDocumentController::class, 'showPdf'])->name('pdf.show');

#ruta de vista del administrador
Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/agregarSinodal',[AdminController::class, 'agregarSinodal'])->name('admin.agregarSinodal');
Route::post('/admin/addSinodales', [AdminController::class, 'addSinodales'])->name('admin.addSinodales');

Route::get('/admin/ttDetails/{id}', [AdminController::class, 'ttDetails'])->name('admin.ttDetails');


require __DIR__ . '/auth.php';

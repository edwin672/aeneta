<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrabajoAcademicoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfDocumentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteController;

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

Route::get('/pdf/{id}/preview', [PdfDocumentController::class, 'showPdfPreview'])->name('pdf.preview'); #vista para mostrar el menu con el pdf
Route::get('/pdf/{id}/show', [PdfDocumentController::class, 'showPdf'])->name('pdf.show'); #muestra todo el pdf

#ruta de vista del administrador
Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/agregarSinodal',[AdminController::class, 'agregarSinodal'])->name('admin.agregarSinodal');
Route::post('/admin/addSinodales', [AdminController::class, 'addSinodales'])->name('admin.addSinodales');

Route::get('/admin/agregarDirector',[AdminController::class, 'agregarDirector'])->name('admin.agregarDirector');
Route::post('/admin/addDirector', [AdminController::class, 'addDirector'])->name('admin.addDirector');

Route::get('/admin/ttDetails/{id}', [AdminController::class, 'ttDetails'])->name('admin.ttDetails');

Route::get('/estudiante', [EstudianteController::class, 'index'])->name('estudiante.index');

Route::get('/consultarTrabajos', [EstudianteController::class, 'consultarTrabajos'])->name('estudiante.consultarTrabajos');
Route::get('/consultarHistorial', [EstudianteController::class, 'consultarHistorial'])->name('estudiante.consultarHistorial');

require __DIR__ . '/auth.php';

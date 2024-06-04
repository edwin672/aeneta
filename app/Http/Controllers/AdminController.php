<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function agregarSinodal()
    {
        $trabajosConSinodales = DB::table('sinodal_trabajoacademico')
            ->pluck('id_trabajoAcademico')
            ->toArray();
        

        $trabajos = DB::table('trabajoacademico')
            ->whereNotIn('id_trabajoAcademico', $trabajosConSinodales)
            ->whereIn('id_trabajoAcademico', function ($query) {
                $query->select('id_trabajoAcademico')
                      ->from('director_trabajoacademico');
            })
            ->get();
        return view('admin.agregarSinodal', ['trabajos' => $trabajos]);
    }
    public function addSinodales(Request $request)
    {
        $ttId = $request->input('tt_id');
        $sinodales = $request->input('sinodales', []);
        $pdfContent = file_get_contents($request->file('pdf_file')->getRealPath());
        foreach ($sinodales as $sinodal) {
            try {
                DB::table('sinodal_trabajoacademico')->insert([
                    'id_sinodal' => $sinodal,
                    'id_trabajoAcademico' => $ttId,
                ]);
                #cambiar el status del trabajo academico
                DB::table('trabajoacademico')
                    ->where('id_trabajoAcademico', $ttId)
                    ->update(['estatus' => 'Sinodales asignados']);
                DB::table('historial')->insert([
                    'id_trabajoAcademico' => $ttId,
                    'num_version' => '2',
                    'estatus' => 'Sinodales asignados',
                    'contenido' => $pdfContent,
                ]);
            } catch (\Exception $e) {
                // Manejar errores de inserción, por ejemplo, claves foráneas no válidas
                return redirect()->back()->with('error', 'Error al agregar sinodales: ' . $e->getMessage());
            }
        }
        $sinodalesInfo = DB::table('docente')->whereIn('id_docente', $sinodales)->get();
        return redirect()->route('admin.ttDetails', ['id' => $ttId])->with('success', 'Sinodales agregados correctamente.') ->with('sinodales', $sinodalesInfo);
    }
    public function agregarDirector()
    {
        $trabajosConDirector = DB::table('director_trabajoacademico')
            ->pluck('id_trabajoAcademico')
            ->toArray();

        // Obtener los trabajos académicos que no están en la tabla de sinodales
        $trabajos = DB::table('trabajoacademico')
            ->whereNotIn('id_trabajoAcademico', $trabajosConDirector)
            ->get();

        return view('admin.agregarDirector', ['trabajos' => $trabajos]);
    }
    public function addDirector(Request $request)
    {
        $ttId = $request->input('tt_id');
        $director = $request->input('sinodales', []);
        $pdfContent = file_get_contents($request->file('pdf_file')->getRealPath());

        foreach ($director as $sinodal) {
            try {
                DB::table('director_trabajoacademico')->insert([
                    'id_docente' => $sinodal,
                    'id_trabajoAcademico' => $ttId,
                ]);
                #cambiar el status del trabajo academico
                DB::table('trabajoacademico')
                    ->where('id_trabajoAcademico', $ttId)
                    ->update(['estatus' => 'Director asignado']);

                DB::table('historial')->insert([
                    'id_trabajoAcademico' => $ttId,
                    'num_version' => '2',
                    'estatus' => 'Director asignado',
                    'contenido' => $pdfContent,
                ]);
            } catch (\Exception $e) {
                // Manejar errores de inserción, por ejemplo, claves foráneas no válidas
                return redirect()->back()->with('error', 'Error al agregar sinodales: ' . $e->getMessage());
            }
        }
        
        $sinodalesInfo = DB::table('docente')->whereIn('id_docente', $director)->get();
        return redirect()->route('admin.ttDetails', ['id' => $ttId])->with('success', 'Sinodales agregados correctamente.') ->with('sinodales', $sinodalesInfo);
    }
    public function ttDetails($id)
    {
        $trabajo = DB::table('trabajoacademico')->where('id_trabajoAcademico', $id)->first();
        $sinodales = session('sinodales', []);
        return view('admin.ttDetails', ['trabajo' => $trabajo, 'sinodales' => $sinodales]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PdfDocument;
use Illuminate\Support\Facades\DB;

class PdfDocumentController extends Controller
{
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048', // Limita a archivos PDF con un tamaño máximo de 2MB
        ]);

        // Obtener el contenido del archivo PDF
        $pdfContent = file_get_contents($request->file('pdf_file')->getRealPath());

        // Guardar en la base de datos
       
        DB::table('trabajoacademico')->insert([
            'id_tipoTrabajo' => $request->input('tipoTrabajoAcademico'),
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_inicio' => $request->input('fechaInicio'),
            'fecha_final' => $request->input('fechaFinal'),
            'id_area' => $request->input('area'),
            'contenido' => $pdfContent,
        ]);

        return redirect()->back()->with('success', 'PDF subido correctamente.');
    }

    public function showUploadForm()
    {
        return view('pdf.upload_form');
    }

    public function showPdfPreview($id)
    {
        // Buscar el documento PDF por su ID
        $pdfDocument = DB::table('trabajoacademico')->where('id_trabajoAcademico', $id)->value('contenido');

        // Verificar si se encontró el documento
        if (!$pdfDocument) {
            abort(404);
        }

        // Devolver la vista con el documento PDF
        return view('pdf.pdf_preview', ['pdfDocument' => $pdfDocument]);
    }

    public function showPdf($id)
{
    // Buscar el documento PDF por su ID
    $pdfDocument = DB::table('trabajoacademico')->where('id_trabajoAcademico', $id)->value('contenido');

    // Verificar si se encontró el documento
    if (!$pdfDocument) {
        abort(404);
    }

    // Devolver el contenido del PDF para mostrarlo en línea
    return response()->stream(function () use ($pdfDocument) {
        echo $pdfDocument->pdf_content;
    }, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $pdfDocument->titulo . '.pdf"',
    ]);
}
}

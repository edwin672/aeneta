<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PdfDocument;

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
        PdfDocument::create([
            'title' => $request->input('title'),
            'pdf_content' => $pdfContent,
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
        $pdfDocument = PdfDocument::find($id);

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
    $pdfDocument = PdfDocument::find($id);

    // Verificar si se encontró el documento
    if (!$pdfDocument) {
        abort(404);
    }

    // Devolver el contenido del PDF para mostrarlo en línea
    return response()->stream(function () use ($pdfDocument) {
        echo $pdfDocument->pdf_content;
    }, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $pdfDocument->title . '.pdf"',
    ]);
}
}

<form action="{{ route('pdf.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="tipoTrabajoAcademico" placeholder="Tipo de Trabajo Academico">
    <input type="text" name="titulo" placeholder="Título del Trabajo Academico">
    <input type="text" name="descripcion" placeholder="Descripcion del Trabajo Academico ">
    <input type="date" name="fechaInicio" placeholder="Fecha Inicio">
    <input type="date" name="fechaFinal" placeholder="Fecha Final">
    <input type="text" name="area" placeholder="Area">
    <input type="file" name="pdf_file">
    <button type="submit">Subir PDF</button>
</form>

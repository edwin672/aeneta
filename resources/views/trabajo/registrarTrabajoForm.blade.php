h1>Registrar Trabajo Academico nuevo</h1>

<form action="{{ route('RegistrarTrabajo') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="tipoTrabajoAcademico" placeholder="Tipo de Trabajo Academico">
    <input type="text" name="titulo" placeholder="Título del Trabajo Academico">
    <input type="text" name="descripcion" placeholder="Breve descripcion del trabajo academico ">
    <input type="date" name="fechaInicio" placeholder="Fecha Inicio">
    <input type="text" name="area" placeholder="Area">
    <input type="file" name="pdf_file">
    <button type="submit">PDF de la solicitud</button>
</form>

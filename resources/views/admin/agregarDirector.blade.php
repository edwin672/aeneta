<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Director</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Director</h1>
        <form action="{{ route('admin.addDirector') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tt">Selecciona un Trabajo Terminal:</label>
                <select name="tt_id" id="tt" class="form-control">
                    @foreach ($trabajos as $trabajo)
                        <option value="{{ $trabajo->id_trabajoAcademico }}">{{ $trabajo->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div id="DirectorContainer">
                <div class="sinodal-field mb-2">
                    <input type="text" name="sinodales[]" class="form-control mb-1" placeholder="Boleta del Director de Trabajo terminal" required>
                </div>
            </div>
            <br><br>
            <div class="mb-3">
                <label for="pdf_file" class="form-label">PDF con los datos del Director</label>
                <input type="file" class="form-control" id="pdf_file" name="pdf_file" required>
                <div class="invalid-feedback">
                    Por favor, suba el archivo PDF actualizado.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Asignacion</button>
        </form>
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

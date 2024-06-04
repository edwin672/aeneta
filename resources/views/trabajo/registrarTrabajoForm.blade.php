<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Trabajo Académico Nuevo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        .integrante-field {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .integrante-field input {
            flex: 1;
        }
        .integrante-field button {
            margin-left: 10px;
        }
    </style>
    <script>
        function addIntegrante() {
            const integrantesContainer = document.getElementById('integrantesContainer');
            const newIntegranteDiv = document.createElement('div');
            newIntegranteDiv.className = 'integrante-field input-group';
            newIntegranteDiv.innerHTML = `
                <input type="text" class="form-control" name="integrantes[]" placeholder="Boleta del Integrante de Trabajo terminal">
                <button type="button" class="btn btn-danger" onclick="removeIntegrante(this)">Eliminar</button>
            `;
            integrantesContainer.appendChild(newIntegranteDiv);
        }

        function removeIntegrante(button) { 
            const integranteDiv = button.parentNode;
            integranteDiv.parentNode.removeChild(integranteDiv);
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-center mb-4">Registrar Trabajo Académico Nuevo</h1>
        <form action="{{ route('RegistrarTrabajo') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="tipoTrabajoAcademico" class="form-label">Tipo de Trabajo Académico</label>
                <input type="text" class="form-control" id="tipoTrabajoAcademico" name="tipoTrabajoAcademico" placeholder="Tipo de Trabajo Académico" required>
                <div class="invalid-feedback">
                    Por favor, ingrese el tipo de trabajo académico.
                </div>
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del Trabajo Académico</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título del Trabajo Académico" required>
                <div class="invalid-feedback">
                    Por favor, ingrese el título del trabajo académico.
                </div>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Breve Descripción del Trabajo Académico</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Breve descripción del trabajo académico" required>
                <div class="invalid-feedback">
                    Por favor, ingrese una breve descripción del trabajo académico.
                </div>
            </div>
            <div class="mb-3">
                <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" placeholder="Fecha de Inicio" required>
                <div class="invalid-feedback">
                    Por favor, ingrese la fecha de inicio.
                </div>
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Área</label>
                <input type="text" class="form-control" id="area" name="area" placeholder="Área" required>
                <div class="invalid-feedback">
                    Por favor, ingrese el área.
                </div>
            </div>
            <div id="integrantesContainer" class="mb-3">
                <label for="integrantes" class="form-label">Integrantes</label>
                <div class="integrante-field input-group">
                    <input type="text" class="form-control" name="integrantes[]" placeholder="Boleta del Integrante de Trabajo terminal" required>
                    <button type="button" class="btn btn-danger" onclick="removeIntegrante(this)">Eliminar</button>
                </div>
            </div>
            <button type="button" class="btn btn-secondary mb-3" onclick="addIntegrante()">Agregar Integrante</button>
            <div class="mb-3">
                <label for="pdf_file" class="form-label">PDF de la Solicitud</label>
                <input type="file" class="form-control" id="pdf_file" name="pdf_file" required>
                <div class="invalid-feedback">
                    Por favor, suba el archivo PDF de la solicitud.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Trabajo</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        // Bootstrap validation
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>

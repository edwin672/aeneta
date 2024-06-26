<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Proveedores</title>
    @vite(['resources//css/app.scss', 'resources/js/app.js'])
</head>

<body>
    {{-- @include('inc.navbar') --}}
    <div class="container">
        @include('inc.messages')
        @yield('content')
    </div>
</body>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://unpkg.com/tippy.js@6.3.3/dist/tippy-bundle.umd.js"></script>
<link rel="stylesheet" href="https://unpkg.com/tippy.js@6.3.3/dist/tippy.css" />

@stack('scripts')

</html>

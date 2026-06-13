<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tabellone Treni')</title>

    <!-- Google Font: Share Tech Mono -->
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

    <!-- Vite (CSS e JS compilati) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('partials.header') 

    <main class="container my-5">
        @yield('content') 
    </main>
</body>
</html>
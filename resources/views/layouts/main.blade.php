/* **************************************************************************
Layout principale del sito, include l'header e definisce una sezione per il contenuto specifico di ogni pagina. Il layout utilizza Google Font "Share Tech Mono" per un aspetto più moderno e coerente con il tema dei treni, e include i file CSS e JS compilati tramite Vite, garantendo un caricamento efficiente delle risorse. Tutte le pagine del sito estenderanno questo layout per mantenere un aspetto uniforme e professionale su tutto il tabellone dei treni.
************************************************************************** */

// resources/views/layouts/main.blade.php

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
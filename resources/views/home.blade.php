/* ***************************************************************************
Vista principale del sito che estende il layout principale, imposta il titolo della pagina e include il componente train-table per visualizzare la tabella dei treni in partenza, passando i dati dei treni recuperati dal controller, permettendo agli utenti di vedere il tabellone delle partenze in tempo reale.
************************************************************************** */

// resources/views/pages/home.blade.php

@extends('layouts.main') // Estende il layout principale definito in layouts/main.blade.php, che include l'header e definisce una sezione per il contenuto specifico di ogni pagina

@section('title', 'Tabellone Partenze') // Imposta il titolo della pagina che verrà mostrato nel browser, con un valore di default "Tabellone Partenze" se non viene specificato un altro valore

@section('content') // Sezione del contenuto specifico per la pagina home, che include il componente train-table e gli passa i dati dei treni in partenza
    <x-train-table :trains="$trains" /> // Utilizza il componente Blade train-table, passando la variabile $trains che contiene i dati dei treni in partenza, per visualizzare la tabella dei treni in partenza
@endsection
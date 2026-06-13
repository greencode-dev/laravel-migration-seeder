<?php

/* **************************************************************************
Definisce la rotta principale del sito, che punta al metodo index del TrainController, responsabile di recuperare i treni in partenza da questo momento in avanti e visualizzarli nella vista home.blade.php, permettendo agli utenti di vedere il tabellone delle partenze in tempo reale. La rotta è nominata "home" per facilitare la generazione di URL e link all'interno dell'applicazione.
************************************************************************** */

// app/Http/Controllers/TrainController.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainController;

Route::get('/', [TrainController::class, 'index'])->name('home');

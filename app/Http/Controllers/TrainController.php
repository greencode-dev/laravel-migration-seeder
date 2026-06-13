<?php

/* **************************************************************************
Controller per gestire la logica di recupero dei treni in partenza da questo momento in avanti, ordinati per orario di partenza, e passare questi dati alla vista home.blade.php per visualizzare il tabellone delle partenze in tempo reale.
************************************************************************** */

// app/Http/Controllers/TrainController.php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index()
    {
        // Recupera i treni in partenza da questo momento in avanti per un tabellone "live"
        $trains = Train::where('orario_di_partenza', '>=', now())->orderBy('orario_di_partenza')->get();

        // Passa i treni alla vista home.blade.php per visualizzare il tabellone delle partenze
        return view('home', compact('trains'));
    }
}
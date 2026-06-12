<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index(Request $request)
    {
        // Controlla se l'utente vuole vedere tutti i treni (incluso il passato)
        $showAll = $request->has('all');

        $trains = Train::when(!$showAll, function ($query) {
            // Se non è attivo il filtro "all", mostra solo quelli futuri
            return $query->where('orario_di_partenza', '>=', now());
        })
        ->orderBy('orario_di_partenza')
        ->get();

        return view('home', compact('trains', 'showAll'));
    }
}
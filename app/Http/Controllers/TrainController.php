<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index()
    {
        // Recupera i treni in partenza da questo momento in avanti per un tabellone "live"
        $trains = Train::where('orario_di_partenza', '>=', now())->orderBy('orario_di_partenza')->get();

        return view('home', compact('trains'));
    }
}
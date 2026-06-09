<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index()
    {
        // Recupera i treni in partenza dalla data odierna in avanti
        $trains = Train::where('orario_di_partenza', '>=', today())->orderBy('orario_di_partenza')->get();

        return view('home', compact('trains'));
    }
}
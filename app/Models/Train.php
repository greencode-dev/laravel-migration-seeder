<?php

/* ***************************************************************************
Model Eloquent per rappresentare la tabella "trains" nel database, definendo i campi che possono essere assegnati in massa e i tipi di dati per gli orari di partenza e arrivo, permettendo di interagire con i dati dei treni in modo semplice e coerente all'interno dell'applicazione, ad esempio per recuperare i treni in partenza da questo momento in avanti e visualizzarli nella vista home.blade.php.
************************************************************************** */

// app/Models/Train.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory; // Include il trait HasFactory per abilitare l'uso delle factory per creare istanze del modello in modo semplice, ad esempio durante i test o la generazione di dati fittizi
    
    // Definisce i tipi di dati per i campi orario_di_partenza e orario_di_arrivo, specificando che devono essere trattati come oggetti DateTime, permettendo di utilizzare le funzionalità di Carbon per manipolare facilmente le date e gli orari dei treni
    protected $casts = [ 
        'orario_di_partenza' => 'datetime',
        'orario_di_arrivo' => 'datetime',
    ];
}
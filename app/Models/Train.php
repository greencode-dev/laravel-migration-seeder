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

    // Definisce i campi che possono essere assegnati in massa, consentendo di creare o aggiornare istanze del modello con questi attributi in modo semplice e sicuro attraverso array associativi, ad esempio quando si ricevono dati da un form o da un'API e si desidera creare un nuovo record di treno nel database.
    protected $fillable = [ 
        'azienda',
        'stazione_di_partenza',
        'stazione_di_arrivo',
        'orario_di_partenza',
        'orario_di_arrivo',
        'codice_treno',
        'numero_binario',
        'numero_carrozze',
        'in_orario',
        'cancellato'
    ];

    // Definisce i tipi di dati per i campi, consentendo di convertire automaticamente i valori quando vengono recuperati dal database o assegnati al modello, ad esempio per trattare gli orari di partenza e arrivo come oggetti DateTime invece che stringhe raw, facilitando così le operazioni di confronto e formattazione degli orari all'interno dell'applicazione.
    protected $casts = [ 
        'orario_di_partenza' => 'datetime',
        'orario_di_arrivo' => 'datetime',
    ];
}
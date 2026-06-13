<?php

/* **************************************************************************
Controller per gestire la logica di recupero dei treni in partenza da questo momento in avanti, ordinati per orario di partenza, e passare questi dati alla vista home.blade.php per visualizzare il tabellone delle partenze in tempo reale.
************************************************************************** */

// app/Http/Controllers/TrainController.php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TrainTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.train-table');
    }
}

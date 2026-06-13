/* **************************************************************************
Componente Blade per visualizzare la tabella dei treni in partenza, riceve una variabile $trains che contiene i dati dei treni in partenza, e gestisce la visualizzazione di ogni treno con i dettagli come codice, azienda, stazione di partenza, stazione di arrivo, orari, binario, numero di carrozze e stato (cancellato, in ritardo o in orario). Se non ci sono treni in partenza, mostra un messaggio informativo al centro della tabella, permettendo agli utenti di vedere il tabellone delle partenze in tempo reale con tutte le informazioni rilevanti sui treni.
************************************************************************** */

// resources/views/components/train-table.blade.php

@props(['trains']) // Componente Blade per visualizzare la tabella dei treni in partenza
//
<div class="train-board p-4 rounded shadow">
    <div class="table-responsive">
        <table class="table table-hover align-middle"> 
            <thead> // Intestazione della tabella con i nomi delle colonne
                <tr class="text-secondary small text-uppercase">
                    <th scope="col">Codice</th>
                    <th scope="col">Azienda</th>
                    <th scope="col">Stazione di Partenza</th>
                    <th scope="col">Stazione di Arrivo</th>
                    <th scope="col" class="text-center">Orario di Partenza</th>
                    <th scope="col" class="text-center">Orario di Arrivo</th>
                    <th scope="col" class="text-center">Binario</th>
                    <th scope="col" class="text-center">Carrozze</th>
                    <th scope="col" class="text-center">Stato</th>
                </tr>
            </thead>
            <tbody> // Corpo della tabella con i dati dei treni, gestendo anche il caso in cui non ci siano treni in partenza
                @forelse ($trains as $train) // Per ogni treno, viene mostrata una riga con i dettagli del treno e lo stato (cancellato, in ritardo o in orario)
                <tr>
                    <td class="fw-bold">{{ $train->codice_treno }}</td>
                    <td>{{ $train->azienda }}</td>
                    <td>{{ $train->stazione_di_partenza }}</td>
                    <td>{{ $train->stazione_di_arrivo }}</td>
                    <td class="text-center">{{ $train->orario_di_partenza->format('H:i') }}</td>
                    <td class="text-center">{{ $train->orario_di_arrivo->format('H:i') }}</td>
                    <td class="text-center">{{ $train->numero_binario }}</td>
                    <td class="text-center">{{ $train->numero_carrozze }}</td>
                    <td class="text-center">
                        @if($train->cancellato) // Se il treno è cancellato, viene evidenziato con uno stile specifico
                            <span class="status-cancelled fw-bold text-uppercase">Cancellato</span>
                        @elseif(!$train->in_orario) // Se il treno non è in orario ma non è cancellato, viene considerato in ritardo
                            <span class="status-delayed fw-bold text-uppercase">Ritardo</span>
                        @else // Altrimenti, il treno è in orario
                            <span class="status-on-time fw-bold text-uppercase">In Orario</span>
                        @endif
                    </td>
                </tr>
                @empty // Se non ci sono treni in partenza, viene mostrato un messaggio informativo al centro della tabella
                <tr>
                    <td colspan="9" class="text-center py-5 text-muted">
                        Nessun treno in partenza previsto per oggi.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
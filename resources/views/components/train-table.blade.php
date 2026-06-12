@props(['trains'])

<style>
    .train-board {
        font-family: 'Share Tech Mono', monospace;
        background-color: #222;
        color: #f8f9fa;
    }
    .table { color: inherit; }
</style>

<div class="train-board p-4 rounded shadow border border-secondary">
    <div class="table-responsive">
        <table class="table table-dark table-hover align-middle mb-0">
            <thead>
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
            <tbody>
                @forelse ($trains as $train)
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
                        @if($train->cancellato)
                            <span class="text-danger fw-bold text-uppercase">Cancellato</span>
                        @elseif($train->orario_di_arrivo < now())
                            <span class="text-secondary fw-bold text-uppercase">Arrivato</span>
                        @elseif($train->orario_di_partenza < now())
                            <span class="text-success fw-bold text-uppercase">In Viaggio</span>
                        @elseif(!$train->in_orario)
                            <span class="text-warning fw-bold text-uppercase">Ritardo</span>
                        @else
                            <span class="text-info fw-bold text-uppercase">In Orario</span>
                        @endif
                    </td>
                </tr>
                @empty
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
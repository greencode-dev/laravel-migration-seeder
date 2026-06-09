@extends('layouts.main')

@section('title', 'Tabellone Partenze')

@section('content')
<div class="train-board p-4 rounded shadow">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr class="text-secondary small text-uppercase">
                    <th scope="col">Codice</th>
                    <th scope="col">Azienda</th>
                    <th scope="col">Partenza</th>
                    <th scope="col">Destinazione</th>
                    <th scope="col">Orario</th>
                    <th scope="col">Binario</th>
                    <th scope="col">Stato</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($trains as $train)
                <tr>
                    <td class="fw-bold">{{ $train->codice_treno }}</td>
                    <td>{{ $train->azienda }}</td>
                    <td>{{ $train->stazione_di_partenza }}</td>
                    <td>{{ $train->stazione_di_arrivo }}</td>
                    <td>{{ $train->orario_di_partenza->format('H:i') }}</td>
                    <td>{{ $train->binario }}</td>
                    <td>
                        @if($train->cancellato)
                            <span class="status-cancelled fw-bold text-uppercase">Cancellato</span>
                        @elseif(!$train->in_orario)
                            <span class="status-delayed fw-bold text-uppercase">Ritardo</span>
                        @else
                            <span class="status-on-time fw-bold text-uppercase">In Orario</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        Nessun treno in partenza previsto per oggi.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
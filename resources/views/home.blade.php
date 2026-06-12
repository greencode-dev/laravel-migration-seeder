@extends('layouts.main')

@section('title', 'Tabellone Partenze')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-warning mb-0" style="font-family: 'Share Tech Mono', monospace;">TABELLONE FERROVIARIO</h1>
            <x-filter-switch :showAll="$showAll" />
        </div>

        <x-train-table :trains="$trains" />
    </div>
@endsection
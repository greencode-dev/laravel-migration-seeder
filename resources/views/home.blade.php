@extends('layouts.main')

@section('title', 'Tabellone Partenze')

@section('content')
    <x-train-table :trains="$trains" />
@endsection
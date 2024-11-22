@extends('layouts.admin')

@section('content')
<div class="container py-4">
    {{-- Titolo --}}
    <div class="row">
        <div class="col">
            <h1>Dettagli Ticket #{{ $ticket->id }}</h1>
            <a href="{{ route('tickets.index') }}" class="btn btn-secondary mt-3">Torna alla Lista</a>
        </div>
    </div>

    {{-- Dettagli del Ticket --}}
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Informazioni Ticket
                </div>
                <div class="card-body">
                    <p><strong>Titolo:</strong> {{ $ticket->title }}</p>
                    <p><strong>Descrizione:</strong></p>
                    <p>{{ $ticket->description }}</p>
                    <p><strong>Stato:</strong> <span class="badge bg-{{ $ticket->status === 'open' ? 'success' : ($ticket->status === 'in_progress' ? 'warning' : 'danger') }}">
                        {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}</span></p>
                    <p><strong>Categoria:</strong> {{ $ticket->category->name }}</p>
                    <p><strong>Operatore Assegnato:</strong> {{ $ticket->operator->name }}</p>
                    <p><strong>Data Creazione:</strong> {{ $ticket->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Ultima Modifica:</strong> {{ $ticket->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

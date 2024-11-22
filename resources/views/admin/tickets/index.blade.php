@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-3">Lista Ticket</h1>

    <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">Crea Nuovo Ticket</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Stato</th>
                <th>Operatore</th>
                <th>Categoria</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ ucfirst($ticket->status) }}</td>
                    <td>{{ $ticket->operator->name }}</td>
                    <td>{{ $ticket->category->name }}</td>
                    <td>
                        <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-info btn-sm">Dettagli</a>
                        <form action="{{ route('tickets.updateStatus', $ticket) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                <option value="open" {{ $ticket->status === 'open' ? 'selected' : '' }}>Aperto</option>
                                <option value="in_progress" {{ $ticket->status === 'in_progress' ? 'selected' : '' }}>In Corso</option>
                                <option value="closed" {{ $ticket->status === 'closed' ? 'selected' : '' }}>Chiuso</option>
                            </select>
                        </form>
                        <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro?')">Elimina</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nessun ticket trovato.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- {{ $tickets->links() }} --}}
</div>
@endsection

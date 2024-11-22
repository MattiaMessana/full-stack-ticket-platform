@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-3">Crea Nuovo Ticket</h1>

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select name="category_id" id="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="operator_id" class="form-label">Operatore</label>
            <select name="operator_id" id="operator_id" class="form-select" required>
                @foreach ($operators as $operator)
                    <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Stato</label>
            <select name="status" id="status" class="form-select" required>
                <option value="open">Aperto</option>
                <option value="in_progress">In Corso</option>
                <option value="closed">Chiuso</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salva</button>
    </form>
</div>
@endsection

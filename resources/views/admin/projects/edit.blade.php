@extends('layouts.app')

@section('page-title', 'Modifica Progetto')

@section('main-content')
<div class="container">
    <h2>Modifica Progetto: {{ $project->title }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.projects.update', $project->slug) }}">
        @csrf
        @method('PUT')

        <!-- Campi del form qui -->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Tecnologia</label>
            <select name="type_id" class="form-select">
                <option value="">Select Technology</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ (old('type_id', $project->type_id ?? '') == $type->id) ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select> 
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">URL dell'immagine</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $project->image) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $project->date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Aggiorna <i class="fa-solid fa-pen"></i></button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('page-title', 'Nuovo Progetto')

@section('main-content')
<div class="container">
    <h2 class="text-primary">Create New Project</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.projects.store') }}">
        @csrf

        <!-- Campi del form qui -->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Linguaggi</label>
            <select name="type_id" class="form-select">
                <option value="">Select Language</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ (old('type_id', $project->type_id ?? '') == $type->id) ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select> 
        </div>

        <div class="mb-3">
            <label for="technologies">Tecnologie:</label>
            <div class="d-flex">
                @foreach($technologies as $technology)
                    <span class="pe-1">{{ $technology->name }}</span>
                    <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="me-3">
                @endforeach     
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">URL dell'immagine</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Create <i class="fa-solid fa-plus"></i></button>
    </form>
</div>
@endsection
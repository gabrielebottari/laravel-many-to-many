@extends('layouts.app')

@section('page-title', 'Aggiungi Tecnologia')

@section('main-content')
<div class="container">
    <h2 class="text-primary">Nuova Tecnologia</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.technologies.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salva <i class="fa-solid fa-floppy-disk"></i></button>
    </form>
</div>
@endsection
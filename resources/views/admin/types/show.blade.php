@extends('layouts.app')

@section('page-title', $type->name)

@section('main-content')
<div class="container">
    <h2 class="text-primary">Dettagli Tipo</h2>

    <div class="mb-3">
        <label class="form-label"><strong>Nome:</strong></label>
        <p>{{ $type->name }}</p>
    </div>

    <a href="{{ route('admin.types.index') }}" class="btn btn-primary">Go Back <i class="fa-solid fa-left-long"></i></a>
</div>
@endsection
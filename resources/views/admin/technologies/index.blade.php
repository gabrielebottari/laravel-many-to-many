@extends('layouts.app')

@section('page-title', 'Tutte le Tecnologie')

@section('main-content')
<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <h2 class="text-primary">Tecnologie</h2>

            <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary mb-3">Aggiungi Tecnologie <i class="fa-solid fa-plus"></i></a>

            <table class="table table-bordered table-striped table-primary table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr>
                            <td>{{ $technology->id }}</td>
                            <td>{{ $technology->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.technologies.show', $technology->slug) }}" class="btn btn-sm btn-primary me-2">Info <i class="fa-solid fa-circle-info"></i></a>
                                <a href="{{ route('admin.technologies.edit', $technology->slug) }}" class="btn btn-sm btn-warning me-2">Modifica <i class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa tecnologia?');">Elimina <i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
<div class="container bg-primary-subtle p-5">
    <div class="d-flex justify-content-center p-3">

        <div class="card mb-3 w-50 h-100">
            {{-- <img src="{{ $project->image }}" class="card-img-top" alt="{{ $project->title }}"> --}}
            @if ($project->image)
                <img src="{{ strpos($project->image, 'http') === 0 ? $project->image : asset('storage/' . $project->image) }}" alt="Immagine di {{ $project->title }}">
            @endif
            <h5 class="card-title p-2">{{ $project->title }}</h5>
            <div class="px-2">
                @forelse ($project->technologies as $technology)
                    <span class="badge text-bg-primary">{{ $technology->name }}</span>
                @empty
                    <p>-</p>
                @endforelse
            </div> 
            <div class="card-body">
                <p class="card-text">{{ $project->description }}</p>
                <p class="card-text"><small class="text-muted">{{ $project->date }}</small></p>
            </div>
        </div>

    </div>


    <div class="d-flex justify-content-between w-50 m-auto">
        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-primary">Modifica <i class="fa-solid fa-pen"></i></a>

        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina <i class="fa-solid fa-trash-can"></i></button>
        </form>
    </div>
</div>
@endsection
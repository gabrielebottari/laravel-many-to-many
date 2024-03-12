@extends('layouts.app')

@section('page-title', 'Tutti i Progetti')

@section('main-content')
    <div class="container">
        <h1 class="text-primary text-center">Progetti</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3 ms-4">Crea Nuovo Progetto <i class="fa-solid fa-plus"></i></a>
        <div class="row p-3">
            @foreach ($projects as $project)
                <div class="col-md-4 p-3">
                    <a href="{{ route('admin.projects.show', $project->slug) }}" class="text-decoration-none text-dark">
                        <div class="card mb-3">
                            
                            {{-- <img src="{{ $project->image }}" class="card-img-top" alt="{{ $project->title }}"> --}}
                            @if ($project->image_path)
                                <img src="{{ strpos($project->image, 'http') === 0 ? $project->image_path : asset('storage/' . $project->image) }}" alt="Immagine di {{ $project->title }}">
                            @endif
                            <h5 class="card-title p-2">{{ $project->title }}</h5>
                            @if ($project->type)
                                <p class="px-2">Technology: {{ $project->type->name }}</p>
                            @endif
                            <div class="px-2">
                                @forelse ($project->technologies as $technology)
                                    <span class="badge text-bg-primary">{{ $technology->name }}</span>
                                @empty
                                    <p>-</p>
                                @endforelse
                            </div> 
                            <div class="card-body m-2">
                                <p class="card-text">{{ $project->description }}</p>
                                <p class="card-text"><small class="text-muted">{{ $project->date }}</small></p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
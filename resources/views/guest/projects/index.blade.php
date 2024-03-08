@extends('layouts.guest')

@section('page-title', 'Tutti i Progetti')

@section('main-content')
    
    <div class="container bg-primary-subtle">
        <h1 class="p-3 text-center text-primary">Progetti</h1>
        <a href="{{ route('login') }}" class="btn btn-primary mb-3 ms-4">Accedi Per Inserire un nuovo Progetto <i class="fa-solid fa-right-to-bracket"></i></a>
        <div class="row p-3">
            @foreach ($projects as $project)
                <div class="col-md-4 p-3">
                    <a href="{{ route('projects.show', $project->slug) }}" class="text-decoration-none text-dark">
                        <div class="card mb-3">
                            <img src="{{ $project->image }}" class="card-img-top" alt="{{ $project->title }}">
                            <h5 class="card-title p-2">{{ $project->title }}</h5>
                            @if ($project->type)
                                <p class="px-2">Languages: {{ $project->type->name }}</p>
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
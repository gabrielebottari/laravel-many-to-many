@extends('layouts.guest')

@section('page-title', $project->title)

@section('main-content')
<div class="container bg-primary-subtle p-5">
    <div class="d-flex justify-content-center p-3">

        <div class="card mb-3 w-50 h-100">
            <img src="{{ $project->image }}" class="card-img-top h-75" alt="{{ $project->title }}">
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
            <div class="card-body">
                <p class="card-text">{{ $project->description }}</p>
                <p class="card-text"><small class="text-muted">{{ $project->date }}</small></p>
            </div>
        </div>

    </div>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('login', $project->slug) }}" class="btn btn-primary">Accedi per Modificare o eliminare il tuo Progetto <i class="fa-solid fa-right-to-bracket"></i></a>
    </div>
</div>
@endsection
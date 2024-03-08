@extends('layouts.app')

@section('page-title', $technology->name)

@section('main-content')
<div class="container">
    <h2 class="text-primary">Tecnologia: {{ $technology->name }}</h2>
    <h3>Progetti che utilizzano questa tecnologia:</h3>
        
    @if($technology->projects->isEmpty())
        <p>Non ci sono progetti che utilizzano questa tecnologia al momento.</p>
    @else
        <ul>
            @foreach($technology->projects as $project)
                <li>{{ $project->title }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary">Go Back <i class="fa-solid fa-left-long"></i></a>
</div>
@endsection
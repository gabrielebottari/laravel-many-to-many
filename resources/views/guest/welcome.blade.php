@extends('layouts.guest')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="bg-primary-subtle">
                <div class="p-5">
                    <h1 class="text-center text-primary">
                        Boolfolio
                    </h1>

                    <h3 class="mb-3">Welcome Dear Guest!</h3>
                    <a class="btn btn-primary mb-3" href="{{ route('projects.index') }}">Dai un'occhiata a tutti i Progetti <i class="fa-solid fa-diagram-project"></i></a>

                    <p class="mb-3 bg-danger fs-3 p-2 text-white rounded-2">Ricorda: per aggiungere o modificare i Progetti devi fare il Login!</p>

                        {{-- Elenco delle Tecnologie --}}
                        <h4 class="mt-4">Tecnologie Disponibili:</h4>
                        <div class="bg-info p-3 text-center rounded-2">
                            @foreach ($technologies as $technology)
                                <span class="badge text-bg-primary fs-5 p-2 m-1"> {{ $technology->name }}</span>
                            @endforeach
                        </div>

                        {{-- Elenco dei Tipi --}}
                        <h4 class="mt-4">Tipi di Progetti:</h4>
                        <div class="bg-info p-3 text-center rounded-2 mb-3">
                            @foreach ($types as $type)
                                <span class="badge text-bg-primary fs-5 p-2 m-1">{{ $type->name }}</span>
                            @endforeach
                        </div>

                    <div>
                        <a class="btn btn-success" href="{{ route('login') }}">Login <i class="fa-solid fa-right-to-bracket"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
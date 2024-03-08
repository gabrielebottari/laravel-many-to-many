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

                    <p class="mb-3">Ricorda: per aggiungere o modificare i Progetti devi fare il login!</p>

                    <a class="btn btn-success" href="{{ route('login') }}">Login <i class="fa-solid fa-right-to-bracket"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="bg-primary-subtle">
                <div class="p-5">
                    <h1 class="text-center text-primary">
                        Sei loggato! <i class="fa-solid fa-hands-clapping"></i>
                    </h1>

                    <h3 class="mb-3">
                        Benvenuto, {{ auth()->user()->name }} <i class="fa-solid fa-hand-point-down"></i>
                    </h3>

                    <a class="btn btn-primary mb-3" href="{{ route('admin.projects.index') }}">Dai un'occhiata a tutti i Progetti <i class="fa-solid fa-diagram-project"></i></a>

                    <div class="d-flex justify-content-center">
                        <img src="{{ Vite::asset('resources/img/login.webp') }}" alt="login" class="w-50">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.guest')

@section('main-content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <form method="POST" action="{{ route('register') }}" class="w-50">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="form-label">
                Name
            </label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="form-label">
                Email
            </label>
            <input type="email" id="email" name="email" class="form-control">
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="form-label">
                Password
            </label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="form-label">
                Conferma Password
            </label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>

        <div class="mt-4">
            <a href="{{ route('login') }}" class="me-3">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn btn-primary">
                Register <i class="fa-regular fa-id-card"></i>
            </button>
        </div>
    </form>
@endsection
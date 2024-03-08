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


    <form method="POST" action="{{ route('login') }}" class="w-50">
        @csrf


        <!-- Email Address -->
        <div>
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

        <!-- Remember Me -->
        <div class="mt-4">
            <label for="remember_me">
                <span>Remember me</span>
                <input id="remember_me" type="checkbox" name="remember">
            </label>
        </div>

        <div class="mt-4">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="me-3">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="btn btn-primary">
                Log in <i class="fa-solid fa-right-to-bracket"></i>
            </button>
        </div>
    </form>
@endsection
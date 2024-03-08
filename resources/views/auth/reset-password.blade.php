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

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

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

        <div>
            <button type="submit" class="btn btn-primary">
                Reset Password
            </button>
        </div>
    </form>
@endsection

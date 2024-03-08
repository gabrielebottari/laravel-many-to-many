@extends('layouts.guest')

@section('main-content')
    <div>
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="w-50">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="form-label">
                Email
            </label>
            <input type="email" id="email" name="email" class="form-control">
        </div>

        <div>
            <button type="submit" class="btn btn-primary">
                Email Password Reset Link
            </button>
        </div>
    </form>
@endsection

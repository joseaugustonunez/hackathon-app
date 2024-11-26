@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="login-container">
        <div class="login-card">
            <h2 class="login-header">{{ __('Login') }}</h2>
            <div class="login-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">{{ __('Email Address') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                               class="@error('email') is-invalid @enderror">
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required
                               class="@error('password') is-invalid @enderror">
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">{{ __('Remember Me') }}</label>
                    </div>

                    <button type="submit" class="login-btn">{{ __('Login') }}</button>

                    <div class="text-center">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="link">{{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

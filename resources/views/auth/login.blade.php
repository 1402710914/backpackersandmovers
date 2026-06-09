@extends('layouts.auth-theme', ['title' => 'Login'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="mb-3 text-center">Sign in</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="theme-btn border-0 w-100 mb-2">Login</button>
                    <div class="d-flex justify-content-between small">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        @endif
                        <a href="{{ route('register') }}">Create account</a>
                    </div>
                    <p class="small text-center mt-3 mb-0"><a href="{{ route('admin.login') }}">Admin login</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

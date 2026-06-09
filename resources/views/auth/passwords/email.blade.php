@extends('layouts.auth-theme', ['title' => 'Reset password'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="mb-3 text-center">Reset password</h4>
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="theme-btn border-0 w-100">Send reset link</button>
                    <p class="small text-center mt-3 mb-0"><a href="{{ route('login') }}">Back to login</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

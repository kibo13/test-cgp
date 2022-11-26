@extends('layouts.master')

@section('content-head')
<title>{{ __('Login') }} | {{ config('app.name') }} </title>
<link rel="stylesheet" href="{{ asset('css/vendors/bootstrap.min.css') }}">
@endsection

@section('content-body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="username">{{ __('Username') }}</label>
                            <div class="col-md-6">
                                <input class="form-control @error('name') is-invalid @enderror"
                                       id="username"
                                       type="text"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required
                                       autocomplete="name"
                                       autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="password">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       type="password"
                                       name="password"
                                       required
                                       autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

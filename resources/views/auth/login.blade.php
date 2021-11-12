@extends("layouts.core")

<!-- Login -->

@section("title")
    Sign In
@endsection

<!-- -->

@section("content")
<div class="d-flex flex-center flex-column flex-column-fluid">
    <div class="w-lg-500px p-10 p-lg-15 mx-auto">

        <!-- Form -->
        <!-- TODO | established form action -->
        <form id="kt_sign_in_form" class="form w-100" method="post" action="{{ route('login') }}">
            @csrf
            <div class="text-center mb-10">
                <h1 class="text-dark mb-3">
                    Sign In
                </h1>
                <div class="text-gray-400 fw-bold fs-4">
                    New Here?
                    <a class="link-primary fw-bolder" href="{{ route('register')}} " tabindex="6">
                        Create an Account
                    </a>
                </div>
            </div>
            <div class="fv-row mb-10">
                <label class="form-label fs-6 fw-bolder text-dark">
                    Email
                </label>
                <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" autocomplete="email" name="email" type="text" value="{{ old('email') }}" required autofocus tabindex="1"/>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="fv-row mb-10">
                <div class="d-flex flex-stack mb-2">
                    <label class="form-label fw-bolder text-dark fs-6 mb-0">
                        Password
                    </label>
                    @if (Route::has('password.request'))
                        <a class="link-primary fs-6 fw-bolder" href="{{ route('password.request') }}" tabindex="5">
                            Forgot Password ?
                        </a>
                    @endif
                </div>
                <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" autocomplete="current-password" name="password" type="password" required tabindex="2"/>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="fv-row mb-10">
                <div class="d-flex flex-stack mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} tabindex="3">

                        <label class="form-label fw-bolder text-dark fs-6 mb-0" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <button id="kt_sign_in_submit" class="btn btn-lg btn-primary fw-bolder me-3 my-2" type="submit" tabindex="4">
                        <span class="indicator-label">
                            Sign In
                        </span>
                        <span class="indicator-progress">
                            Please wait...
                        </span>
                    </button>
                </div>
            </div>
        </form>
        <!-- Form -->
        
    </div>
</div>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection --}}

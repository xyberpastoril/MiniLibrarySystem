@extends("layouts.core")

<!-- Reset Password -->

@section("title")
    Reset Password
@endsection

<!-- -->

@section('custom_css')
    
@endsection

<!-- -->


@section("content")
    <!-- Content | New Password -->
    <div class="d-flex flex-center flex-column flex-column-fluid">
        <div class="w-lg-550px p-10 p-lg-15 mx-auto">

            <!-- Form -->
            <form id="kt_new_password_form" class="form w-100" method="get" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">
                        Setup New Password
                    </h1>
                    <div class="text-gray-400 fw-bold fs-4">
                        Already have reset your password ?
                        <a class="link-primary fw-bolder" href="{{ route('login') }}">
                            Sign in here
                        </a>
                    </div>
                </div>
                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <div class="mb-1">
                        <label class="form-label fw-bolder text-dark fs-6 required">
                            Email
                        </label>
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" autocomplete="email" name="email" type="email" placeholder="" value="{{ $email ?? old('email') }}" required autofocus/>
                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <div class="mb-1">
                        <label class="form-label fw-bolder text-dark fs-6 required">
                            Password
                        </label>
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" autocomplete="new-password" name="password" type="password" placeholder="" required />
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="text-muted">
                        Use 8 or more characters with a mix of uppercase & lowercase letters, numbers &amp; symbols. (ex. P@ssw0rd)
                    </div>
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fw-bolder text-dark fs-6 required">
                        Confirm Password
                    </label>
                    <input class="form-control form-control-lg form-control-solid" autocomplete="new-password" name="password_confirmation" type="password" placeholder="" />
                </div>
                <div class="text-center">
                    <button id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder" type="submit">
                        <span class="indicator-label">
                            Submit
                        </span>
                        <span class="indicator-progress">
                            Please wait...
                        </span>
                    </button>
                </div>
            </form>
            <!-- End Form -->
            
        </div>
    </div>
    <!-- End Content -->
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends("layouts.core")

<!-- Reset Password -->

@section("title")
    Confirm Password
@endsection

<!-- -->

@section('custom_css')
    
@endsection

<!-- -->


@section("content")
    <!-- Content | Confirm Password -->
    <div class="d-flex flex-center flex-column flex-column-fluid">
        <div class="w-lg-550px p-10 p-lg-15 mx-auto">

            <!-- Form -->
            <form id="kt_new_password_form" class="form w-100" method="get" action="{{ route('password.confirm') }}">
                @csrf

                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">
                        Confirm Password
                    </h1>
                </div>
                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <div class="mb-1">
                        <label class="form-label fw-bolder text-dark fs-6 required">
                            Password
                        </label>
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" autocomplete="current-password" name="password" type="password" placeholder="" required />
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

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

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
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

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
    <!-- Content | Reset Password -->
    <div class="d-flex flex-center flex-column flex-column-fluid">
        <div class="w-lg-500px p-10 p-lg-15 mx-auto">

            <!-- Form -->
            <!-- TODO | established form action -->
            <form id="kt_password_reset_form" class="form w-100" method="post" action="{{ route('password.email') }}">
                @csrf
                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">
                        Forgot Password ?
                    </h1>
                    <div class="text-gray-400 fw-bold fs-4">
                        Enter your email to reset your password.
                    </div>
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fw-bolder text-gray-900 fs-6">
                        Email
                    </label>
                    <input class="form-control form-control-solid @error('email') is-invalid @enderror" autocomplete="email" name="email" type="email" placeholder="" value="{{ old('email') }}" require autofocus />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4" type="submit">
                        <span class="indicator-label">
                            Submit
                        </span>
                        <span class="indicator-progress">
                            Please wait...
                        </span>
                    </button>
                    <a class="btn btn-lg btn-light-primary fw-bolder" href="{{ route('login') }}">
                        Cancel
                    </a>
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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

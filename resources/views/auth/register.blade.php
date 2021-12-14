@extends("layouts.core")

<!-- Register -->

@section("title")
    Register
@endsection

<!-- -->

@section("content")
<!-- Content | Sign Up -->
<div class="d-flex flex-center flex-column flex-column-fluid">
    <div class="w-lg-600px p-10 p-lg-15 mx-auto">

        <!-- Form -->
        <!-- TODO | established form action -->
        <form id="kt_sign_up_form" class="form w-100" method="post" action="{{ route('register') }}">
            @csrf
            <div class="mb-10 text-center">
                <h1 class="text-dark mb-3">
                    Create an Account
                </h1>
                <div class="text-gray-400 fw-bold fs-4">
                    Already have an account?
                    <a class="link-primary fw-bolder" href="{{ route('login') }}">
                        Sign in here
                    </a>
                </div>
            </div>
            <div class="row fv-row mb-7">
                <div class="col-xl-6">
                    <label class="form-label fw-bolder text-dark fs-6 required">
                        First Name
                    </label>
                    <input id="first_name" class="form-control form-control-lg form-control-solid @error('first_name') is-invalid @enderror" autocomplete="first_name" name="first_name" type="text" placeholder="" value="{{ old('first_name') }}" required autofocus/>

                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <label class="form-label fw-bolder text-dark fs-6 required">
                        Last Name
                    </label>
                    <input id="last_name" class="form-control form-control-lg form-control-solid @error('last_name') is-invalid @enderror" autocomplete="last_name" name="last_name" type="text" placeholder="" value="{{ old('last_name') }}" required/>

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6 required">
                    Email
                </label>
                <input id="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" autocomplete="email" name="email" type="email" placeholder="" value="{{ old('email') }}" required/>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Gender -->
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6 required">
                    Gender
                </label>
                <select name="gender" class="form-select form-select-lg form-select-solid @error('gender') is-invalid @enderror" required>
                    <option>Select Gender</option>
                    <option value="Male" @if (old('gender') == 'Male') selected="selected" @endif>Male</option>
                    <option value="Female" @if (old('gender') == 'Female') selected="selected" @endif>Female</option>
                    <option value="LGBT" @if (old('gender') == 'LGBT') selected="selected" @endif>LGBT</option>
                    <option value="Rather not say" @if (old('gender') == 'Rather not say') selected="selected" @endif>Rather not say</option>
                </select>
                @error('gender')
                    <div class="fv-plugins-message-container invalid-feedback">
                        <div data-field="gender">{{ $message }}</div>
                    </div>
                @enderror
            </div>

            <div class="mb-10 fv-row" data-kt-password-meter="true">
                <div class="mb-1">
                    <label class="form-label fw-bolder text-dark fs-6 required">
                        Password
                    </label>
                    <div class="position-relative mb-3">
                        <input id="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" autocomplete="new-password" name="password" type="password" placeholder="" required/>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="text-muted">
                    Use 8 or more characters with a mix of uppercase & lowercase letters, numbers &amp; symbols. (ex. P@ssw0rd)
                </div>
            </div>
            <div class="fv-row mb-5">
                <label class="form-label fw-bolder text-dark fs-6 required">
                    Confirm Password
                </label>
                <input id="password-confirm" class="form-control form-control-lg form-control-solid" autocomplete="new-password" name="password_confirmation" type="password" placeholder="" required/>
            </div>
            <div class="fv-row mb-10">
                <label class="form-check form-check-custom form-check-inline form-check-solid">
                    <input class="form-check-input" name="toc" type="checkbox" value="1" required />
                    <span class="form-check-label fw-bold text-gray-700 fs-6">
                        I Agree &amp;
                        <a class="ms-1 link-primary" href="#">
                            Terms and conditions
                        </a>
                        .
                    </span>
                </label>
            </div>
            <div class="text-center">
                <button id="kt_sign_up_submit" class="btn btn-lg btn-primary" type="submit">
                    <span class="indicator-label">
                        Submit
                    </span>
                    <span class="indicator-progress">
                        Please wait...
                    </span>
                </button>
            </div>
        </form>
        <!-- Form -->

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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                    {{ __('Register') }}
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

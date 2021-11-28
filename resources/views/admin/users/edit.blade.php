@extends("layouts.core")

<!-- Admin > Users > User Details -->

@section('title')
    User Details
@endsection

<!-- -->

@section('custom_css')
    
@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('users.index') }}" class="text-muted text-hover-primary">Users</a>
    </li>

    <!-- Item -->
    <li class="breadcrumb-item text-dark">User Details</li>

@endsection

<!-- -->

@section("content")

    <div class="card mb-5 mb-xl-10">

        <form action="#" class="form" id="kt_form_user_details">
            <div class="card-body p-9">
                <div class=" d-flex flex-column flex-lg-row">

                    <!-- Aside -->
                    <div class="flex-column flex-md-row-auto w-75 w-lg-200px w-xxl-225px">
                        <div class="row">

                            <!-- Profile Picture-->
                            <div class="col-lg-12">

                                <!-- Label -->
                                <label class="col-lg-12 col-form-label fw-bold fs-6">Profile Picture</label>
                                <br>

                                <!-- Image input -->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset("media/avatars/blank.png") }}')">
                                    
                                    <!-- Preview existing avatar -->
                                    <div class="image-input-wrapper w-175px h-175px" style="background-image: url('@if($user->cover_url == null){{ asset("media/avatars/blank.png") }}@else{{ asset("media/avatars/$user->cover_url") }}@endif')"></div>
                                    
                                    <!-- Label -->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change profile picture">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="hidden" name="picture_remove">
                                    </label>
                                    
                                    <!-- Cancel -->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel profile picture">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>

                                    <!-- Remove -->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove profile picture">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>

                                <!-- Hint -->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-md-row-fluid ms-lg-12">
                        <!-- Username -->
                        <div class="row mb-10">
                            <label class="col-lg-2 col-form-label fw-bold fs-6 required">
                                <span>Username</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="username" class="form-control form-control-lg form-control-solid" value="{{ $user->username }}" placeholder="Enter Username" required autofocus/>
                            </div>
                        </div>

                        <div class="row mb-10">

                            <!-- First Name -->
                            <div class="col-xl-6">
                                <label class="col-form-label fw-bold fs-6 required">
                                    First Name
                                </label>
                                <input id="first_name" class="form-control form-control-lg form-control-solid" name="first_name" type="text" placeholder="Enter First Name" value="{{ $user->first_name }}" required/>
                            </div>

                            <!-- Last Name -->
                            <div class="col-xl-6">
                                <label class="col-form-label fw-bold fs-6 required">
                                    Last Name
                                </label>
                                <input id="last_name" class="form-control form-control-lg form-control-solid" name="last_name" type="text" placeholder="Enter Last Name" value="{{ $user->last_name }}" required/>
                            </div>

                        </div>

                        <!-- Email -->
                        <div class="row mb-10">
                            <label class="col-lg-2 col-form-label fw-bold fs-6 required">
                                <span>Email</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="email" name="email" class="form-control form-control-lg form-control-solid" value="{{ $user->email }}" placeholder="Enter Email" />
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="row mb-10">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span>Gender</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <select name="genre" class="form-select form-select-lg form-select-solid">
                                    <option>Select Gender</option>
                                    <option value="Male" @if ($user->gender == 'Male') selected="selected" @endif>Male</option>
                                    <option value="Female" @if ($user->gender == 'Female') selected="selected" @endif>Female</option>
                                </select>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="row mb-10">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span>Address</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="address" class="form-control form-control-lg form-control-solid" value="{{ $user->address }}" placeholder="Enter Address" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <div id="btn_group" class="btn-group visually-hidden">
                    <button type="reset" id="btn_discard" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                <button id="btn_delete" class="btn btn-danger">Delete</button>
            </div>
        </form>
        
    </div>

@endsection

<!-- -->

@section("vendor_js")

@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset("js/custom/admin/users-page/user-details.js") }}"></script>
@endsection
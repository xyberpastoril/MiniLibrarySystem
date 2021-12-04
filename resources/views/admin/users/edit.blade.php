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

        <div class="card-body p-9">
            <form id="user_update_form" method="POST" action="{{ route('users.update', $user->id) }}"  class="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset("media/avatars/blank.png") }}'); background-position: center;">

                                    <!-- Preview existing avatar -->
                                    <div class="image-input-wrapper w-175px h-175px" style="background-image: url('@if($user->cover_url == null){{ asset("media/avatars/blank.png") }}@else{{ asset("media/avatars/$user->cover_url") }}@endif'); background-position: center;"></div>

                                    <!-- Label -->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change profile picture">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="cover_url" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="cover_remove">
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

                                @error('cover_url')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="cover_url">{{ $message }}</div>
                                    </div>
                                @enderror
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
                                <input type="text" name="username" class="form-control form-control-lg form-control-solid @error('username') is-invalid @enderror" value="{{ $user->username }}" placeholder="Enter Username" autofocus/>
                                @error('username')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="username">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-10">

                            <!-- First Name -->
                            <div class="col-xl-6">
                                <label class="col-form-label fw-bold fs-6 required">
                                    First Name
                                </label>
                                <input id="first_name" class="form-control form-control-lg form-control-solid @error('first_name') is-invalid @enderror" name="first_name" type="text" placeholder="Enter First Name" value="{{ $user->first_name }}"/>
                                @error('first_name')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="first_name">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="col-xl-6">
                                <label class="col-form-label fw-bold fs-6 required">
                                    Last Name
                                </label>
                                <input id="last_name" class="form-control form-control-lg form-control-solid @error('last_name') is-invalid @enderror" name="last_name" type="text" placeholder="Enter Last Name" value="{{ $user->last_name }}"/>
                                @error('last_name')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="last_name">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <!-- Email -->
                        <div class="row mb-10">
                            <label class="col-lg-2 col-form-label fw-bold fs-6 required">
                                <span>Email</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="email" name="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" value="{{ $user->email }}" placeholder="Enter Email" />
                                @error('email')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="email">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="row mb-10">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span>Gender</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <select name="gender" class="form-select form-select-lg form-select-solid @error('gender') is-invalid @enderror">
                                    <option>Select Gender</option>
                                    <option value="Male" @if ($user->gender == 'Male') selected="selected" @endif>Male</option>
                                    <option value="Female" @if ($user->gender == 'Female') selected="selected" @endif>Female</option>
                                </select>
                                @error('gender')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="gender">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="row mb-10">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span>Address</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="address" class="form-control form-control-lg form-control-solid @error('address') is-invalid @enderror" value="{{ $user->address }}" placeholder="Enter Address" />
                                @error('address')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="address">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>

            </form>
        </div>

        <!-- Actions -->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <div id="btn_group" class="btn-group visually-hidden">
                <button type="reset" form="user_update_form" id="btn_discard" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button type="submit" form="user_update_form" id="btn_save" class="btn btn-primary">Save Changes</button>
            </div>
            <form method="POST" id="user_destroy_form" action="{{  route('users.destroyWithRedirect', $user->id) }}" class="form">
                @csrf
                @method("DELETE")
                <button type="submit" id="btn_delete" class="btn btn-danger">Delete</button>
            </form>
        </div>

    </div>

@endsection

<!-- -->

@section("vendor_js")

@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset("js/custom/admin/users-page/user-details.js") }}"></script>
@endsection

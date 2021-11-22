@extends("layouts.core")

<!-- Admin > User > User Details -->

@section('title')
    User Details
@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    {{-- <li class="breadcrumb-item text-muted">
        <a href="#" class="text-muted text-hover-primary">Home</a>
    </li> --}}

    <!-- Dash -->
    {{-- <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li> --}}

    <!-- Item -->
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('users.index') }}" class="text-muted text-hover-primary">Users</a>
    </li>

    <!-- Dash -->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>

    <!-- Item -->
    <li class="breadcrumb-item text-dark">User Details
    </li>

@endsection

<!-- -->

@section("content")

    <div class="card mb-5 mb-xl-10">
        <div class="card-header card-header-stretch">
            <!--begin::Title-->
            <div class="card-title d-flex align-items-center">
                <h2 class="text-black">User ID : 25909</h2>
            </div>
        </div>
        <div class="card-body p-9">
            
            <div class=" d-flex flex-column flex-lg-row">
                <!--begin::Aside-->
                <div class="flex-column flex-md-row-auto w-75 w-lg-200px w-xxl-225px">
                    <!--begin::Input group-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12">
                            <div class="card" style="width: 14rem;flex: 0 0 auto;">
                                <img class="card" src="{{ asset("media/avatars/150-1.jpg") }}" alt="Profile" 
                                    style="width: 100%; height: 14rem; object-fit: cover;">
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                </div>
                <div class="flex-md-row-fluid ms-lg-12">
                    <div class="fs-5 fw-bolder mt-2">Username : </div>
                    <p class="fs-6">Emma Smith</p>

                    <div class="fs-5 fw-bolder mt-2">Email : </div>
                    <p class="fs-6">e.smith@kpmg.com.au</p>

                    <div class="fs-5 fw-bolder mt-2">Joined Date : </div>
                    <p class="fs-6">20 Jun 2021, 5:20 pm</p>

                    <div class="fs-5 fw-bolder mt-2">Last Login : </div>
                    <p class="fs-6">Yesterday</p>

                    <div class="fs-5 fw-bolder mt-2">In-Progress Transactions : </div>
                    <p class="fs-6">5</p>

                    <div class="fs-5 fw-bolder mt-2">Status : </div>
                    <div class="badge badge-light-danger fw-bolder">Has Pending Penalties</div>

                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button id="btn_delete" class="btn btn-danger">Delete</button>
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
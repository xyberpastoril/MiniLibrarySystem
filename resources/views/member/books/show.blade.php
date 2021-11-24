@extends("layouts.core")

<!-- Admin > Books > Book Details -->

@section('title')
    Book Details
@endsection

<link href="{{ asset("plugins/custom/fullcalendar/fullcalendar.bundle.css") }}" rel="stylesheet" type="text/css">

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
        <a href="#" class="text-muted">Books</a>
    </li>

    <!-- Dash -->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>

    <!-- Item -->
    <li class="breadcrumb-item text-dark">Book Details
    </li>

@endsection

<!-- -->

@section("content")

    <div class="card mb-5 mb-xl-10">
        <div class="card-header card-header-stretch">
            <!--begin::Title-->
            <div class="card-title d-flex align-items-center">
                <h2 class="text-black">Title : Attack On Titan Volume 13</h2>
            </div>

            <div class="card-toolbar p-5">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#borrow_modal">Borrow</button>
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
                                <img class="card" src="https://m.media-amazon.com/images/I/71ROjSv2ttL._AC_UY327_FMwebp_QL65_.jpg" alt="Book Cover" 
                                    style="width: 100%; height: 225px; object-fit: cover;">
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                </div>
                <div class="flex-md-row-fluid ms-lg-12">
                    <div class="fs-5 fw-bolder mt-2">Author(s) : </div>
                    <p class="fs-6">Hajime Isayama</p>

                    <div class="fs-5 fw-bolder mt-2">Description : </div>
                    <p class="fs-6">It is set in a world where humanity lives inside cities surrounded by three enormous walls that protect them from the gigantic man-eating humanoids referred to as Titans; the story follows Eren Yeager, who vows to exterminate the Titans after a Titan brings about the destruction of his hometown and the death of his ...</p>
                    
                    <div class="fs-5 fw-bolder mt-2">Page Count : </div>
                    <p class="fs-6">192</p>

                    <div class="fs-5 fw-bolder mt-2">ISBN : </div>
                    <p class="fs-6">9780000000</p>

                    <div class="fs-5 fw-bolder mt-2">Total Copies : </div>
                    <p class="fs-6">3</p>

                    <div class="fs-5 fw-bolder mt-2">Available Copies : </div>
                    <p class="fs-6">1</p>

                    <div class="fs-5 fw-bolder mt-2">Genre(s) : </div>
                    <p class="fs-6">Action, Fiction</p>

                    <div class="fs-5 fw-bolder mt-2">Published Date : </div>
                    <p class="fs-6">2020-09-08</p>

                    <div class="fs-5 fw-bolder mt-2">Date Added: </div>
                    <p class="fs-6">2020-09-08</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-5 mb-xl-10">
        <div class="card-header card-header-stretch">
            <!--begin::Title-->
            <div class="card-title d-flex align-items-center">
                <h2 class="text-black">Book Schedule</h2>
            </div>
        </div>
        <div class="card-body p-9">
            <div id='calendar'></div>
        </div>
    </div>

    <!--begin:: Borrow Modal-->
    <div class="modal fade" tabindex="-1" id="borrow_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Borrow Book</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <div class="mb-0">
                        <label for class="form-label">Pick Date Range</label>
                        <input class="form-control form-control-solid" placeholder="Pick date rage" id="borrow_modal_date_range_picker">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send Borrow Request</button>
                </div>
            </div>
        </div>
    </div>
    <!--end: Borrow Modal-->

@endsection

<!-- -->

@section("vendor_js")

    <script src="{{ asset("plugins/custom/fullcalendar/fullcalendar.bundle.js") }}"></script>

@endsection

<!-- -->

@section("custom_js")

    <script src="{{ asset("js/custom/user/homepage/book-details.js") }}"></script>

@endsection
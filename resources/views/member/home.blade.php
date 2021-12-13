@extends("layouts.core")

<!-- Member > Home -->

@section('title')
    Home
@endsection

<!-- -->

@section('custom_css')

@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-dark">Home</li>

@endsection

<!-- -->

@section("custom-css")
    <link href="{{ asset("css/my.style.css") }}" rel="stylesheet" type="text/css">
    <link href="{{ asset("css/toggles.css") }}" rel="stylesheet" type="text/css">
@endsection

<!-- -->

@section("content")

<!--begin::Row-->
@role('Unverified Member')
<div class="row g-5 g-xl-8">
    <div class="col-12">
        <!--begin::Widget 1-->
        <div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px card-xl-stretch mb-5 mb-xl-8 bg-gray-200 border-0" style="background-position: 100% 100%;background-size: 350px auto;background-image:url('{{ asset("media/misc/city.png") }}')">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column justify-content-center ps-lg-15">
                <!--begin::Title-->
                <h3 class="text-gray-800 fs-2qx fw-boldest line-height-lg mb-4 mb-lg-8 col-8">Welcome to README!
                <br><i>You're one step ahead to having a privilege to borrow books on our expanding library.</i></h3>
                <!--end::Title-->
                <!--begin::Action-->
                <div class="m-0">
                    <a href="#" class="btn btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#get_verified_modal">Get verified</a>
                </div>
                <!--begin::Action-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Widget 1-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
@endrole

<form action="{{ route('home.search') }}" method="POST" class="form">
@csrf

    <!-- Search Card -->
    <div class="card mb-7">
        <div class="card-body">

            <!-- Compact form -->
            <div class="d-flex align-items-center">
                <div class="position-relative w-md-400px me-md-2">
                    <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"/>
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"/>
                        </svg>
                    </span>
                    <input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search books" required>
                </div>

                <!-- Action -->
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary me-5" id='_search_btn'>Search</button>
                    <a id="kt_horizontal_search_advanced_link" class="btn btn-link" data-bs-toggle="collapse" href="#kt_advanced_search_form" clicked='0'>Advanced Search</a>
                </div>
            </div>

            <!-- Advance form -->
            <div class="collapse" id="kt_advanced_search_form">
                <div class="separator separator-dashed mt-9 mb-6"></div>

                <div class="row g-8 mb-8">
                    <!--Genres-->
                    <div class="col-xxl-7">
                        <label class="fs-6 form-label fw-bolder text-dark">Genres</label>
                        <input type="text" class="form-control form-control form-control-solid" name="genres" value="" placeholder="(ex. action, fiction)">
                    </div>

                    <!-- Status-->
                    <div class="col-xxl-5">
                        <div class="row g-8">
                            <div class="col-lg-6">
                                <label class="fs-6 form-label fw-bolder text-dark">Status</label>
                                <div class="form-check form-switch form-check-custom form-check-solid mt-1">
                                    <input class="form-check-input" type="checkbox" name="status" value="available" id="status_checkbox" checked="checked">
                                    <label class="form-check-label" for="status_checkbox">Available</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
<!--end::Form-->

<div class="tab-content d-block" id='_tab_main'>
    <div class="d-flex flex-wrap flex-stack pb-2">
        <!--begin::Title-->
        <div class="d-flex flex-wrap align-items-center my-1">
            <h3 class="fw-bold me-5 my-1">New Arrivals</h3>
        </div>
        <!--end::Title-->
    </div>

    <div class="scroll py-8 d-flex flex-row flex-nowrap align-items-center w-100 position-relative h-auto px-5" style="gap: 2rem">
        @foreach ($newArrivals as $book)
            <div class="card card-block my-card cursor-pointer shadow" style="width: 14rem;flex: 0 0 auto;" onclick="window.location.href = '{{ route('books.show', $book->id) }}';">
                <img class="card-img-top" src="@if($book->cover_url == null){{ asset("media/books/blank.jpg") }}@else{{ asset("media/books/$book->cover_url") }}@endif" alt="Book Cover"
                    style="width: 100%; height: 225px; object-fit: cover;">
                <div class="card-body p-2">
                    <p class="card-text text-truncate mb-1">
                        <span class="text-gray-800 mb-1">{{ $book->title }}</span>
                        <br />
                        <small class="text-muted">
                            {{ $book->authors[0]->name }}
                            @if(count($book->authors) > 1)
                                and {{ (count($book->authors) - 1) }} other(s).
                            @endif
                        </small>
                    </p>
                    <span class="badge badge-square px-2 badge-warning ms-8">
                        Added {{ substr($book->created_at, 0, -8) }} ago
                    </span>
                    {{-- <p class="badge
                    @if(isset($book->copies_left) && $book->copies_left < 1) badge-danger
                    @else badge-success
                    @endif m-0 mb-3">{{ isset($book->copies_left) ? $book->copies_left : $book->copies_owned }} copies available</p> --}}
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex flex-wrap flex-stack pt-5 pb-2">
        <!--begin::Title-->
        <div class="d-flex flex-wrap align-items-center my-1">
            <h3 class="fw-bold me-5 my-1">Hot Books</h3>
        </div>
        <!--end::Title-->
    </div>

    <div class="scroll py-8 d-flex flex-row flex-nowrap align-items-center w-100 position-relative h-auto px-5" style="gap: 2rem">
        @foreach ($hotBooks as $book)
            <div class="card card-block my-card cursor-pointer shadow" style="width: 14rem;flex: 0 0 auto;" onclick="window.location.href = '{{ route('books.show', $book->id) }}';">
                <img class="card-img-top" src="@if($book->cover_url == null){{ asset("media/books/blank.jpg") }}@else{{ asset("media/books/$book->cover_url") }}@endif" alt="Book Cover"
                    style="width: 100%; height: 225px; object-fit: cover;">
                <div class="card-body p-2">
                    <p class="card-text text-truncate mb-1">
                        <span class="text-gray-800 mb-1">{{ $book->title }}</span>
                        <br />
                        <small class="text-muted">
                            {{ $book->authors[0]->name }}
                            @if(count($book->authors) > 1)
                                and {{ (count($book->authors) - 1) }} other(s).
                            @endif
                        </small>
                    </p>
                    <span class="badge badge-square px-2 badge-primary ms-9">
                        {{ $book->total }} times borrowed
                    </span>
                </div>

            </div>
        @endforeach
    </div>

</div>
<div class="tab-content d-none" id="_tab_search_res">
</div>

@role('Unverified Member')
<!--begin::Modal - Get Verified-->
<div class="modal fade" id="get_verified_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">

        <!--begin::Modal content-->
        <div class="modal-content">

            <!-- Modal header -->
            <div class="modal-header" id="kt_modal_new_book_header">

                <!-- Modal title -->
                <h2>How to Get Verified</h2>

                <!-- Close -->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-books-modal-action="close">
                    <!-- Svg Icon | path: ../../assets/media/icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                        </svg>
                    </span>
                </div>

            </div>

            <!-- Modal body -->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">

                <ol>
                    <li>Screenshot or copy the information below for reference by our officer-in-charge.<br><br>
                        <div class="table-responsive">
                            <table class="table table-striped gy-3 gs-3">
                                <tr>
                                    <td>Member ID</td>
                                    <td>{{ Auth::user()->id }}</td>
                                </tr>
                                <tr>
                                    <td>Full Name</td>
                                    <td>{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>{{ Auth::user()->gender }}</td>
                                </tr>
                            </table>
                        </div>
                        <br>
                    </li>
                    <li>Submit the information above to the library along with a photocopy of either the following:
                        <ul>
                            <li>Government-Issued IDs</li>
                            <li>School-Issued ID</li>
                            <li>Birth Certificate</li>
                        </ul>
                    </li><br>
                    <li>Once approved, you can start borrowing our books in our expanding library.</li>
                </ol>

            </div>

        </div>
        <!--end::Modal content-->

    </div>
</div>
<!--end::Modal - Get Verified-->
@endrole

@endsection

<!-- -->

@section("vendor_js")

@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset('js/custom/member/homepage/homepage.js') }}"></script>
@endsection

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
    {{-- <li class="breadcrumb-item text-muted">
        <a href="#" class="text-muted text-hover-primary">Home</a>
    </li> --}}

    <!-- Dash -->
    {{-- <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li> --}}

    <!-- Item -->
    <li class="breadcrumb-item text-dark">Home</li>

@endsection

<!-- -->

@section("custom-css")
    <link href="{{ asset("css/my.style.css") }}" rel="stylesheet" type="text/css">
@endsection

<!-- -->

@section("content")

<!--begin::Form-->
<!--form tag has been temporarily been removed-->
    <!--begin::Card-->
    <div class="card mb-7">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Compact form-->
            <div class="d-flex align-items-center">
                <!--begin::Input group-->
                <div class="position-relative w-md-400px me-md-2">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"/>
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search books" id='_search_textBox'>
                </div>
                <!--end::Input group-->
                <!--begin:Action-->
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary me-5" id=_search_btn>Search</button>
                    <a id="_advanced_search" class="btn btn-link" data-bs-toggle="collapse" href="#kt_advanced_search_form" clicked='0' >Advanced Search</a>
                </div>
                <!--end:Action-->
            </div>
            <!--end::Compact form-->
            <!--begin::Advance form-->
            <div class="collapse" id="kt_advanced_search_form">
                <!--begin::Separator-->
                <div class="separator separator-dashed mt-9 mb-6"></div>
                <!--end::Separator-->
                <!--begin::Row-->
                <div class="row g-8 mb-8">
                    <!--begin::Col-->
                    <div class="col-xxl-7">
                        <label class="fs-6 form-label fw-bolder text-dark">Genres</label>
                        <input type="text" class="form-control form-control form-control-solid" name="genres" value="" placeholder="(ex. action, supernatural, scifi)" id='_genre_textBox'>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xxl-5">
                        <!--begin::Row-->
                        <div class="row g-8">
                            <!--begin::Col-->
                            <div class="col-lg-6">
                                <label class="fs-6 form-label fw-bolder text-dark">Status</label>
                                <div class="form-check form-switch form-check-custom form-check-solid mt-1">
                                    <input name="status" class="form-check-input" type="checkbox" id="_checkBox" checked="checked">
                                    <label class="form-check-label" for="flexSwitchChecked">Available</label>
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
            </div>
            <!--end::Advance form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

<!--end::Form-->

<div class="tab-content">
    
    <div class="d-flex flex-wrap flex-stack pb-2">
        <!--begin::Title-->
        <div class="d-flex flex-wrap align-items-center my-1">
            <h3 class="fw-bold me-5 my-1">New Arrivals</h3>
        </div>
        <!--end::Title-->
    </div>

    <div class="scroll py-8 d-flex flex-row flex-nowrap align-items-center w-100 position-relative h-auto">
        @foreach ($hotBooks as $book)
            <div class="card card-block me-11 my-card" style="width: 14rem;flex: 0 0 auto;">
                <img class="card-img-top" src="https://m.media-amazon.com/images/I/71ROjSv2ttL._AC_UY327_FMwebp_QL65_.jpg" alt="Book Cover" 
                    style="width: 100%; height: 225px; object-fit: cover;">
                <div class="card-body p-2">
                    <p class="card-text text-truncate">
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $book->title }}</a>
                        <br />
                        <small class="text-muted">
                            {{ $book['authors'][0]->name }}
                            @if(count($book['authors']) > 1)
                                and {{ (count($book['authors']) - 1) }} others.
                            @endif
                        </small>
                    </p>
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

    <div class="scroll py-8 d-flex flex-row flex-nowrap align-items-center w-100 position-relative h-auto">
        @foreach ($hotBooks as $book)
            <div class="card card-block me-11 my-card" style="width: 14rem;flex: 0 0 auto;">
                <img class="card-img-top" src="https://m.media-amazon.com/images/I/71ROjSv2ttL._AC_UY327_FMwebp_QL65_.jpg" alt="Book Cover" 
                    style="width: 100%; height: 225px; object-fit: cover;">
                <div class="card-body p-2">
                    <p class="card-text text-truncate">
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $book->title }}</a>
                        <br />
                        <small class="text-muted">
                            {{ $book['authors'][0]->name }}
                            @if(count($book['authors']) > 1)
                                and {{ (count($book['authors']) - 1) }} others.
                            @endif
                        </small>
                    </p>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection

<!-- -->

@section("vendor_js")

@endsection

<!-- -->

@section("custom_js")
<script src="{{ asset('js/search_results.js') }}"></script>
@endsection
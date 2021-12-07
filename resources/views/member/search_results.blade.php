@extends("layouts.core")

<!-- Member > Books -->

@section('title')
    @if($isPOST)
        Search Results
    @else
        Books
    @endif
@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('home') }}" class="text-muted">Home</a>
    </li>

    <!-- Item -->
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('home.search') }}" class="text-muted">Books</a>
    </li>

    @if($isPOST)
    <!-- Item -->
    <li class="breadcrumb-item text-dark">Search Results
    </li>
    @endif

@endsection

<!-- -->

@section("content")

<!--begin::Form-->
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
                    <input type="text" class="form-control form-control-solid ps-10" name="search" value="{{ isset($book_results->search) ? $book_results->search : null }}" placeholder="Search books" required>
                </div>

                <!-- Action -->
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary me-5" >Search</button>
                    <a id="kt_horizontal_search_advanced_link" class="btn btn-link" data-bs-toggle="collapse" href="#kt_advanced_search_form">Advanced Search</a>
                </div>
            </div>

            <!-- Advance form -->
            <div class="collapse" id="kt_advanced_search_form">
                <div class="separator separator-dashed mt-9 mb-6"></div>

                <div class="row g-8 mb-8">
                    <!--Genres-->
                    <div class="col-xxl-7">
                        <label class="fs-6 form-label fw-bolder text-dark">Genres</label>
                        <input type="text" class="form-control form-control form-control-solid" name="genres" value="{{ $book_results->genres }}" placeholder="(ex. action, fiction)">
                    </div>

                    <!-- Status-->
                    <div class="col-xxl-5">
                        <div class="row g-8">
                            <div class="col-lg-6">
                                <label class="fs-6 form-label fw-bolder text-dark">Status</label>
                                <div class="form-check form-switch form-check-custom form-check-solid mt-1">
                                    <input class="form-check-input" type="checkbox" name="status" value id="status_checkbox" @if ($book_results->status == 'available') checked="checked" @endif>
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

<!--begin::Toolbar-->
<div class="d-flex flex-wrap flex-stack pb-7">
    <!--begin::Title-->
    <div class="d-flex flex-wrap align-items-center my-1">
        <h2 class="fw-bold me-5 my-1">{{ count($book_results) }} Books Found</h2>
    </div>
    <!--end::Title-->
</div>
<!--end::Toolbar-->

<div class="tab-content">
    <div class="row ps-5" style="gap: 2rem">

        @foreach ($book_results as $book)
            <div class="card card-block w-175px my-card cursor-pointer shadow p-0" onclick="window.location.href = '{{ route('books.show', $book->id) }}';">
                <img class="card-img-top" src="@if($book->cover_url == null){{ asset("media/books/blank.jpg") }}@else{{ asset("media/books/$book->cover_url") }}@endif" alt="{{ $book->title }}"
                    style="width: 100%; height: 225px; object-fit: cover;">
                <div class="card-body p-2 pb-0">
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
                </div>
                <div class="position-absolute top-0 start-100 translate-middle badge badge-square px-2
                    @if(isset($book->copies_left) && $book->copies_left < 1) badge-danger
                    @else badge-success
                    @endif">{{ isset($book->copies_left) ? $book->copies_left : $book->copies_owned }} left
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
    <script src="{{ asset('js/custom/member/homepage/homepage.js') }}"></script>
@endsection

@extends("layouts.core")

<!-- Admin > Books > Book Details -->

@section('title')
    Book Details
@endsection

@section('custom_css')
    <link href="{{ asset("plugins/custom/fullcalendar/fullcalendar.bundle.css") }}" rel="stylesheet" type="text/css">
@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-muted">
        <a href="#" class="text-muted">Books</a>
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
            </div>

            <div class="card-toolbar p-5">
                <button id="borrow_modal_button" class="btn btn-primary"  
                    @if($book->copies_left < 1) 
                        disabled 
                    @else
                        data-bs-toggle="modal" 
                        data-bs-target="#borrow_modal"
                    @endif>Borrow</button>
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
                                <img class="card" src="@if($book->cover_url == null){{ asset("media/books/blank.jpg") }}@else{{ asset("media/books/$book->cover_url") }}@endif" alt="Book Cover"
                                    style="width: 100%; height: 225px; object-fit: cover;">
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                </div>
                <div class="flex-md-row-fluid ms-lg-12">
                    <div class="fs-4 mt-2"><span class="fw-bolder">Title :</span> {{ $book->title }}</div>

                    <div class="fs-5 fw-bolder mt-2">Author(s) : </div>
                    <p class="fs-6">
                        {{ $book->authors[0]->name }}@for ($i = 1; $i < count($book->authors); $i++), {{ $book->authors[$i]->name }}@endfor
                    </p>

                    <div class="fs-5 fw-bolder mt-2">Description : </div>
                    <p class="fs-6">{{ $book->description }}</p>

                    <div class="fs-5 fw-bolder mt-2">Page Count : </div>
                    <p class="fs-6">{{ $book->page_count }}</p>

                    <div class="fs-5 fw-bolder mt-2">ISBN : </div>
                    <p class="fs-6">{{ $book->isbn }}</p>

                    <div class="fs-5 fw-bolder mt-2">Total Copies : </div>
                    <p class="fs-6">{{ $book->page_count }}</p>

                    {{-- Todo Available copies --}}
                    <div class="fs-5 fw-bolder mt-2">Available Copies : </div>
                    <p class="fs-6">
                        @if($book->copies_left > 0)
                            <span id="copies_left" class="badge badge-success">{{ $book->copies_left }}</span>
                        @else
                            <span id="copies_left" class="badge badge-danger">{{ $book->copies_left }}</span>
                        @endif
                    </p>

                    <div class="fs-5 fw-bolder mt-2">Genre(s) : </div>
                    <p class="fs-6">
                        @if($book->genres)
                            {{ $book->genres }}
                        @else
                            <span class="text-muted">none</span>
                        @endif
                    </p>

                    <div class="fs-5 fw-bolder mt-2">Published Date : </div>
                    <p class="fs-6">{{ $book->published_date }}</p>

                    <div class="fs-5 fw-bolder mt-2">Date Added: </div>
                    <p class="fs-6">{{ $book->created_at }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="card mb-5 mb-xl-10">
        <div class="card-header card-header-stretch">
            <!--begin::Title-->
            <div class="card-title d-flex align-items-center">
                <h2 class="text-black">Book Schedule</h2>
            </div>
        </div>
        <div class="card-body p-9">
            <div id='calendar'></div>
        </div>
    </div> --}}

    <!--begin:: Borrow Modal-->
    <form class="modal fade" tabindex="-1" id="borrow_modal" method="POST" action="{{ route('transactions.request', $book->id) }}">
        @csrf
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
                        <input name="date" class="form-control form-control-solid" placeholder="Pick date range" id="borrow_modal_date_range_picker">
                        
                        <input type="hidden" id="book_id_input" name="book_id" value="{{ $book->id }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button id="transaction_request_submit" type="submit" class="btn btn-primary">Send Borrow Request</button>
                </div>
            </div>
        </div>
    </form>
    <!--end: Borrow Modal-->

@endsection

<!-- -->

@section("vendor_js")
    <script src="{{ asset("plugins/custom/fullcalendar/fullcalendar.bundle.js") }}"></script>
@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset("js/custom/member/homepage/book-details.js") }}"></script>
@endsection

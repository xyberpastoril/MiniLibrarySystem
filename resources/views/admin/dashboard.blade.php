@extends("layouts.core")

<!-- Admin > Dashboard -->

@section('title')
    Dashboard
@endsection

<!-- -->

@section('custom_css')

@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-dark">Dashboard</li>

@endsection

<!-- -->

@section("content")

@csrf

<!-- Welcome -->
<div class="row g-5 g-xxl-12">
    <div class="col-xxl-12 mb-5 mb-xxl-10">
        <div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px card-xl-stretch mb-5 mb-xl-8 bg-gray-200 border-0" style="background-position: 100% 100%;background-size: 500px auto;background-image:url('{{ asset("media/misc/city.png") }}')">
            <div class="card-body d-flex flex-column justify-content-center ps-lg-15">

                <!-- Title -->
                <h3 class="text-gray-800 fs-2qx fw-boldest line-height-lg mb-4 mb-lg-8">Welcome to README!
                <br><i>"Nothing is pleasanter than exploring a library." - Walter Savage Landor</i></h3>

                <!-- Action -->
                <div class="m-0">
                    <a href="#" class="btn btn-dark fw-bold btn-active-color-gray-600">Explore App</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-5 g-xxl-10">
    <div class="col-xl-4 mb-xl-5 mb-xxl-10">
        <div class="card card-flush h-xl-100">

            <!-- Header -->
            <div class="card-header pt-5">

                <!-- Title -->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">PopuLar Books</span>
                    <span class="text-gray-400 pt-2 fw-bold fs-6">Most Borrowed Books This Month</span>
                </h3>

            </div>

            <!-- Body -->
            <div class="card-body pt-7">
                @php $i = 1 @endphp
                @foreach ($hotBooks as $book)

                    <!-- Book -->
                    <div class="d-flex align-items-sm-center mb-7">

                        <!-- Cover -->
                        <div class="me-3 symbol" style="width: 5rem;flex: 0 0 auto;">
                            <img class="card" src="@if($book->cover_url == null) {{ asset("media/books/blank.jpg") }} @else {{ asset("media/books/$book->cover_url") }}  @endif" alt="{{ $book->title }}" style="width: 100%; height: 7rem; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 translate-middle badge badge-square badge-primary">{{ $i++ }}</div>
                        </div>

                        <!-- Content -->
                        <div class="d-flex flex-stack w-100" >

                            <!-- Title -->
                            <div class="my-lg-0 my-2 me-2">
                                <a href="{{ route('books.show', $book->id) }}" class="text-gray-800 text-hover-primary fw-bolder fs-7">
                                    {{ $book->title }}
                                </a>
                                <span class="text-gray-600 fw-bold d-block pt-1 fs-8">
                                    {{ $book->authors[0]->name }}
                                    @if(count($book->authors) > 1)
                                        and {{ (count($book->authors) - 1) }} other(s).
                                    @endif
                                    <br>
                                    Borrowed {{ $book->total }} time(s)
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="col-xl-8 mb-5 mb-xxl-10">

        <div class="card card-flush px-10 h-xl-100">
            <div class="card-header pt-5">

                <!-- Title -->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">Monthly Transaction Statistics</span>
                </h3>

            </div>

            <div class="card-body pt-0 px-0">

                <!-- Chart -->
                <canvas id="kt_chartjs_1" class="mh-400px"></canvas>

            </div>
        </div>

    </div>


</div>

@endsection

<!-- -->

@section("vendor_js")

@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset('js/custom/admin/chart.js') }}"></script>
@endsection

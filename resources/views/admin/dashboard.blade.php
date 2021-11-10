@extends("layouts.core")

<!-- Admin > Dashboard -->

@section("content")

<!--begin::Row-->
<div class="row g-5 g-xl-8">
    <div class="col-xl-8">
        <!--begin::Widget 1-->
        <div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px card-xl-stretch mb-5 mb-xl-8 bg-gray-200 border-0" style="background-position: 100% 100%;background-size: 500px auto;background-image:url('{{ asset("media/misc/city.png") }}')">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column justify-content-center ps-lg-15">
                <!--begin::Title-->
                <h3 class="text-gray-800 fs-2qx fw-boldest line-height-lg mb-4 mb-lg-8">Welcome to README! 
                <br><i>"Nothing is pleasanter than exploring a library."</i></h3>
                <!--end::Title-->
                <!--begin::Action-->
                <div class="m-0">
                    <a href="#" class="btn btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Explore App</a>
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

@endsection

<!-- -->

@section("vendor_js")

@endsection

<!-- -->

@section("custom_js")

@endsection
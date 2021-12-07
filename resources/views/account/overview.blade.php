@extends("layouts.core")

<!-- Account > Overview -->

@section('title')
    Overview
@endsection

<!-- -->

@section('custom_css')

@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-muted">
        <a href="#" class="text-muted text-hover-primary">Account</a>
    </li>

    <!-- Item -->
    <li class="breadcrumb-item text-dark">Overview</li>

@endsection

<!-- -->

@section("content")

    <!--begin::Header-->
    <div class="card mb-5 mb-xxl-8">
        <div class="card-body pt-9 pb-0">

            <!-- Details -->
            <div class="d-flex flex-wrap flex-sm-nowrap mb-6">

                <!-- Pic -->
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <img src="@if(Auth::user()->cover_url == null) {{ asset("media/avatars/blank.png") }} @else {{ asset("media/avatars/" . Auth::user()->cover_url . "") }} @endif" alt="image">
                        <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle h-15px w-15px"></div>
                    </div>
                </div>

                <!-- Info -->
                <div class="flex-grow-1 mt-auto">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">

                        <!--begin::User-->
                        <div class="d-flex flex-column">

                            <div class="d-flex align-items-center mb-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</a>
                                <a href="#">
                                    <!-- Svg Icon | path: icons/duotune/general/gen026.svg -->
                                    @role('Librarian')
                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                            <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF"/>
                                            <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"/>
                                        </svg>
                                    </span>
                                    @endrole
                                </a>
                            </div>

                            <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">

                                <!-- Username -->
                                <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!-- Svg Icon | path: icons/duotune/communication/com005.svg -->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="black"/>
                                            <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="black"/>
                                        </svg>
                                    </span>
                                    {{ Auth::user()->getRoleNames()[0] }}
                                </a>

                                <!-- Address -->
                                <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!-- Svg Icon | path: icons/duotune/general/gen018.svg -->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black"/>
                                            <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black"/>
                                        </svg>
                                    </span>

                                </a>

                                <!-- Email -->
                                <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                    <!-- Svg Icon | path: icons/duotune/communication/com011.svg -->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"/>
                                            <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"/>
                                        </svg>
                                    </span>
                                    {{ Auth::user()->email }}
                                </a>
                            </div>
                        </div>
                        <!--end::User-->

                        <!-- Actions -->
                        <div class="d-flex my-4">
                            <a href="{{ route('account.settings') }}" class="btn btn-primary">Edit Account</a>
                        </div>

                    </div>
                </div>

            </div>

            <div class="separator"></div>

            <!-- Navs -->
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                <!-- Nav item -->
                {{-- <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="#">Alerts</a>
                </li> --}}

                <!-- Nav item -->
                {{-- <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Logs</a>
                </li> --}}
            </ul>

        </div>
    </div>
    <!--end::Header-->

    {{-- <!--begin::Timeline-->
    <div class="card mt-5 mt-xxl-8">

        <!-- Card head -->
        <div class="card-header card-header-stretch">

            <!-- Title -->
            <div class="card-title d-flex align-items-center">
                <!-- Svg Icon | path: icons/duotune/general/gen014.svg -->
                <span class="svg-icon svg-icon-1 svg-icon-primary me-3 lh-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M13.625 22H9.625V3C9.625 2.4 10.025 2 10.625 2H12.625C13.225 2 13.625 2.4 13.625 3V22Z" fill="black"/>
                        <path d="M19.625 10H12.625V4H19.625L21.025 6.09998C21.325 6.59998 21.325 7.30005 21.025 7.80005L19.625 10Z" fill="black"/>
                        <path d="M3.62499 16H10.625V10H3.62499L2.225 12.1001C1.925 12.6001 1.925 13.3 2.225 13.8L3.62499 16Z" fill="black"/>
                    </svg>
                </span>

                <h3 class="fw-bolder m-0 text-gray-800">Alerts</h3>
            </div>

            <!--begin::Toolbar-->
            <div class="card-toolbar m-0">
                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bolder" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a id="kt_activity_today_tab" class="nav-link justify-content-center text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#kt_activity_today">Today</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="kt_activity_week_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_week">Week</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="kt_activity_month_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_month">Month</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="kt_activity_year_tab" class="nav-link justify-content-center text-active-gray-800 text-hover-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_year">2021</a>
                    </li>
                </ul>
            </div>
            <!--end::Toolbar-->

        </div>

        <!-- Card body -->
        <div class="card-body">
            <div class="tab-content">

                <!-- Tab panel | Today -->
                <div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab">
                    <div class="timeline">

                        <!-- Timeline item -->
                        <div class="timeline-item">

                            <!-- Timeline line -->
                            <div class="timeline-line w-40px"></div>

                            <!-- Timeline icon -->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!-- Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black"/>
                                            <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black"/>
                                            <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <!-- Timeline content -->
                            <div class="timeline-content mt-n1">

                                <!-- Timeline heading -->
                                <div class="pe-3 mb-5">
                                    <!-- Title -->
                                    <div class="fs-5 fw-bold mb-2">New order
                                    <a href="#" class="text-primary fw-bolder me-1">#67890</a>is placed for Workshow Planning &amp; Budget Estimation</div>

                                    <!-- Description -->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!-- Info -->
                                        <div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>

                                        <!-- User -->
                                        <a href="#" class="text-primary fw-bolder me-1">Jimmy Bold</a>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <!-- Tab panel | Week -->
                <div id="kt_activity_week" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_week_tab">
                    <div class="timeline">
                    </div>
                </div>

                <!-- Tab panel | Month -->
                <div id="kt_activity_month" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_month_tab">
                    <div class="timeline">
                    </div>
                </div>

                <!-- Tab panel | 2021 -->
                <div id="kt_activity_year" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_year_tab">
                    <div class="timeline">
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!--end::Timeline--> --}}

@endsection

<!-- -->

@section("vendor_js")

@endsection

<!-- -->

@section("custom_js")

@endsection

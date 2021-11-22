@extends("layouts.core")

<!-- Admin > Transactions > In Progress -->

@section('title')
    In Progress
@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-muted">
        <a href="#" class="text-muted text-hover-primary">Transactions</a>
    </li>

    <!-- Dash -->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>

    <!-- Item -->
    <li class="breadcrumb-item text-dark">In Progress</li>

@endsection

<!-- -->

@section("content")

<!--begin::Transactions Table Card-->
<div class="card">

    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <div class="card-title">

            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!-- Svg Icon | path: ../../assets/media/icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"/>
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"/>
                    </svg>
                </span>
                <input type="text" data-kt-transaction-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search transaction">
            </div>
            <!--end::Search-->

        </div>

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-transaction-table-toolbar="base">
                
            </div>

            <!-- Mark as Returned Selected -->
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-transaction-table-toolbar="selected">
                <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-transaction-table-select="selected_count"></span>Selected
                </div>
                <button type="button" class="btn btn-success" data-kt-transaction-table-select="return_selected">Mark as Returned Selected</button>
            </div>

        </div>
        <!--end::Card toolbar-->

    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">

        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_transactions">

            <!--begin::Table head-->
            <thead>
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="min-w-75px">Transaction Number</th>
                    <th class="min-w-75px">Book ID / ISBN</th>
                    <th class="min-w-125px">Accepted Date</th>
                    <th class="min-w-100px">From</th>
                    <th class="min-w-100px">To</th>
                    <th class="min-w-75px">Copies</th>
                    <th class="min-w-75px">Penalty</th>
                    <th class="min-w-75px">Status</th>
                </tr>
            </thead>
            <!--end::Table head-->

            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">

                <!--begin::Table row | Book -->
                <tr>

                    <!-- Transaction Number -->
                    <td class>109-00011</td>

                    <!-- Book ID / ISBN -->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">9780000000000</a>
                    </td>

                    <!-- Accepted Date -->
                    <td>10 Mar 2021, 6:05 pm</td>

                    <!-- From -->
                    <td>12 Mar 2021</td>

                    <!-- To -->
                    <td>14 Mar 2021</td>

                    <!-- Copies -->
                    <td>1</td>

                    <!-- Penalty -->
                    <td>₱ 100</td>

                    <!-- Status -->
                    <td>
                        <span class="badge badge-light-success">Pending</span>
                    </td>
                </tr>
                <!--end::Table row | Book -->
            </tbody>
            <!--end::Table body-->

        </table>
        <!--end::Table-->

    </div>
    <!--end::Card body-->

</div>
<!--end::Transactions Table Card-->

@endsection

<!-- -->

@section("vendor_js")
    <script src="{{ asset("plugins/custom/datatables/datatables.bundle.js") }}"></script>
@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset("js/custom/user/transactions-page/transactions-in-progress-table.js") }}"></script>
@endsection
@extends("layouts.core")

<!-- Admin > Transactions > Waiting For Approval -->

@section('title')
    Waiting for Approval
@endsection

<!-- -->

@section('custom_css')

@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-muted">
        <a href="#" class="text-muted text-hover-primary">Transactions</a>
    </li>

    <!-- Item -->
    <li class="breadcrumb-item text-dark">Waiting for Approval</li>

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
                <input type="text" data-kt-transactions-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search transaction">
            </div>
            <!--end::Search-->
        </div>

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-transactions-table-toolbar="base">
                <!-- Filter -->
                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!-- Svg Icon | path: ../../assets/media/icons/duotune/general/gen031.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"/>
                        </svg>
                    </span>Filter
                </button>

                <!-- Filter Dropdown-->
                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">

                    <!-- Header -->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                    </div>

                    <!-- Separator -->
                    <div class="separator border-gray-200"></div>

                    <!-- Content-->
                    <div class="px-7 py-5" data-kt-transactions-table-filter="form">

                        <!-- Status -->
                        <div class="mb-10">
                            <label class="form-label fs-6 fw-bold">Date Requested:</label>
                            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-transactions-table-filter="status" data-hide-search="true">
                                <option></option>
                                <option value="@php echo \Carbon\Carbon::now()->toDateString(); @endphp">Today</option>
                                <option value="@php echo \Carbon\Carbon::now()->subWeek()->toDateString(); @endphp">From Past 7 days</option>
                                <option value="@php echo \Carbon\Carbon::now()->subMonth()->toDateString(); @endphp">From Past 30 days</option>
                            </select>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-transactions-table-filter="reset">Reset</button>
                            <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-transactions-table-filter="filter">Apply</button>
                        </div>

                    </div>

                </div>
                <!--end::Filter Dropdown-->
            </div>

            <!-- Selected -->
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-transactions-table-toolbar="selected">
                <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-transactions-table-select="selected_count"></span>Selected
                </div>
                <button type="button" class="btn btn-success" data-kt-transactions-table-select="accept_selected">Accept</button>
                <button type="button" class="btn btn-danger" data-kt-transactions-table-select="decline_selected">Decline</button>
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
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_transactions .form-check-input" value="0">
                        </div>
                    </th>
                    <th class="w-75px">Transaction Number</th>
                    <th>Book Name & ISBN</th>
                    <th>User Name</th>
                    <th>Date Requested</th>
                    <th>From</th>
                    <th>To</th>
                    {{-- <th>Copies</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <!--end::Table head-->

            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">

                @foreach ($allTransactions as $transaction)
                    <tr class="text-start">
                        <!-- Checkbox -->
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="{{ $transaction->id }}">
                            </div>
                        </td>

                        <!-- Transaction Number -->
                        <td>
                            <p>{{ substr($transaction->date_from, 0, -5) . (($transaction->id > 1000
                                ? $transaction->id
                                : ($transaction->id > 100
                                    ? '0' . $transaction->id
                                    : ($transaction->id > 10
                                        ? '00' . $transaction->id
                                        : ('000' . $transaction->id))))) }}</p>
                        </td>

                        <!-- Book ID / ISBN -->
                        <td>
                            <a href="{{ route('books.show', $transaction->book_id) }}" class="text-gray-800 text-hover-primary mb-1">
                                {{ $transaction->book_title }}<br>
                            </a>
                            <small class="text-muted">({{ $transaction->book_isbn }})</small>
                        </td>

                        <!-- User ID -->
                        <td>
                            <a href="{{ route('users.edit', $transaction->user_id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $transaction->first_name . " " . $transaction->last_name }}</a>
                        </td>

                        <!-- Request Date -->
                        <td>
                            <div class="badge badge-light fw-bolder">{{ $transaction->date_requested_raw }}</div>
                        </td>

                        <!-- From -->
                        <td>
                            <div class="badge badge-light fw-bolder">{{ $transaction->date_from }}</div>
                        </td>

                        <!-- To -->
                        <td>
                            <div class="badge badge-light fw-bolder">{{ $transaction->date_to }}</div>
                        </td>

                        <!-- Copies -->
                        {{-- <td>{{ $transaction->copies }}</td> --}}

                        <!-- Actions -->
                        <td>
                            <div class="btn-group">
                                <a href="#" data-kt-transactions-table-filter="accept_row" class="btn btn-icon btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Accept">
                                    <span class="svg-icon svg-icon-1 position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                                            <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"/>
                                        </svg>
                                    </span>
                                </a>
                                <a href="#" class="btn btn-icon btn-danger btn-sm" data-kt-transactions-table-filter="decline_row" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Decline">
                                    <span class="svg-icon svg-icon-1 position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
                                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>

                        </td>
                    </tr>
                @endforeach

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
    <script src="{{ asset("js/custom/admin/transactions-page/transactions-waiting-table.js") }}"></script>
@endsection

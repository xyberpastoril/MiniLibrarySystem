@extends("layouts.core")

<!-- Admin > transactions > In Progress -->

@section('title')
    In Progress
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
    <li class="breadcrumb-item text-dark">In Progress</li>

@endsection

<!-- -->

@section("content")

<!--begin::transactions Table Card-->
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
                            <label class="form-label fs-6 fw-bold">Date Accepted:</label>
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
        </div>
    </div>

    <!--begin::Card body-->
    <div class="card-body pt-6">

        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_transactions">

            <!--begin::Table head-->
            <thead>
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-75px">Transaction Number</th>
                    <th>Book Name & ISBN</th>
                    <th>User Name</th>
                    <th>Date Accepted</th>
                    <th>From</th>
                    <th>To</th>
                    {{-- <th>Copies</th> --}}
                    <th>Penalty</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!--end::Table head-->

            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">

                @foreach ($allTransactions as $transaction)

                    <!--begin::Table row | Book -->
                    <tr class="text-start">

                        <!-- transactions Number -->
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

                        <!-- Accepted Date -->
                        <td>
                            <div class="badge badge-light fw-bolder">{{ $transaction->date_accepted }}</div>
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

                        <!-- Penalty -->
                        {{-- <td>{{ $transaction->penalty }}</td> --}}
                        <td>
                            ₱ {{ ($transaction->amount ? $transaction->amount : 0) }}
                            {{-- @if($transaction->amount > 0 && $transaction->penalty_status == 'paid')
                                <div class="badge badge-success fw-bolder">₱ {{ ($transaction->amount ? $transaction->amount : 0) }}</div>
                            @elseif ($transaction->amount > 0 && ($transaction->penalty_status == 'unpaid' || $transaction->penalty_status == NULL))
                                <div class="badge badge-danger fw-bolder">₱ {{ ($transaction->amount ? $transaction->amount : 0) }}</div>
                            @else
                                <div class="badge badge-success fw-bolder">₱ {{ ($transaction->amount ? $transaction->amount : 0) }}</div>
                            @endif --}}
                        </td>

                        <!-- Actions -->
                        <td>
                            @if ($transaction->status == 'unclaimed')
                                <a href="#" class="btn btn-icon btn-primary btn-sm" data-kt-transactions-table-filter="claimed_row" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mark as claimed">
                                    <span class="svg-icon svg-icon-1 position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black"/>
                                            <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black"/>
                                            <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4"/>
                                        </svg>
                                    </span>
                                </a>
                            @elseif ($transaction->status == 'claimed')
                                <a href="#" class="btn btn-icon btn-success btn-sm" data-kt-transactions-table-filter="return_row" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mark as returned">
                                    <span class="svg-icon svg-icon-1 position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(0 -1 -1 0 12.75 19.75)" fill="black"/>
                                            <path d="M12.0573 17.8813L13.5203 16.1256C13.9121 15.6554 14.6232 15.6232 15.056 16.056C15.4457 16.4457 15.4641 17.0716 15.0979 17.4836L12.4974 20.4092C12.0996 20.8567 11.4004 20.8567 11.0026 20.4092L8.40206 17.4836C8.0359 17.0716 8.0543 16.4457 8.44401 16.056C8.87683 15.6232 9.58785 15.6554 9.9797 16.1256L11.4427 17.8813C11.6026 18.0732 11.8974 18.0732 12.0573 17.8813Z" fill="black"/>
                                            <path d="M18.75 15.75H17.75C17.1977 15.75 16.75 15.3023 16.75 14.75C16.75 14.1977 17.1977 13.75 17.75 13.75C18.3023 13.75 18.75 13.3023 18.75 12.75V5.75C18.75 5.19771 18.3023 4.75 17.75 4.75L5.75 4.75C5.19772 4.75 4.75 5.19771 4.75 5.75V12.75C4.75 13.3023 5.19771 13.75 5.75 13.75C6.30229 13.75 6.75 14.1977 6.75 14.75C6.75 15.3023 6.30229 15.75 5.75 15.75H4.75C3.64543 15.75 2.75 14.8546 2.75 13.75V4.75C2.75 3.64543 3.64543 2.75 4.75 2.75L18.75 2.75C19.8546 2.75 20.75 3.64543 20.75 4.75V13.75C20.75 14.8546 19.8546 15.75 18.75 15.75Z" fill="#C4C4C4"/>
                                        </svg>
                                    </span>
                                </a>
                            @endif
                        </td>
                    </tr>
                    <!--end::Table row | Book -->

                @endforeach
            </tbody>
            <!--end::Table body-->

        </table>
        <!--end::Table-->

    </div>
    <!--end::Card body-->

</div>
<!--end::transactions Table Card-->

@endsection

<!-- -->

@section("vendor_js")
    <script src="{{ asset("plugins/custom/datatables/datatables.bundle.js") }}"></script>
@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset("js/custom/admin/transactions-page/transactions-in-progress-table.js") }}"></script>
@endsection

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
                <input type="text" data-kt-transactions-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search transaction">
            </div>
            <!--end::Search-->
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
                    <th>Book Title</th>
                    <th>Accepted Date</th>
                    <th>From</th>
                    <th>To</th>
                    {{-- <th>Copies</th> --}}
                    {{-- <th>Penalty</th> --}}
                    <th>Status</th>
                </tr>
            </thead>
            <!--end::Table head-->

            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">

                @foreach ($allTransactions as $transaction)

                    <!--begin::Table row | Book -->
                    <tr>

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
                                <small class="text-gray-800 text-hover-primary">({{ $transaction->book_isbn }})</small> 
                            </a>
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
                        {{-- <td>₱ 100</td> --}}

                        <!-- Status -->
                        <td>
                            @if ($transaction->status == "unclaimed")
                                <span class="badge badge-light-danger">Unclaimed</span>
                            @elseif($transaction->status == "claimed")
                                <span class="badge badge-light-success">Claimed</span>
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
<!--end::Transactions Table Card-->

@endsection

<!-- -->

@section("vendor_js")
    <script src="{{ asset("plugins/custom/datatables/datatables.bundle.js") }}"></script>
@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset("js/custom/member/transactions-page/transactions-in-progress-table.js") }}"></script>
@endsection

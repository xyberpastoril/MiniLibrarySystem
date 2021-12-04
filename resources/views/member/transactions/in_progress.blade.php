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

    <!--begin::Card body-->
    <div class="card-body pt-6">

        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_transactions">

            <!--begin::Table head-->
            <thead>
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-75px">Transaction Number</th>
                    <th>Book ID</th>
                    <th>Accepted Date</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Copies</th>
                    <th>Penalty</th>
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
                            <p>{{ $transaction->id }}</p>
                        </td>

                        <!-- Book ID / ISBN -->
                        <td>
                            <a href="{{ route('books.show', $transaction->book_id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $transaction->book_id }}</a>
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
                        <td>{{ $transaction->copies }}</td>

                        <!-- Penalty -->
                        <td>₱ 100</td>

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

@extends("layouts.core")

<!-- Admin > Users -->

@section('title')
    Users
@endsection

<!-- -->

@section('custom_css')

@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-dark">Users</li>

@endsection

<!-- -->

@section("content")
    @csrf

    <!--begin::User Table Card-->
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
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Users">
                </div>
                <!--end::Search-->

            </div>

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
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
                        <div class="px-7 py-5" data-kt-user-table-filter="form">

                            <!-- Status -->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Status:</label>
                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="status" data-hide-search="true">
                                    <option></option>
                                    <option value="Eligible To Borrow">Eligible To Borrow</option>
                                    <option value="Has Pending Penalties">Has Pending Penalties</option>
                                    <option value="Has Overdue Returns">Has Overdue Returns</option>
                                    <option value="Has Pending Verification">Has Pending Verification</option>
                                </select>
                            </div>

                            <!-- Actions -->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                            </div>

                        </div>

                    </div>
                    <!--end::Filter Dropdown-->

                    {{-- <!-- Export -->
                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                        <!-- Svg Icon | path: ../../assets/media/icons/duotune/arrows/arr078.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black"/>
                                <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black"/>
                                <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4"/>
                            </svg>
                        </span>Export
                    </button> --}}

                </div>

                <!-- Delete Selected -->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                </div>

                <!--begin::Modal - Export Users-->
                <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <div class="modal-content">

                            <!-- Modal header -->
                            <div class="modal-header">
                                <!-- Modal title -->
                                <h2>Export Users</h2>

                                <!-- Close -->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                                        </svg>
                                    </span>
                                </div>

                            </div>

                            <!-- Modal body -->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_export_users_form" class="form" action="#">

                                    <!-- Input group -->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Select Export Format:</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bolder">
                                            <option></option>
                                            <option value="zip">PDF</option>
                                            <option value="pdf">JSON</option>
                                            <option value="cvs">CSV</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>

                                    <!-- Actions -->
                                    <div class="text-center">
                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>

                                </form>
                                <!--end::Form-->
                            </div>

                        </div>
                    </div>
                </div>
                <!--end::Modal - Export Users-->

            </div>
            <!--end::Card toolbar-->

        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body pt-0">

            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">

                <!--begin::Table head-->
                <thead>
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1">
                            </div>
                        </th>
                        <th>User</th>
                        <th>User ID</th>
                        <th>In-Progress Transactions</th>
                        <th>Unpaid Penalties</th>
                        <th>Status</th>
                        <th>Joined Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <!--end::Table head-->

                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">

                    @foreach ($allUsers as $user)

                        <!--begin::Table row | User-->
                        <tr class="text-start">
                            <!-- Checkbox -->
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $user->user_id }}">
                                </div>
                            </td>

                            <!-- User -->
                            <td class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    {{-- <div class="symbol-label fs-3 bg-light-danger text-danger">M</div> --}}
                                    <div class="symbol-label">
                                        <img src="@if($user->cover_url == null) {{ asset("media/avatars/blank.png") }} @else {{ asset("media/avatars/$user->cover_url") }}  @endif" alt="{{ $user->first_name}} {{ $user->last_name}}" class="w-100">
                                    </div>
                                </div>

                                <!-- User details -->
                                <div class="d-flex flex-column">
                                    <a href="{{ route("users.edit", $user->user_id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $user->first_name}} {{ $user->last_name}}</a>
                                    <span>{{ $user->email}}</span>
                                </div>

                            </td>

                            <!-- User ID -->
                            <td>{{ $user->user_id }}</td>

                            <!-- In-Progress Transactions -->
                            <td>{{ $user->in_progress_transactions ? $user->in_progress_transactions : 0 }}</td>

                            <!-- Unpaid Penalties -->
                            <td>₱ {{ $user->unpaid_penalties ? $user->unpaid_penalties : 0 }}</td>

                            <!-- Status-->
                            <td>
                                @if($user->unpaid_penalties || $user->overdue_returns)
                                    @if($user->unpaid_penalties)
                                        <div class="badge badge-light-danger fw-bolder">Has Pending Penalties</div>
                                    @endif
                                    @if($user->overdue_returns)
                                        <div class="badge badge-light-warning fw-bolder">Has Overdue Returns</div>
                                    @endif
                                @elseif($user->role_id == "3")
                                    <div class="badge badge-light-warning fw-bolder">Has Pending Verification</div>
                                @else
                                    <div class="badge badge-light-success fw-bolder">Eligible To Borrow</div>
                                @endif
                            </td>

                            <!-- Joined Date -->
                            <td><div class="badge badge-light fw-bolder">{{ $user->joined_date }}</div></td>

                            <!-- Action -->
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-icon btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                        <span class="svg-icon svg-icon-1 position-absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
                                                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
                                                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
                                            </svg>
                                        </span>
                                    </a>
                                    @if ($user->role_id == "3")
                                        <a href="#" data-id="{{ $user->user_id }}" class="verify-btn btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Verify User">
                                            <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr084.svg-->
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"/>
                                                <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"/>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                    @endif
                                    <a href="#" class="btn btn-icon btn-danger btn-sm" data-kt-users-table-filter="delete_row" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                        <span class="svg-icon svg-icon-1 position-absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"/>
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"/>
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"/>
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
    <!--end::User Table Card-->

@endsection

<!-- -->

@section("vendor_js")
    <script src="{{ asset("plugins/custom/datatables/datatables.bundle.js") }}"></script>
@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset("js/custom/admin/users-page/users-page-table.js") }}"></script>
    <script src="{{ asset("js/custom/admin/users-page/export-users.js") }}"></script>
@endsection

@extends("layouts.core")

<!-- Admin > Books -->

@section('title')
    Books
@endsection

<!-- -->

@section('custom_css')
    
@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    {{-- <li class="breadcrumb-item text-muted">
        <a href="#" class="text-muted text-hover-primary">Home</a>
    </li> --}}

    <!-- Dash -->
    {{-- <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li> --}}

    <!-- Item -->
    <li class="breadcrumb-item text-dark">Books</li>

@endsection

<!-- -->

@section("content")

<!--begin::Book Table Card-->
<div class="card">

    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <div class="card-title">

            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"/>
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers">
            </div>
            <!--end::Search-->

        </div>

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                <!--begin::Filter-->
                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->Filter</button>
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Content-->
                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-5 fw-bold mb-3">Payment Type:</label>
                            <!--end::Label-->
                            <!--begin::Options-->
                            <div class="d-flex flex-column flex-wrap fw-bold" data-kt-docs-table-filter="payment_type">
                                <!--begin::Option-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                    <input class="form-check-input" type="radio" name="payment_type" value="all" checked="checked">
                                    <span class="form-check-label text-gray-600">All</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                    <input class="form-check-input" type="radio" name="payment_type" value="visa">
                                    <span class="form-check-label text-gray-600">Visa</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                    <input class="form-check-input" type="radio" name="payment_type" value="mastercard">
                                    <span class="form-check-label text-gray-600">Mastercard</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="payment_type" value="americanexpress">
                                    <span class="form-check-label text-gray-600">American Express</span>
                                </label>
                                <!--end::Option-->
                            </div>
                            <!--end::Options-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-docs-table-filter="reset">Reset</button>
                            <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-docs-table-filter="filter">Apply</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Menu 1-->
                <!--end::Filter-->
                <!--begin::Add customer-->
                <button type="button" class="btn btn-primary">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->Add Book</button>
                <!--end::Add customer-->
            </div>

            <!-- Delete Selected -->
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-docs-table-toolbar="selected">
                <div class="fw-bolder me-5">
                <span class="me-2" data-kt-docs-table-select="selected_count"></span>Selected</div>
                <button type="button" class="btn btn-danger" data-kt-docs-table-select="delete_selected">Selection Action</button>
            </div>

        </div>
        <!--end::Card toolbar-->

    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">

        <!--begin::Table-->
        <table id="kt_datatable_example_1" class="table table-row-dashed min-h-400px fs-6 gy-5">
            <thead>
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_datatable_example_1 .form-check-input" value="1">
                        </div>
                    </th>
                    <th class="">Book</th>
                    <th class="">Published Date</th>
                    <th class="">ISBN</th>
                    <th class="">Genre</th>
                    <th class="">Date Added</th>
                    <th class="">Total Copies</th>
                    <th class="">Available Copies</th>
                    <th class="text-end min-w-75px">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-bold">
                {{-- <tr>
                    <!-- Checkbox -->
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>

                    <!-- Book -->
                    <td class="d-flex align-items-center">
                        <!-- Cover -->
                        <div class="symbol symbol-100px overflow-hidden me-3">
                            <a href="#">
                                <div class="symbol-label">
                                    <img src="https://m.media-amazon.com/images/I/71ROjSv2ttL._AC_UY327_FMwebp_QL65_.jpg" alt="Attack on Titan: Volume 13" class="w-100">
                                </div>
                            </a>
                        </div>
                        
                        
                        <!-- Book details -->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-gray-800 text-hover-primary mb-1 my-text-truncate">Attack on Titan: Volume 13</a>
                            <span>Hajime Isayama</span>
                        </div>

                    </td>

                    <!-- Published Date-->
                    <td>31 Jul 2014</td>

                    <!-- ISBN -->
                    <td>9780000000000</td>

                    <!-- Genre -->
                    <td>Action, Fiction</td>

                    <!-- Date Added -->
                    <td>31 Oct 2021</td>

                    <!-- Total Copies -->
                    <td>3</td>

                    <!-- Available Copies -->
                    <td>2</td>
                    
                    <!-- Actions -->
                    <td class="text-end">
                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                        <!-- Svg Icon | path: ../../assets/media/icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
                                </svg>
                            </span>
                        </a>
                        <!-- Menu -->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            <!-- Menu item -->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Edit</a>
                            </div>

                            <!-- Menu item -->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-books-table-filter="delete_row">Delete</a>
                            </div>
                            
                        </div>

                    </td>
                </tr> --}}

                @foreach ($allBooks as $book)
                    
                    <tr>
                        <!-- Checkbox -->
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="{{ $book->id }}">
                            </div>
                        </td>

                        <!-- Book -->
                        <td class="d-flex align-items-center">
                            <!-- Cover -->
                            <div class="symbol symbol-100px overflow-hidden me-3">
                                <a href="#">
                                    <div class="symbol-label">
                                        <img src="https://m.media-amazon.com/images/I/71ROjSv2ttL._AC_UY327_FMwebp_QL65_.jpg" alt="Attack on Titan: Volume 13" class="w-100">
                                    </div>
                                </a>
                            </div>
                            
                            
                            <!-- Book details -->
                            <div class="d-flex flex-column">
                                <a href="#" class="text-gray-800 text-hover-primary mb-1 my-text-truncate">{{ $book->title }}</a>
                                <span>
                                    {{ $book->authors[0]->name }}
                                    @if(count($book->authors) > 1)
                                        and {{ (count($book->authors) - 1) }} others.
                                    @endif
                                </span>
                            </div>

                        </td>

                        <!-- Published Date-->
                        <td>{{ $book->published_date }}</td>

                        <!-- ISBN -->
                        <td>{{ $book->isbn }}</td>

                        <!-- Genre -->
                        <td>
                            {{-- {{ $book->genres->genres }} --}}
                            
                        </td>

                        <!-- Date Added -->
                        <td>31 Oct 2021</td>

                        <!-- Total Copies -->
                        <td>{{ $book->copies_owned }}</td>

                        <!-- Available Copies -->
                        <td>{{ $book->copies_left }}</td>
                        
                        <!-- Actions -->
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                            <!-- Svg Icon | path: ../../assets/media/icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                            <!-- Menu -->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!-- Menu item -->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Edit</a>
                                </div>

                                <!-- Menu item -->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-books-table-filter="delete_row">Delete</a>
                                </div>
                                
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!--end::Table-->

    </div>
    <!--end::Card body-->

</div>
<!--end::Book Table Card-->

@endsection

<!-- -->
@section("vendor_js")
    <script src="{{ asset("plugins/custom/datatables/datatables.bundle.js") }}"></script>

@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset("js/custom/admin/books-page/books-page-table.js") }}"></script>
    <script src="{{ asset("js/custom/admin/books-page/export-books.js") }}"></script>
    <script src="{{ asset("js/custom/admin/books-page/new-book.js") }}"></script>
@endsection
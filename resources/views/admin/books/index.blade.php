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

<!--begin::books Table Card-->
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
                <input type="text" data-kt-books-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Books">
            </div>
            <!--end::Search-->

        </div>

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-books-table-toolbar="base">

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
                    <div class="px-7 py-5" data-kt-books-table-filter="form">

                        <!-- Status -->
                        <div class="mb-10">
                            <label class="form-label fs-6 fw-bold">Status:</label>
                            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-books-table-filter="status" data-hide-search="true">
                                <option></option>
                                @foreach ($allGenres as $genre)
                                    <option value="{{ $genre->name }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-books-table-filter="reset">Reset</button>
                            <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-books-table-filter="filter">Apply</button>
                        </div>

                    </div>

                </div>
                <!--end::Filter Dropdown-->

                <!-- Export -->
                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_books">
                    <!-- Svg Icon | path: ../../assets/media/icons/duotune/arrows/arr078.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black"/>
                            <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black"/>
                            <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4"/>
                        </svg>
                    </span>Export
                </button>
                
                <!--begin::Add user-->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_book">
                <!-- Svg Icon | path: assets/media/icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->Add Book</button>
                <!--end::Add user-->
            </div>

            <!-- Delete Selected -->
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-books-table-toolbar="selected">
                <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-books-table-select="selected_count"></span>Selected
                </div>
                <button type="button" class="btn btn-danger" data-kt-books-table-select="delete_selected">Delete Selected</button>
            </div>

            <!--begin::Modal - Export Books-->
            <div class="modal fade" id="kt_modal_export_books" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">

                        <!-- Modal header -->
                        <div class="modal-header">
                            <!-- Modal title -->
                            <h2>Export Books</h2>
                            
                            <!-- Close -->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-books-modal-action="close">
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
                            <form id="kt_modal_export_books_form" class="form" action="#">

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
                                    <button type="reset" class="btn btn-light me-3" data-kt-books-modal-action="cancel">Discard</button>
                                    <button type="submit" class="btn btn-primary" data-kt-books-modal-action="submit">
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
            <!--end::Modal - Export Books-->

            <!--begin::Modal - Book Details-->
            <div class="modal fade" id="kt_modal_new_book" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                
                    <!--begin::Modal content-->
                    <div class="modal-content">

                        <!-- Modal header -->
                        <div class="modal-header" id="kt_modal_new_book_header">

                            <!-- Modal title -->
                            <h2>Add Book</h2>
                            
                            <!-- Close -->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-books-modal-action="close">
                                <!-- Svg Icon | path: ../../assets/media/icons/duotune/arrows/arr061.svg-->
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

                            <!-- Form -->
                            <form id="kt_modal_new_book_form" class="form" action="#">

                                <!-- Content -->
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_new_book_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_book_header" data-kt-scroll-wrappers="#kt_modal_new_book_scroll" data-kt-scroll-offset="300px">
                                    
                                    <!-- Cover -->
                                    <div class="fv-row mb-7">

                                        <!-- Label -->
                                        <label class="d-block fw-bold fs-6 mb-5">Cover</label>
                                        
                                        <!-- Image input -->
                                        <div class="image-input image-input-outline" data-kt-image-input="true">

                                            <!-- Preview existing cover -->
                                            <div class="image-input-wrapper w-175px h-225px mx-5" ></div>
                                            
                                            <!-- Label -->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change cover">
                                                <i class="bi bi-pencil-fill fs-7"></i>

                                                <!-- Inputs -->
                                                <input type="file" name="cover" accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="cover_remove">
                                                
                                            </label>
                                            
                                            <!-- Cancel -->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel cover">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            
                                            <!-- Remove -->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove cover">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            
                                        </div>
                                        
                                        <!-- Hint-->
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        
                                    </div>
                                    
                                    <!-- Book Title -->
                                    <div class="fv-row mb-7">
                                        <!-- Label -->
                                        <label class="required fw-bold fs-6 mb-2">Book Title</label>

                                        <!-- Input -->
                                        <input type="text" name="book_title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Book Title" value="">

                                    </div>
                                    
                                    <!-- Author -->
                                    <div class="fv-row mb-7">
                                        <!-- Label -->
                                        <label class="required fw-bold fs-6 mb-2">Author(s)</label>

                                        <!-- Input -->
                                        <input type="text" name="author" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="ex. Author1, Author2">

                                    </div>

                                    <!-- Description -->
                                    <div class="fv-row mb-7">
                                        <!-- Label -->
                                        <label class="required fw-bold fs-6 mb-2">
                                            <span>Description</span>
                                        </label>

                                        <!-- Description-->
                                        <textarea name="description" class="form-control form-control-solid mb-3 mb-lg-0 min-h-150px" placeholder="Book Description here..."></textarea>

                                    </div>

                                    <!-- Page Count -->
                                    <div class="fv-row mb-7">
                                        <!-- Label -->
                                        <label class="required fw-bold fs-6 mb-2">Page Count</label>

                                        <!-- Input -->
                                        <input type="number" name="page_count" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="1" value="1">

                                    </div>

                                    <!-- Published Date -->
                                    <div class="fv-row mb-7">
                                        <!-- Label -->
                                        <label class="required fw-bold fs-6 mb-2">Published Date</label>

                                        <!-- Input -->
                                        <input class="form-control form-control-solid" name="published_date" id="kt_published_date_picker"/>

                                    </div>
                                    
                                    <!-- ISBN -->
                                    <div class="fv-row mb-7">
                                        <!-- Label -->
                                        <label class="required fw-bold fs-6 mb-2">ISBN</label>

                                        <!-- Input -->
                                        <input type="text" name="isbn" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="ISBN" value="">

                                    </div>

                                    <!-- Genre -->
                                    <div class="fv-row mb-7">
                                        <!-- Label -->
                                        <label class="fw-bold fs-6 mb-2">Genre(s)</label>

                                        <!-- Input -->
                                        <input type="text" name="genre" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="ex. Action, Fiction">

                                    </div>

                                    <!-- Total Copies -->
                                    <div class="fv-row mb-7">
                                        <!-- Label -->
                                        <label class="required fw-bold fs-6 mb-2">Total Copies</label>

                                        <!-- Input -->
                                        <input type="number" name="total_copies" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="1" value="1">

                                    </div>

                                </div>
                                
                                <!-- Actions -->
                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3" data-kt-books-modal-action="cancel">Discard</button>
                                    <button type="submit" class="btn btn-primary" data-kt-books-modal-action="submit">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait... 
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                
                            </form>
                            
                        </div>
                        
                    </div>
                    <!--end::Modal content-->

                </div>
            </div>
            <!--end::Modal - Book Details-->

        </div>
        <!--end::Card toolbar-->

    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">

        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_books">

            <!--begin::Table head-->
            <thead>
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_books .form-check-input" value="1">
                        </div>
                    </th>
                    <th>Book</th>
                    <th>Published Date</th>
                    <th>ISBN</th>
                    <th>Genre</th>
                    <th>Date Added</th>
                    <th>Total Copies</th>
                    <th>Available Copies</th>
                    <th class="text-end min-w-75px">Actions</th>
                </tr>
            </thead>
            <!--end::Table head-->

            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">
                
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
                            <div class="me-3" style="width: 5rem;flex: 0 0 auto;">
                                <img class="card" src="https://m.media-amazon.com/images/I/71ROjSv2ttL._AC_UY327_FMwebp_QL65_.jpg" alt="{{ $book->title }}" style="width: 100%; height: 7rem; object-fit: cover;">
                            </div>
                            
                            <!-- Book details -->
                            <div class="d-flex flex-column">
                                <a href="{{ route('books.edit', $book->id) }}" class="text-gray-800 text-hover-primary mb-1 my-text-truncate">{{ $book->title }}</a>
                                <span>
                                    {{ $book->authors[0]->name }}
                                    @if(count($book->authors) > 1)
                                        and {{ (count($book->authors) - 1) }} others.
                                    @endif
                                </span>
                            </div>

                        </td>

                        <!-- Published Date-->
                        <td>
                        <div class="badge badge-light fw-bolder">{{ $book->published_date }}</div>
                        </td>

                        <!-- ISBN -->
                        <td>{{ $book->isbn }}</td>

                        <!-- Genre -->
                        <td>
                            {{ $book->genres }}
                        </td>

                        <!-- Date Added -->
                        <td>
                            <div class="badge badge-light fw-bolder">{{ $book->created_at }}</div>
                        </td>

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
                                    <a href="{{ route('books.edit', $book->id) }}" class="menu-link px-3">Edit</a>
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
            <!--end::Table body-->

        </table>
        <!--end::Table-->

    </div>
    <!--end::Card body-->

</div>
<!--end::books Table Card-->

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
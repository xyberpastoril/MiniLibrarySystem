@extends("layouts.core")

<!-- Admin > Books > Book Details -->

@section('title')
    Book Details
@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('books.index') }}" class="text-muted text-hover-primary">Books</a>
    </li>

    <!-- Item -->
    <li class="breadcrumb-item text-dark">Book Details
    </li>

@endsection

<!-- -->

@section("content")

    <div class="card mb-5 mb-xl-10">

        <form method="POST" action="{{ route('books.update', $book->id) }}" class="form" id="kt_form_book_details">
            @csrf
            @method('PUT')

            <div class="card-body p-9">
                <div class=" d-flex flex-column flex-lg-row">

                    <!-- Aside -->
                    <div class="flex-column flex-md-row-auto w-75 w-lg-200px w-xxl-225px">
                        <div class="row">

                            <!-- Cover Picture-->
                            <div class="col-lg-12">

                                <!-- Label -->
                                <label class="col-lg-12 col-form-label fw-bold fs-6">Book Cover</label>
                                <br>

                                <!-- Image input -->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset("media/books/blank.png") }}')">

                                    <!-- Preview existing avatar -->
                                    <div class="image-input-wrapper w-175px h-225px" style="background-image: url('@if($book->cover_url == null){{ asset("media/books/blank.png") }}@else{{ asset("media/books/$book->cover_url") }}@endif')"></div>

                                    <!-- Label -->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change book cover">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="cover" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="cover_remove">
                                    </label>

                                    <!-- Cancel -->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel book cover">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>

                                    <!-- Remove -->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove book cover">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>

                                </div>

                                <!-- Hint -->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>

                            </div>

                        </div>
                    </div>

                    <div class="flex-md-row-fluid ms-lg-12">

                        <!-- Book Title -->
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6 required">
                                <span>Book Title</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="title" class="form-control form-control-lg form-control-solid" value="{{ $book->title }}" placeholder="Enter Book Title">
                            </div>
                        </div>

                        <!-- Authors -->
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6 required">
                                <span>Author(s)</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="authors" class="form-control form-control-lg form-control-solid" value="{{ $book->authors[0]->name }}@for ($i = 1; $i < count($book->authors); $i++), {{ $book->authors[$i]->name }}@endfor" placeholder="ex. Author1, Author2">
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6 required">
                                <span>Description</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <textarea name="description" class="form-control form-control-lg form-control-solid min-h-300px" placeholder="Book Description here...">{{ $book->description }}
                                </textarea>
                            </div>
                        </div>

                        <!-- Page Count -->
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6 required">
                                <span>Page Count</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="number" name="page_count" class="form-control form-control-lg form-control-solid" value="{{ $book->copies_owned }}" placeholder="1" min="1">
                            </div>
                        </div>

                        <!-- Published Date -->
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6 required">
                                <span>Published Date</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="date" name="published_date" class="form-control form-control-lg form-control-solid" value="{{ $book->published_date }}">
                            </div>
                        </div>

                        <!-- ISBN -->
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6 required">
                                <span>ISBN</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="isbn" class="form-control form-control-lg form-control-solid" value="{{ $book->isbn }}" placeholder="Book ISBN">
                            </div>
                        </div>

                        <!-- Genres -->
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                <span>Genre(s)</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="text" name="genre" class="form-control form-control-lg form-control-solid" value="{{ $book->genres }}" placeholder="ex. Action, Fiction">
                            </div>
                        </div>

                        <!-- Total Copies -->
                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6 required">
                                <span>Total Copies</span>
                            </label>
                            <div class="col-lg-10 fv-row">
                                <input type="number" name="copies_owned" class="form-control form-control-lg form-control-solid" value="3" placeholder="0" min="0">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Actions -->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <div id="btn_group" class="btn-group visually-hidden">
                    <button type="reset" id="btn_discard" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                    <button type="submit" id="btn_save" class="btn btn-primary">Save Changes</button>
                </div>
                <button id="btn_delete" class="btn btn-danger">Delete</button>
            </div>
        </form>

    </div>

@endsection

<!-- -->

@section("vendor_js")

@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset("js/custom/admin/books-page/book-details.js") }}"></script>
@endsection

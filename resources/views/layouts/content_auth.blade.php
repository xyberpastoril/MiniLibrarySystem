<!-- Main -->
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">

        <!-- Aside -->
        @include('layouts.content_auth_aside')
        <!-- End Aside -->

        <div class="d-flex flex-column flex-lg-row-fluid py-10">

            <!-- Content -->
            @yield("content")
            <!-- End Content -->

            <!-- Footer -->
            @include("layouts.content_auth_footer")
            <!-- End Footer -->

        </div>

    </div>
</div>
<!-- End Main -->
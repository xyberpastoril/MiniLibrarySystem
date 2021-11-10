<!DOCTYPE html>
<html lang="en">
<head>

    @include("layouts.head_global")

    <title>Settings | README</title>

</head>
<body id="kt_body" class="aside-enabled">

    <!-- Main -->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">

            <!----------------------- begin::Aside (Sidebar)----------------------->
            @include("layouts.sidebar")
            <!----------------------- end::Aside (Sidebar) ----------------------->

            <!----------------------- begin::Page ----------------------->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!--begin::Header-->
                @include("layouts.header")
                <!--end::Header-->

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div id="kt_content_container" class="container-xxl">
                
                    @yield("content")
                
                    </div>
                </div>
                <!--end::Content-->


                <!--begin::Footer-->
                @include("layouts.footer")
                <!--end::Footer-->

            </div>
            <!----------------------- end::Page ----------------------->

        </div>
    </div>
    <!--end::Root-->

    <!-- Global Javascript Bundle(used by all pages) -->
    @include("layouts.script_global")
    
    <!-- Page Vendors Javascript(used by this page)-->
    @yield("vendor_js")

    <!-- Page Custom Javascript(used by this page) -->
    @yield("custom_js")

</body>
</html>
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">

        <!----------------------- begin::Aside (Sidebar)----------------------->
        @include("layouts.content_main_sidebar")
        <!----------------------- end::Aside (Sidebar) ----------------------->

        <!----------------------- begin::Page ----------------------->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

            <!--begin::Header-->
            @include("layouts.content_main_header")
            <!--end::Header-->

            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <div id="kt_content_container" class="container-xxl">
            
                @yield("content")
            
                </div>
            </div>
            <!--end::Content-->


            <!--begin::Footer-->
            @include("layouts.content_main_footer")
            <!--end::Footer-->

        </div>
        <!----------------------- end::Page ----------------------->

    </div>
</div>
<!--end::Root-->
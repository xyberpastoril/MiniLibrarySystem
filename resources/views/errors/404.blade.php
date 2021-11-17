<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Online Google Fonts Reference-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
        
        <!-- Global Stylesheets Bundle(used by all pages) -->
        <link href="{{ asset("plugins/global/plugins.bundle.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("css/style.bundle.css") }}" rel="stylesheet" type="text/css">
        
        <!-- Page Icon -->
        <link rel="shortcut icon" href="{{ asset("media/logos/icon.ico") }}">
    </head>
    <body>
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Authentication - 404 Page-->
            <div class="d-flex flex-column flex-center flex-column-fluid p-10">
                <!--begin::Illustration-->
                <img src="{{ asset('media/illustrations/sketchy-1/18.png') }}" alt class="mw-100 mb-10 h-lg-450px">
                <!--end::Illustration-->
                <!--begin::Message-->
                <h1 class="fw-bold mb-10" style="color: #A3A3C7">Seems there is nothing here</h1>
                <!--end::Message-->
                <!--begin::Link-->
                <a href="{{ route('home') }}" class="btn btn-primary">Return Home</a>
                <!--end::Link-->
            </div>
            <!--end::Authentication - 404 Page-->
        </div>
        <!--end::Main-->

        <script src="{{ asset("plugins/global/plugins.bundle.js") }}"></script>
        <script src="{{ asset("js/scripts.bundle.js") }}"></script>
    </body>

</html>
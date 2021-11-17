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
			<!--begin::Authentication - Error 500-->
			<div class="d-flex flex-column flex-column-fluid pt-10">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-center p-10 p-lg-20">
					<!--begin::Logo-->
					<a href="{{ route('home') }}" class="mb-15">
						<img alt="Logo" src="{{ asset('media/logos/default.svg') }}" class="h-30px">
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="text-center">
						<!--begin::Logo-->
						<h1 class="fw-bolder fs-2qx text-dark mb-7">System Error</h1>
						<!--end::Logo-->
						<!--begin::Message-->
						<div class="fw-bold fs-2 text-gray-400 mb-15">Something went wrong. Please try again 
						<br>later or contact the site administrator.</div>
						<!--end::Message-->
						<!--begin::Action-->
						<a href="{{ route('home') }}" class="btn btn-lg btn-primary">Go to homepage</a>
						<!--end::Action-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
				<!--begin::Illustration-->
				<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url({{ asset('media/illustrations/sketchy-1/17.png') }})"></div>
				<!--end::Illustration-->
			</div>
			<!--end::Authentication - Error 500-->
		</div>
		<!--end::Main-->
        
        <script src="{{ asset("plugins/global/plugins.bundle.js") }}"></script>
        <script src="{{ asset("js/scripts.bundle.js") }}"></script>
    </body>

</html>
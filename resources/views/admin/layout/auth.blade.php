<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			GARD | Admin Login
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
         <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="/demo/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/demo/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <style>
            .help-block{
                font-size: 11px;
                color: red;
            }
        </style>
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="/demo/assets/demo/default/media/img/logo/favicon.ico" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		
        @yield('content')
		<!-- end:: Page -->
    	<!--begin::Base Scripts -->
		<script src="/demo/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="/demo/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Snippets -->
		<script src="/demo/assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
	</body>
	<!-- end::Body -->
</html>

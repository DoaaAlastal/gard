<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Learnpro - Education University School Kindergarten Learning HTML Template" />
    <meta name="keywords" content="education,school,university,educational,learn,learning,teaching,workshop" />
    <meta name="author" content="ThemeMascot" />

    <!-- Page Title -->
    <title>GARD</title>

    <!-- Favicon and Touch Icons -->
    <link href="/user/images/favicon.png" rel="shortcut icon" type="image/png">
    <link href="/user/images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="/user/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="/user/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="/user/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    <!-- Stylesheet -->
    <link href="/user/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/user/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="/user/css/animate.css" rel="stylesheet" type="text/css">
    <link href="/user/css/css-plugin-collections.css" rel="stylesheet"/>
    <!-- CSS | menuzord megamenu skins -->
    <link href="/user/css/menuzord-megamenu.css" rel="stylesheet"/>
    <link id="menuzord-menu-skins" href="/user/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="/user/css/style-main.css" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="/user/css/preloader.css" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="/user/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="/user/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

    <!-- CSS | Theme Color -->
    <link href="/user/css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">


    <!-- external javascripts -->
    <script src="/user/js/jquery-2.2.4.min.js"></script>
    <script src="/user/js/jquery-ui.min.js"></script>
    <script src="/user/js/bootstrap.min.js"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="/user/js/jquery-plugin-collection.js"></script>
    <style>
        @import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
        * ,h4{
            font-family: 'Droid Arabic Kufi', serif ;
            font-size: 12px;
        }
        h3{
            font-family: 'Droid Arabic Kufi', serif ;
            font-size: 22px;
        }
        #home.bg-lighter {
            height: 100% !important;
            min-height: 100% !important;;
        }
    </style>

</head>
<body class="bg-lighter">
<div id="wrapper" class="clearfix">
    <!-- preloader -->
    <div id="preloader">
        <div id="spinner">
            <img alt="" src="/user/images/preloaders/7.gif">
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
    </div>

    <!-- Start main-content -->

@yield('content')

<!-- end main-content -->

    <!-- Footer -->
    <footer id="footer" class="footer text-center bg-lighter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(App::getlocale()=='en')
                    <p class="mb-0">Copyright &copy;2019 GARD. All Rights Reserved</p>
                    @else
                    <p class="font-12 text-black-777 m-0 sm-text-center">  GARD &copy;2019 .{{trans('app.Copyright')}} {{trans('app.All Rights Reserved')}}  </p>
                    @endif
                </div>
            </div>
        </div>
    </footer>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
@yield('js')
<script src="/user/js/custom.js"></script>

</body>
</html>

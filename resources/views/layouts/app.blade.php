<!DOCTYPE html>
<html @if(App::getLocale() == 'ar') dir="rtl" @else dir="ltr" @endif lang="{{App::getLocale()}}">
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
    <link href="{{asset('/user/images/favicon.png')}}" rel="shortcut icon" type="image/png">
    <link href="{{asset('/user/images/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="{{asset('/user/images/apple-touch-icon-72x72.png')}}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{asset('/user/images/apple-touch-icon-114x114.png')}}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{asset('/user/images/apple-touch-icon-144x144.png')}}" rel="apple-touch-icon" sizes="144x144">

    <!-- Stylesheet -->
    <link href="{{asset('/user/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/user/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/user/css/animate.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/user/css/css-plugin-collections.css')}}" rel="stylesheet"/>

    <!-- CSS | menuzord megamenu skins -->
    <link href="{{asset('/user/css/menuzord-megamenu.css')}}" rel="stylesheet"/>
    <link id="menuzord-menu-skins" href="{{asset('/user/css/menuzord-skins/menuzord-boxed.css')}}" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    @if(App::getLocale() == 'ar')
        <link href="{{asset('user/css/style-main-rtl.css')}}" rel="stylesheet" type="text/css">
    @else
        <link href="{{asset('/user/css/style-main.css')}}" rel="stylesheet" type="text/css">
    @endif
<!-- CSS | Preloader Styles -->
    <link href="{{asset('/user/css/preloader.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="{{asset('/user/css/custom-bootstrap-margin-padding.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="{{asset('/user/css/responsive.css')}}" rel="stylesheet" type="text/css">
    @if(App::getLocale() == 'ar')
    <!-- CSS | RTL Layout -->
        <link href="{{asset('user/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('user/css/style-main-rtl-extra.css')}}" rel="stylesheet" type="text/css">
    @endif

<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

    <!-- CSS | Theme Color -->
    <link href="{{asset('/user/css/colors/theme-skin-color-set6.css')}}" rel="stylesheet" type="text/css">

    <!-- external javascripts -->
    <script src="{{asset('/user/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('/user/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/user/js/bootstrap.min.js')}}"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="{{asset('/user/js/jquery-plugin-collection.js')}}"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @if(App::getLocale() == 'ar')
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.دقيقة.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.دقيقة.js"></script>

    <![endif]-->
    @endif
    @yield('css')
    <link href="/demo/assets/demo/default/custom/components/base/bootstrap-toastr/toastr.css" rel="stylesheet" type="text/css"/>

@if(App::getlocale()=='en')
        <link href="{{asset('/css/custom.css')}}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{asset('/css/custom_rtl.css')}}" rel="stylesheet" type="text/css" />
    @endif

</head>
<body class="">
<div id="wrapper" class="clearfix">
    <!-- preloader -->
    <div id="preloader">
        <div id="spinner">
            <img alt="" src="/user/images/preloaders/7.gif">
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
    </div>

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-top bg-theme-colored2 sm-text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget text-white">
                            <ul class="list-inline xs-text-center text-white">
                                <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-white"></i> {{App\Setting::getValue('mobile')->value }} </a> </li>
                                <li class="m-0 pl-10 pr-10">
                                    <a href="mailto:{{App\Setting::getValue('email')->value}}" class="text-white"><i class="fa fa-envelope-o text-white mr-5"></i> {{App\Setting::getValue('email')->value}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 pr-0">
                        <div class="widget">
                            <ul class="styled-icons icon-sm pull-right flip sm-pull-none sm-text-center mt-5">
                                @if(App::getLocale() == 'ar')
                                    <li><a title="English" href="{{url('locale/en')}}"><i class="fa fa-language text-white"></i></a></li>
                                @else
                                    <li title="عربي"><a href="{{url('locale/ar')}}"><i class="fa fa-language text-white"></i></a></li>
                                @endif
                                <li><a href="{{App\Setting::getValue('facebook')->value}}"><i class="fa fa-facebook text-white"></i></a></li>
                                <li><a href="{{App\Setting::getValue('twitter')->value}}"><i class="fa fa-twitter text-white"></i></a></li>
                                <li><a href="{{App\Setting::getValue('instagram')->value}}"><i class="fa fa-instagram text-white"></i></a></li>
                                <li><a href="{{App\Setting::getValue('linkedin')->value}}"><i class="fa fa-linkedin text-white"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if(!(Auth::guard('admin')->check() ||Auth::guard('instructor')->check()||Auth::guard('user')->check()) )
                            @if(App::getlocale()=='en')
                                <ul class="list-inline sm-pull-none sm-text-center text-right text-white mb-sm-20 mt-10">
                                    <li class="m-0 pl-10"> <a href="{{url('student/login')}}" class="text-white"><i class="fa fa-user-o mr-5 text-white"></i> {{trans('app.login')}} /</a> </li>
                                    <li class="m-0 pl-0 pr-10">
                                        <a href="{{url('student/register')}}" class="text-white"><i class="fa fa-edit mr-5"></i>{{trans('app.register')}}</a>
                                    </li>
                                </ul>
                            @else
                                <ul class="list-inline sm-pull-none sm-text-center text-right text-white mb-sm-20 mt-10">
                                    <li class="m-0 pr-10"> <a href="{{url('student/login')}}" class="text-white"><i class="fa fa-user-o ml-5 text-white"></i> {{trans('app.login')}} /</a> </li>
                                    <li class="m-0 pr-0 pl-10">
                                        <a href="{{url('student/register')}}" class="text-white"><i class="fa fa-edit ml-5"></i>{{trans('app.register')}}</a>
                                    </li>
                                </ul>
                            @endif
                        @else
                            @if(Auth::guard('user')->check())
                                <div class="dropdown" style="margin-top: 9px;color: #fff;cursor: pointer">
                                    <a class="dropdown-toggle" data-toggle="dropdown" style="color: white">
                                        {{\Auth::guard('user')->user()->email }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/student/account')}}">{{trans('app.Profile')}}</a></li>
                                        <li><a href="{{url('/student/profile/messages')}}">{{trans('app.Messages')}}</a></li>
                                        <li>
                                            <a href="{{ url('/student/logout') }}"
                                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                {{trans('app.Logout')}}
                                            </a>
                                            <form id="logout-form" action="{{ url('/student/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @elseif(Auth::guard('instructor')->check())
                                <div class="dropdown" style="margin-top: 9px;color: #fff;cursor: pointer">
                                    <a class="dropdown-toggle" data-toggle="dropdown" style="color: white">
                                        {{\Auth::guard('instructor')->user()->email }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/instructor/profile')}}">{{trans('app.Profile')}}</a></li>
                                        <li>
                                            <a href="{{ url('/instructor/logout') }}"
                                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                {{trans('app.Logout')}}
                                            </a>
                                            <form id="logout-form" action="{{ url('/instructor/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @elseif(Auth::guard('admin')->check())
                                <div class="dropdown" style="margin-top: 9px;color: #fff;cursor: pointer">
                                    <a class="dropdown-toggle" data-toggle="dropdown" style="color: white">
                                        {{\Auth::guard('admin')->user()->email }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/admin/profile')}}">{{trans('app.Profile')}}</a></li>
                                        <li>
                                            <a href="{{ url('/admin/logout') }}"
                                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                {{trans('app.Logout')}}
                                            </a>
                                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
                <div class="container">
                    <nav id="menuzord-right" class="menuzord"><a class="menuzord-brand pull-left flip mt-sm-10 mb-sm-20" href="{{url('/')}}"><img src="/{{App\Setting::getValue('logo')->value}}" alt=""></a>
                        <ul class="menuzord-menu">
                            <li @if(\Request::is('/')) class="active" @endif><a href="{{url('/')}}">{{trans('app.Home')}}</a></li>
                            <li @if(\Request::is('online-events')) class="active" @elseif (\Request::is('offline-events')) class="active" @endif><a>{{trans('app.events')}} </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="{{url('/online-events')}}">{{trans('app.online-Events')}}</a>
                                    </li>

                                    <li>
                                        <a href="{{url('/offline-events')}}">{{trans('app.offline-Events')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <li @if(\Request::is('courses')) class="active" @endif><a href="{{url('courses')}}">{{trans('index.courses')}}</a></li>
                            <li @if(\Request::is('videos')) class="active" @endif><a href="{{url('videos')}}">{{trans('index.videos')}}</a></li>
                            <li @if(\Request::is('artical')) class="active" @endif><a href="{{url('/artical')}}">{{trans('app.Articles')}}</a></li>
                            <li @if(\Request::is('news')) class="active" @endif><a href="{{url('/news')}}">{{trans('index.news')}}</a></li>
                            <li @if(\Request::is('about-page')) class="active" @endif><a href="{{url('about-page')}}">{{trans('app.About')}}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Start main-content -->
    <div class="main-content">

        @yield('content')
    </div>
    <!-- end main-content -->

    <!-- Start Newsletter -->
    <section class="newsletter clients bg-theme-colored2">
        <div class="container  pt-10 pb-10">
            <div class="row">

                <div class="col-sm-12">
                    <div class="content">
                        <h3>{{trans('app.Subscribe-title')}}</h3>
                        <form method="post" action="{{url('/newsletter')}}">
                            @csrf
                            <div class="input-group">
                                <input class="form-control" type="email" name="email" id="email" placeholder="{{trans('app.subscribe-placeholder')}}" required>
                                <span class="input-group-btn">
                                 <button class="btn" type="submit">{{trans('app.Subscribe')}}</button>
                            </span>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Newsletter -->


    <!-- Footer -->
    <footer id="footer" class="footer" data-bg-color="#212331">
        <div class="container pt-70 pb-40">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <img class="mt-5 mb-20" alt="" src="/user/images/logo-white-footer.png">
                        <p>@if(App::getlocale() =='en'){{App\Setting::getValue('location')->value}}@else{{App\Setting::getValue('ar_location')->value}}@endif</p>
                        <ul class="list-inline mt-5">
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">{{App\Setting::getValue('mobile')->value}}</a> </li>
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored2 mr-5"></i> <a class="text-gray" href="mailto:{{App\Setting::getValue('email')->value}}">{{App\Setting::getValue('email')->value}}</a> </li>
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored2 mr-5"></i> <a class="text-gray" href="{{App\Setting::getValue('url')->value}}">{{App\Setting::getValue('url')->value}}</a> </li>
                        </ul>
                        <ul class="styled-icons icon-sm icon-bordered icon-circled clearfix mt-10">
                            <li><a href="{{App\Setting::getValue('facebook')->value}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{App\Setting::getValue('twitter')->value}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{App\Setting::getValue('instagram')->value}}"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{App\Setting::getValue('linkedin')->value}}"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h4 class="widget-title line-bottom-theme-colored-2">{{trans('app.Useful Links')}}</h4>
                        <ul class="angle-double-right list-border">
                            <li><a href="{{url('/')}}">{{trans('app.Home')}}</a></li>
                            <li><a href="{{url('/about-page')}}">{{trans('app.About Us')}}</a></li>
                            <li><a href="{{url('/mission-page')}}">{{trans('app.Our Mission')}}</a></li>
                            <li><a href="{{url('/terms-page')}}">{{trans('app.Terms and Conditions')}}</a></li>
                            <li><a href="{{url('/privacy-page')}}">{{trans('app.Privacy Policy')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h4 class="widget-title line-bottom-theme-colored-2">{{trans('index.lastest')}} {{trans('index.news')}}</h4>
                        <div class="latest-posts">
                            @foreach(App\Post::orderBy('created_at','desc')->where('type','news')->whereNull('deleted_at')->take(3)->get() as $item)
                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a class="post-thumb post-img-thumb" href="{{url('/post-details/'.$item->id)}}"><img src="{{asset($item->thumb_image)}}" alt=""></a>
                                    <div class="post-right">
                                        <h5 class="post-title mt-0 mb-5"><a href="{{url('/post-details/'.$item->id)}}">@if(App::getlocale() == 'en'){{$item->en_title}}@else{{$item->ar_title}}@endif</a></h5>
                                        <p class="post-date mb-0 font-12">{{date('Y,M,d', strtotime($item->created_at))}}
                                        </p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h4 class="widget-title line-bottom-theme-colored-2">{{trans('index.lastest')}} {{trans('app.online-Events')}}</h4>
                        <div class="opening-hours">
                            <ul class="list-border">
                                @foreach(App\Event::orderBy('created_at','desc')->where('IsOnline',1)->take(4)->get() as $item)
                                    <li class="clearfix"> <span>@if(App::getlocale() == 'en') {{$item->en_title}}@else{{$item->ar_title}}@endif :  </span>
                                        <div class="value pull-right"> {{date('H:i', strtotime($item->start_at))}} <strong>- </strong> {{date('H:i', strtotime($item->end_at))}} </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom" data-bg-color="#2b2d3b">
            <div class="container pt-20 pb-20">
                <div class="row">
                    <div class="col-md-6">
                        <p class="font-12 text-black-777 m-0 sm-text-center">{{trans('app.Copyright')}} {{trans('app.All Rights Reserved')}} &copy; GARD-2019.  </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="/user/js/custom.js"></script>
<script src="/demo/assets/demo/default/custom/components/base/toastr.js" type="text/javascript"></script>
<script src="/demo/assets/demo/default/custom/components/base/bootstrap-toastr/toastr.js" type="text/javascript"></script>
<script src="/demo/assets/demo/default/custom/components/base/ui-toastr.min.js" type="text/javascript"></script>
@toastr_render



</body>
</html>

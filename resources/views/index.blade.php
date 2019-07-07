@extends('layouts.app')
@section('content')
    @if(App::getLocale() == 'en')
    <!-- Section: home -->
    <section id="home">
        <div class="container-fluid p-0">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <!-- Indicators bullet -->
                <ol class="carousel-indicators">
                    @foreach($slides as $slide)
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $index++ }}" class="@if($loop->first) active @endif"></li>
                    @endforeach
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach($slides as $slide)
                        <div class="item @if($loop->first) active @endif">
                            <img src="{{asset($slide->image)}}" alt="...">
                            <div class="carousel-caption">
                                <h1>{{$slide->en_title}}</h1>
                                <p>{{$slide->en_description}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </section>

    <!-- Section: Features -->
    <section class="layer-overlay overlay-white-9" data-bg-img="images/bg/bg-pattern.png">
        <div class="container pb-40">
            <div class="section-content">
                <div class="row">
                    @foreach($sections as $section)
                    <div class="col-md-3">
                        <div class="icon-box hover-effect border-1px border-radius-10px text-center bg-white p-15 pt-40 pb-30">
                            <a href="" class="icon icon-circled icon-lg" data-bg-color="{{$section->color}}">
                                <i class="{{$section->icon_class}} text-white font-48"></i>
                            </a>
                            <h4 class="icon-box-title text-uppercase letter-space-1 font-20 mt-15">
                                <a href="">
                                    {{$section->en_title}}
                                </a>
                            </h4>
                            <p class="">
                                {{$section->en_description}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Section: About -->
    <section id="about">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="double-line-bottom-theme-colored-2"></div>
                        <h3 class="font-weight-500 font-30 font- mt-10">{{App\Page::getPage('summary')->en_title}}</h3>
                        <p>
                            {{App\Page::getPage('summary')->en_content}}
                        </p>
                        <img src="{{App\Setting::getValue('signature')->value}}" alt="" class="mt-10 mb-15">
                    </div>
                    <div class="col-md-6">
                        <div class="box-hover-effect about-video">
                            <div class="effect-wrapper">
                                <div class="thumb">
                                    <img class="img-responsive img-fullwidth" src="/user/images/ytbtn.jpg" alt="">
                                </div>
                                <div class="video-button"></div>
                                <a class="hover-link" data-lightbox-gallery="youtube-video" href="{{App\Setting::getValue('definition_video')->value}}" title="Youtube Video">Youtube Video</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Courses -->
    <section id="courses" class="bg-silver-deep">
        <div class="container pb-40">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase title">Latest <span class="text-theme-colored2">Courses</span></h2>
                        <p class="text-uppercase mb-0">Choose Your Desired Course</p>
                        <div class="double-line-bottom-theme-colored-2"></div>
                    </div>
                </div>
            </div>
            <div class="row mtli-row-clearfix">
                <div class="owl-carousel-3col" data-nav="true">
                    @foreach($courses as $course)
                    <div class="item">
                        <div class="course-single-item bg-white border-1px clearfix mb-30">
                            <div class="course-thumb">
                                <img class="img-fullwidth" alt="" src="{{asset($course->thumb_image)}}">
                                <div class="price-tag">@if($course->price < 0) Free @else ${{$course->price}} @endif </div>
                            </div>
                            <div class="course-details clearfix p-20 pt-15">
                                <div class="course-top-part pull-left mr-40">
                                    <a href="{{url('/course-details/'.$course->id)}}"><h4 class="mt-0 mb-5">{{$course->en_title}}</h4></a>
                                    <ul class="list-inline">
                                        <li class="star-rating mt-5 mb-5 ml-0">
                                            <span data-width="{{$course->reviews*20}}%">{{$course->reviews}}</span>
                                        </li>
                                        <li class="mt-5 mb-5 ml-0">
                                            <span>{{$course->totalCommentsCount()}} <i class="fa fa-comments-o text-theme-colored2"></i></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="author-thumb course-tec-thumb">
                                    <img src="{{asset($course->model->image)}}" alt="" class="img-circle">
                                    <img src="" alt="" class="img-circle">
                                </div>
                                <div class="clearfix"></div>
                                <p class="course-description mt-20"> {{$course->en_description}}</p>
                                <ul class="list-inline course-meta mt-15">
                                    <li>
                                        <h6>{{$course->number_of_videos}}</h6>
                                        <span> Videos</span>
                                    </li>
                                    <li>
                                        <h6>{{$course->users->count()}}</h6>
                                        <span> Students</span>
                                    </li>
                                    <li>
                                        <h6><span class="course-time">{{$course->number_of_hours}} Hours</span></h6>
                                        <span> Duration</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Why Choose Us -->
    <section>
        <div class="container pt-30 pb-0">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-fullwidth service-img" src="{{App\Setting::getValue('service')->value}}" alt="">
                </div>
                <div class="col-md-7 pt-20">
                    <div class="row mtli-row-clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h2>Why <span class="text-theme-colored2">Choose</span> Us?</h2>
                            <div class="double-line-bottom-theme-colored-2 mb-30"></div>
                        </div>
                        @foreach($services as $service)
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="icon-box left media p-0 mb-40">
                                <a class="media-left pull-left flip mr-20" href="#"><i class="{{$service->icon_class}} text-theme-colored2 font-weight-600"></i></a>
                                <div class="media-body">
                                    <h4 class="media-heading heading mb-10">{{$service->en_name}}</h4>
                                    <p>{{$service->en_description}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section: Gallery -->
    <section id="gallery" class="bg-silver-deep">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase title">Latest Video</h2>
                        <p class="text-uppercase mb-0">See our videos</p>
                        <div class="double-line-bottom-theme-colored-2"></div>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Works Filter -->
                        <div class="portfolio-filter font-alt align-center">
                            <a href="#" class="active" data-filter="*">All</a>
                            @foreach($categories as $category)
                                <a href="#select{{$category->id}}" data-filter=".select{{$category->id}}" class="">{{$category->en_name}}</a>
                            @endforeach
                        </div>
                        <!-- End Works Filter -->

                        <!-- Portfolio Gallery Grid -->
                        <div id="grid" class="gallery-isotope default-animation-effect grid-4 gutter clearfix">
                            @foreach($videos as $video)
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item select{{$video->category_id}}">
                                <div class="box-hover-effect about-video">
                                    <div class="effect-wrapper">
                                        <div class="thumb video_thumbnail">
                                            <img class="img-responsive img-fullwidth" src="{{$video->thumb_image}}" alt="">
                                        </div>
                                        <div class="video-button"></div>
                                        <a class="hover-link" data-lightbox-gallery="youtube-video" href="{{$video->url}}" title="{{$video->en_title}}">{{$video->en_title}}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Portfolio Item End -->
                           @endforeach
                        </div>
                        <!-- End Portfolio Gallery Grid -->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section: Team -->
    <section id="team" >
        <div class="container pb-40">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase title">Qualified <span class="text-theme-colored2">Instructors</span></h2>
                        <p class="text-uppercase mb-0">We Have Highly Qualified Teachers</p>
                        <div class="double-line-bottom-theme-colored-2"></div>
                    </div>
                </div>
            </div>
            <div class="row mtli-row-clearfix">
                @foreach($instructors as $instructor)
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
                        <div class="team-thumb">
                            <img class="img-fullwidth instructor-img" alt="" src="{{asset($instructor->image)}}">
                            <div class="team-overlay"></div>
                            <ul class="styled-icons team-social icon-sm">
                                <li><a href="{{$instructor->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$instructor->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-details">
                            <h4 class="text-uppercase text-theme-colored font-weight-600 m-5">{{$instructor->en_name}}</h4>
                            <h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0">{{$instructor->en_job_title}}</h6>
                            <p class="hidden-md">{{$instructor->en_bio}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!--start Funfacts Section-->
    <section class="parallax layer-overlay overlay-theme-colored-9" data-bg-img="{{App\Setting::getValue('countbg')->value}}" data-parallax-ratio="0.4">
        <div class="container pt-70 pb-90">
            <div class="section-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                        <div class="funfact text-center">
                            <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="{{$stdcount}}" data-theme="minimal">0</div>
                            <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                            <h5 class="text-white text-uppercase mb-0">Happy Students</h5>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                        <div class="funfact text-center">
                            <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="{{$corcount}}" data-theme="minimal">0</div>
                            <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                            <h5 class="text-white text-uppercase mb-0">Approved Courses</h5>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                        <div class="funfact text-center">
                            <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="{{$inscount}}" data-theme="minimal">0</div>
                            <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                            <h5 class="text-white text-uppercase mb-0">Certified Teachers</h5>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
                        <div class="funfact text-center">
                            <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="{{$evecount}}" data-theme="minimal">0</div>
                            <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                            <h5 class="text-white text-uppercase mb-0">All Events</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Testimonials -->
    <section style="display: none" class="bg-silver-deep">
        <div class="container pt-70 pb-30">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase title">What <span class="text-theme-colored2">People </span>Say</h2>
                        <p class="text-uppercase mb-0">Student and Parents Opinion</p>
                        <div class="double-line-bottom-theme-colored-2"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-30">
                    <div class="owl-carousel-2col boxed" data-dots="true">
                        <div class="item">
                            <div class="testimonial pt-10">
                                <div class="thumb pull-left mb-0 mr-0">
                                    <img class="img-thumbnail img-circle" alt="" src="http://placehold.it/100x100" width="110">
                                </div>
                                <div class="testimonial-content">
                                    <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                                    <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                                    <h6 class="mt-5">CEO apple.inc</h6>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial pt-10">
                                <div class="thumb pull-left mb-0 mr-0">
                                    <img class="img-thumbnail img-circle" alt="" src="http://placehold.it/100x100" width="110">
                                </div>
                                <div class="testimonial-content">
                                    <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                                    <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                                    <h6 class="mt-5">CEO apple.inc</h6>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial pt-10">
                                <div class="thumb pull-left mb-0 mr-0">
                                    <img class="img-thumbnail img-circle" alt="" src="http://placehold.it/100x100" width="110">
                                </div>
                                <div class="testimonial-content">
                                    <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                                    <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                                    <h6 class="mt-5">CEO apple.inc</h6>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial pt-10">
                                <div class="thumb pull-left mb-0 mr-0">
                                    <img class="img-thumbnail img-circle" alt="" src="http://placehold.it/100x100" width="110">
                                </div>
                                <div class="testimonial-content">
                                    <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                                    <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                                    <h6 class="mt-5">CEO apple.inc</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: blog -->
    <section id="blog">
        <div class="container pb-40">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase title">Latest <span class="text-theme-colored2">News </span></h2>
                        <p class="text-uppercase mb-0">See All Time Latest News</p>
                        <div class="double-line-bottom-theme-colored-2"></div>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel-3col owl-nav-top" data-nav="true">
                            @foreach($news as $item)
                            <div class="item">
                                <article class="post clearfix mb-30">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="{{asset($item->thumb_image)}}" alt="" class="img-responsive img-fullwidth blog-img">
                                        </div>
                                        <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">{{$item->created_at->format('d')}}</li>
                                                <li class="font-12 text-white text-uppercase">{{$item->created_at->format('M')}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="entry-content p-15">
                                        <div class="entry-meta media no-bg no-border mt-0 mb-10">
                                            <div class="media-body pl-0">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="{{url('/post-details/'.$item->id)}}">{{$item->en_title}}</a></h4>
                                                    <ul class="list-inline">
                                                        <li><i class="fa fa-user-o mr-5 text-theme-colored2"></i>{{$item->en_author}}</li>
                                                        <li style="display: none"><i class="fa fa-thumbs-o-up mr-5 text-theme-colored2"></i>895 Likes</li>
                                                        <li><i class="fa fa-comment mr-5 text-theme-colored2"></i> {{$item->totalCommentsCount()}} comments</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-5">{{str_limit($item->en_content , 100)}}</p>
                                        <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="{{url('/post-details/'.$item->id)}}"> View Details</a>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Arabic Page -->
    @else

        <!-- Section: home -->
        <section id="home">
            <div class="container-fluid p-0">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <!-- Indicators bullet -->
                    <ol class="carousel-indicators">
                        @foreach($slides as $slide)
                            <li data-target="#carousel-example-generic" data-slide-to="{{ $arindex++ }}" class="@if($loop->first) active @endif"></li>
                        @endforeach
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @foreach($slides as $slide)
                            <div class="item @if($loop->first) active @endif">
                                <img src="{{asset($slide->image)}}" alt="...">
                                <div class="carousel-caption">
                                    <h1>{{$slide->en_title}}</h1>
                                    <p>{{$slide->en_description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </section>

        <!-- Section: Features -->
        <section class="layer-overlay overlay-white-9" data-bg-img="images/bg/bg-pattern.png">
            <div class="container pb-40">
                <div class="section-content">
                    <div class="row">
                        @foreach($sections as $section)
                            <div class="col-md-3">
                                <div class="icon-box hover-effect border-1px border-radius-10px text-center bg-white p-15 pt-40 pb-30">
                                    <a class="icon icon-circled icon-lg" data-bg-color="{{$section->color}}">
                                        <i class="{{$section->icon_class}} text-white font-48"></i>
                                    </a>
                                    <h4 class="icon-box-title text-uppercase letter-space-1 font-20 mt-15">
                                        <a >
                                            {{$section->ar_title}}
                                        </a>
                                    </h4>
                                    <p class="">
                                        {{$section->ar_description}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: About -->
        <section id="about">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="double-line-bottom-theme-colored-2"></div>
                            <h3 class="font-weight-500 font-30 font- mt-10">{{App\Page::getPage('summary')->ar_title}}</h3>
                            <p>
                                {{App\Page::getPage('summary')->ar_content}}
                            </p>
                            <img src="{{App\Setting::getValue('signature')->value}}" alt="" class="mt-10 mb-15">
                        </div>
                        <div class="col-md-6">
                            <div class="box-hover-effect about-video">
                                <div class="effect-wrapper">
                                    <div class="thumb">
                                        <img class="img-responsive img-fullwidth" src="/user/images/ytbtn.jpg" alt="">
                                    </div>
                                    <div class="video-button"></div>
                                    <a class="hover-link" data-lightbox-gallery="youtube-video" href="{{App\Setting::getValue('definition_video')->value}}" title="Youtube Video">Youtube Video</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Courses -->
        <section id="courses" class="bg-silver-deep">
            <div class="container pb-40">
                <div class="section-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase title"> {{trans('index.lastest')}}<span class="text-theme-colored2">{{trans('index.courses')}}</span></h2>
                            <p class="text-uppercase mb-0">{{trans('index.course-subtitle')}}</p>
                            <div class="double-line-bottom-theme-colored-2"></div>
                        </div>
                    </div>
                </div>
                <div class="row mtli-row-clearfix">
                    <div class="owl-carousel-3col" data-nav="true">
                        @foreach($courses as $course)
                            <div class="item">
                                <div class="course-single-item bg-white border-1px clearfix mb-30">
                                    <div class="course-thumb">
                                        <img class="img-fullwidth" alt="" src="{{asset($course->thumb_image)}}">
                                        <div class="price-tag">@if($course->price < 0) Free @else ${{$course->price}} @endif </div>
                                    </div>
                                    <div class="course-details clearfix p-20 pt-15">
                                        <div class="course-top-part pull-left mr-40">
                                            <a href="{{url('/course-details/'.$course->id)}}"><h4 class="mt-0 mb-5">{{$course->ar_title}}</h4></a>
                                            <ul class="list-inline">

                                                <li class="star-rating">
                                                    <span data-width="{{$course->reviews*20}}%">{{$course->reviews}}</span>
                                                </li>
                                                <li class="mt-5 mb-5 ml-0">
                                                    <span>{{$course->totalCommentsCount()}} <i class="fa fa-comments-o text-theme-colored2"></i></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="author-thumb course-tec-thumb">
                                            <img src="{{asset($course->model->image)}}" alt="" class="img-circle">
                                            <img src="" alt="" class="img-circle">
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class="course-description mt-20"> {{$course->ar_description}}</p>
                                        <ul class="list-inline course-meta mt-15">
                                            <li>
                                                <h6>{{$course->number_of_videos}}</h6>
                                                <span> {{trans('index.videos')}}</span>
                                            </li>
                                            <li>
                                                <h6>{{$course->users->count()}}</h6>
                                                <span>{{trans('index.students')}} </span>
                                            </li>
                                            <li>
                                                <h6><span class="course-time">{{$course->number_of_hours}} {{trans('index.hours')}} </span></h6>
                                                <span>{{trans('index.duration')}} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider: Why Choose Us -->
        <section>
            <div class="container pt-30 pb-0">
                <div class="row">
                    <div class="col-md-5">
                        <img class="img-fullwidth service-img" src="{{App\Setting::getValue('service')->value}}" alt="">
                    </div>
                    <div class="col-md-7 pt-20">
                        <div class="row mtli-row-clearfix">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h2>{{trans('index.why')}} <span class="text-theme-colored2">{{trans('index.choose')}}</span>@if(App::getLocale() == 'en') Us?@else ? @endif</h2>
                                <div class="double-line-bottom-theme-colored-2 mb-30"></div>
                            </div>
                            @foreach($services as $service)
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="icon-box left media p-0 mb-40">
                                        <a class="media-left pull-left flip ml-20" href="#"><i class="{{$service->icon_class}} text-theme-colored2 font-weight-600"></i></a>
                                        <div class="media-body">
                                            <h4 class="media-heading heading mb-10">{{$service->ar_name}}</h4>
                                            <p>{{$service->ar_description}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Section: Gallery -->
        <section id="gallery" class="bg-silver-deep">
            <div class="container">
                <div class="section-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase title">آخر الفيديوهات</h2>
                            <p class="text-uppercase mb-0">شاهد آخر فيديوهاتنا</p>
                            <div class="double-line-bottom-theme-colored-2"></div>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Works Filter -->
                            <div class="portfolio-filter font-alt align-center">
                                <a href="#" class="active" data-filter="*">الكل</a>
                                @foreach($categories as $category)
                                    <a href="#select{{$category->id}}" data-filter=".select{{$category->id}}" class="">{{$category->ar_name}}</a>
                                @endforeach
                            </div>
                            <!-- End Works Filter -->

                            <!-- Portfolio Gallery Grid -->
                            <div id="grid" class="gallery-isotope default-animation-effect grid-4 gutter clearfix" style="position: relative; height: 495px;" >
                            @foreach($videos as $video)
                                <!-- Portfolio Item Start -->
                                    <div class="gallery-item select{{$video->category_id}}">
                                        <div class="box-hover-effect about-video">
                                            <div class="effect-wrapper">
                                                <div class="thumb video_thumbnail">
                                                    <img class="img-responsive img-fullwidth" src="/{{$video->thumb_image}}" alt="">
                                                </div>
                                                <div class="video-button"></div>
                                                <a class="hover-link" data-lightbox-gallery="youtube-video" href="{{$video->url}}" title="{{$video->ar_title}}">{{$video->ar_title}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Portfolio Item End -->
                                @endforeach
                            </div>
                            <!-- End Portfolio Gallery Grid -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Team -->
        <section id="team" >
            <div class="container pb-40">
                <div class="section-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase title">{{trans('index.qualified')}} <span class="text-theme-colored2">{{trans('index.instructors')}}</span></h2>
                            <p class="text-uppercase mb-0">{{trans('index.team-subtitle')}}</p>
                            <div class="double-line-bottom-theme-colored-2"></div>
                        </div>
                    </div>
                </div>
                <div class="row mtli-row-clearfix">
                    @foreach($instructors as $instructor)
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
                                <div class="team-thumb">
                                    <img class="img-fullwidth instructor-img" alt="" src="{{asset($instructor->image)}}">
                                    <div class="team-overlay"></div>
                                    <ul class="styled-icons team-social icon-sm">
                                        <li><a href="{{$instructor->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{$instructor->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                                <div class="team-details">
                                    <h4 class="text-uppercase text-theme-colored font-weight-600 m-5">{{$instructor->ar_name}}</h4>
                                    <h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0">{{$instructor->ar_job_title}}</h6>
                                    <p class="hidden-md">{{$instructor->ar_bio}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!--start Funfacts Section-->
        <section class="parallax layer-overlay overlay-theme-colored-9" data-bg-img="{{App\Setting::getValue('countbg')->value}}" data-parallax-ratio="0.4">
            <div class="container pt-70 pb-90">
                <div class="section-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                            <div class="funfact text-center">
                                <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="{{$stdcount}}" data-theme="minimal">0</div>
                                <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                                <h5 class="text-white text-uppercase mb-0">{{trans('index.happy-students')}}</h5>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                            <div class="funfact text-center">
                                <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="{{$corcount}}" data-theme="minimal">0</div>
                                <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                                <h5 class="text-white text-uppercase mb-0">{{trans('index.approved-courses')}}</h5>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                            <div class="funfact text-center">
                                <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="{{$inscount}}" data-theme="minimal">0</div>
                                <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                                <h5 class="text-white text-uppercase mb-0">{{trans('index.certified-teachers')}}</h5>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
                            <div class="funfact text-center">
                                <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="{{$evecount}}" data-theme="minimal">0</div>
                                <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                                <h5 class="text-white text-uppercase mb-0">{{trans('index.all-events')}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider: Testimonials -->
        <section style="display: none" class="bg-silver-deep">
            <div class="container pt-70 pb-30">
                <div class="section-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase title">{{trans('index.what')}} <span class="text-theme-colored2">People </span>Say</h2>
                            <p class="text-uppercase mb-0">{{trans('index.say_subtitle')}} </p>
                            <div class="double-line-bottom-theme-colored-2"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="owl-carousel-2col boxed" data-dots="true">
                            <div class="item">
                                <div class="testimonial pt-10">
                                    <div class="thumb pull-left mb-0 mr-0">
                                        <img class="img-thumbnail img-circle" alt="" src="http://placehold.it/100x100" width="110">
                                    </div>
                                    <div class="testimonial-content">
                                        <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                                        <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                                        <h6 class="mt-5">CEO apple.inc</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial pt-10">
                                    <div class="thumb pull-left mb-0 mr-0">
                                        <img class="img-thumbnail img-circle" alt="" src="http://placehold.it/100x100" width="110">
                                    </div>
                                    <div class="testimonial-content">
                                        <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                                        <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                                        <h6 class="mt-5">CEO apple.inc</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial pt-10">
                                    <div class="thumb pull-left mb-0 mr-0">
                                        <img class="img-thumbnail img-circle" alt="" src="http://placehold.it/100x100" width="110">
                                    </div>
                                    <div class="testimonial-content">
                                        <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                                        <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                                        <h6 class="mt-5">CEO apple.inc</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial pt-10">
                                    <div class="thumb pull-left mb-0 mr-0">
                                        <img class="img-thumbnail img-circle" alt="" src="http://placehold.it/100x100" width="110">
                                    </div>
                                    <div class="testimonial-content">
                                        <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                                        <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                                        <h6 class="mt-5">CEO apple.inc</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: blog -->
        <section id="blog">
            <div class="container pb-40">
                <div class="section-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase title">{{trans('index.lastest')}} <span class="text-theme-colored2">{{trans('index.news')}}  </span></h2>
                            <p class="text-uppercase mb-0">{{trans('index.news-subtitle')}}</p>
                            <div class="double-line-bottom-theme-colored-2"></div>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel-3col owl-nav-top" data-nav="true">
                                @foreach($news as $item)
                                    <div class="item">
                                        <article class="post clearfix mb-30">
                                            <div class="entry-header">
                                                <div class="post-thumb thumb">
                                                    <img src="{{asset($item->thumb_image)}}" alt="" class="img-responsive img-fullwidth blog-img">
                                                </div>
                                                <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15 ">
                                                    <ul>
                                                        <li class="font-16 text-white font-weight-600">{{$item->created_at->format('d')}}</li>
                                                        <li class="font-12 text-white text-uppercase">{{$item->created_at->format('M')}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="entry-content p-15">
                                                <div class="entry-meta media no-bg no-border mt-0 mb-10">
                                                    <div class="media-body pl-0">
                                                        <div class="event-content pull-left flip">
                                                            <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="{{url('/post-details/'.$item->id)}}">{{$item->ar_title}}</a></h4>
                                                            <ul class="list-inline">
                                                                <li><i class="fa fa-user-o ml-5 text-theme-colored2"></i>{{$item->ar_author}}</li>
                                                                <li style="display: none"><i class="fa fa-thumbs-o-up ml-5 text-theme-colored2"></i>895 {{trans('index.likes')}}</li>
                                                                <li><i class="fa fa-comment ml-5 text-theme-colored2"></i> {{$item->totalCommentsCount()}} {{trans('index.comments')}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-5">{{str_limit($item->ar_content , 100)}}</p>
                                                <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="{{url('/post-details/'.$item->id)}}"> {{trans('index.View Details')}}</a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    @endif




@endsection

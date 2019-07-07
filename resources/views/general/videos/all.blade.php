@extends('layouts.app')
@section('content')
@if(App::getlocale()=='en')
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="{{App\Setting::getValue('coursebg')->value}}">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-theme-colored2 font-36">Videos List</h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">All Videos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Gallery -->
    <section >
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




    <!-- Arabic All Courses Page -->
@else
 <!-- Section: inner-header -->
 <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="{{App\Setting::getValue('coursebg')->value}}">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-theme-colored2 font-36">{{trans('app.Course List')}}</h2>
                        <ol class="breadcrumb pull-right mt-10 white">
                            <li><a href="{{url('/')}}">{{trans('app.Home')}}</a></li>
                            <li class="active">{{trans('app.All Courses')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <!-- Section: Gallery -->
 <section >
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


@endif
@endsection

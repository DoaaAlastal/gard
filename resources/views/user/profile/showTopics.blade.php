@extends('layouts.app')
@section('content')
    @if(App::getlocale()=='en')
 
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/uploads/general/book.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36"> {{$course->en_title}} Topics</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/student/account')}}">Your Courses</a></li>
                <li><a>{{$course->en_title}}</a></li>
                <li class="active">Topics</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Events Grid -->
    <section>
      <div class="container pt-70 pb-40">
        <div class="section-content">
          <div class="row multi-row-clearfix">

            @foreach($course->topics as $item)
            <div class="col-sm-6 col-md-4">
              <article class="post clearfix mb-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                  <div class="box-hover-effect about-video">
                            <div class="effect-wrapper">
                                <div class="thumb">
                                    <img class="img-responsive img-fullwidth" src="/user/images/ytbtn.jpg" alt="">
                                </div>
                                <div class="video-button"></div>
                                <a class="hover-link" data-lightbox-gallery="youtube-video" href="{{asset($item->video)}}" title="Youtube Video">Youtube Video</a>
                            </div>
                        </div>
                </div> 
                  </div>                    
                  
                <div class="entry-content p-15">
                  <div class="entry-meta media no-bg no-border mt-0 mb-10">
                    <div class="media-body pl-0">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a >{{$item->en_title}}</a></h4>
                          
                      </div>
                    </div>
                  </div>
                  <p class="mt-5">{{$item->en_description}}</p>
                  
                </div>
              </article>
            </div>
              @endforeach 
            </div>
          </div>
        </div>
    </section>
@else
<!-- Section: inner-header -->
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/uploads/general/book.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36"> {{$course->ar_title}} {{trans('app.Topics')}}</h2>
              <ol class="breadcrumb pull-right mt-10 white">
                <li><a href="{{url('/')}}">{{trans('app.Home')}}</a></li>
                <li><a href="{{url('/student/account')}}">{{trans('app.Your Courses')}}</a></li>
                <li><a>{{$course->ar_title}}</a></li>
                <li class="active">{{trans('app.Topics')}}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Events Grid -->
    <section>
      <div class="container pt-70 pb-40">
        <div class="section-content">
          <div class="row multi-row-clearfix">

            @foreach($course->topics as $item)
            <div class="col-sm-6 col-md-4">
              <article class="post clearfix mb-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                  <div class="box-hover-effect about-video">
                            <div class="effect-wrapper">
                                <div class="thumb">
                                    <img class="img-responsive img-fullwidth" src="/user/images/ytbtn.jpg" alt="">
                                </div>
                                <div class="video-button"></div>
                                <a class="hover-link" data-lightbox-gallery="youtube-video" href="{{asset($item->video)}}" title="Youtube Video">Youtube Video</a>
                            </div>
                        </div>
                </div> 
                  </div>                    
                  
                <div class="entry-content p-15">
                  <div class="entry-meta media no-bg no-border mt-0 mb-10">
                    <div class="media-body pl-0">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a >{{$item->ar_title}}</a></h4>
                          
                      </div>
                    </div>
                  </div>
                  <p class="mt-5">{{$item->ar_description}}</p>
                  
                </div>
              </article>
            </div>
              @endforeach 
            </div>
          </div>
        </div>
    </section>
@endif
@endsection

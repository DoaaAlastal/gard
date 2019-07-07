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
                        <h2 class="text-theme-colored2 font-36">Course List</h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">All Courses</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Course list -->
    <section>
        <div class="container">
            <div class="section-content">
                <div class="row multi-row-clearfix">
                    @foreach($courses as $course)
                        <div class="col-sm-6 col-md-4">
                        <article class="post clearfix mb-30">
                            <div class="entry-header">
                                <div class="post-thumb thumb course-thumb">
                                    <img src="{{asset($course->thumb_image)}}" alt="" class="img-responsive img-fullwidth">
                                </div>
                                <div class="price-tag"> {{$course->currency->sign}}{{$course->price}}  </div>
                            </div>
                            <div class="entry-content p-15">
                                <div class="entry-meta media no-bg no-border mt-0 mb-10">
                                    <div class="media-body pl-0">
                                        <div class="event-content pull-left flip">
                                            <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="{{url('course-details/'.$course->id)}}">{{$course->en_title}}</a></h4>
                                            <ul class="list-inline">
                                                <li><i class="fa fa-user-o mr-5 text-theme-colored2"></i>By {{$course->model->en_name}}</li>
                                                <li><i class="fa fa-comment mr-5 text-theme-colored2"></i>{{$course->totalCommentsCount()}} comments</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-5">{{str_limit($course->en_description,150)}}</p>
                                <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="{{url('course-details/'.$course->id)}}"> View Details</a>
                                @if(Auth::guard('user')->check() && \App\User::hasCourse($course->id))
                                    <a class="btn btn-info btn-flat font-12 mt-10 ml-5" disabled=""> Enrolled</a>
                                @else
                                    <a class="btn btn-info btn-flat font-12 mt-10 ml-5" href="{{url('course-enroll/'.$course->id)}}"> Enroll Now</a>
                                @endif
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-9 col-sm-3">
                    {{--<nav>--}}
                        {{--<ul class="pagination theme-colored xs-pull-center m-0">--}}
                            {{--<li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>--}}
                            {{--<li class="active"><a href="#">1</a></li>--}}
                            {{--<li><a href="#">2</a></li>--}}
                            {{--<li><a href="#">3</a></li>--}}
                            {{--<li><a href="#">4</a></li>--}}
                            {{--<li><a href="#">5</a></li>--}}
                            {{--<li><a href="#">...</a></li>--}}
                            {{--<li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>--}}
                        {{--</ul>--}}
                    {{--</nav>--}}
                    {{$courses->links()}}
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

    <!-- Section: Course list -->
    <section>
        <div class="container">
            <div class="section-content">
                <div class="row multi-row-clearfix">
                    @foreach($courses as $course)
                        <div class="col-sm-6 col-md-4">
                        <article class="post clearfix mb-30">
                            <div class="entry-header">
                                <div class="post-thumb thumb course-thumb">
                                    <img src="{{asset($course->thumb_image)}}" alt="" class="img-responsive img-fullwidth">
                                </div>
                                <div class="price-tag"> {{$course->currency->sign}}{{$course->price}}  </div>
                            </div>
                            <div class="entry-content p-15">
                                <div class="entry-meta media no-bg no-border mt-0 mb-10">
                                    <div class="media-body pl-0">
                                        <div class="event-content pull-left flip">
                                            <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="{{url('course-details/'.$course->id)}}">{{$course->ar_title}}</a></h4>
                                            <ul class="list-inline">
                                                <li><i class="fa fa-user-o ml-5 text-theme-colored2"></i>{{trans('app.By')}} :{{$course->model->ar_name}}</li>
                                                <li><i class="fa fa-comment ml-5 text-theme-colored2"></i>{{$course->totalCommentsCount()}} {{trans('index.comments')}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-5">{{str_limit($course->ar_description,150)}}</p>
                                <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="{{url('course-details/'.$course->id)}}"> {{trans('index.View Details')}}</a>
                                 @if(Auth::guard('user')->check() && \App\User::hasCourse($course->id))
                                    <a class="btn btn-info btn-flat font-12 mt-10 ml-5" disabled=""> Enrolled</a>
                                @else
                                    <a class="btn btn-info btn-flat font-12 mt-10 ml-5" href="{{url('course-enroll/'.$course->id)}}"> Enroll Now</a>
                                @endif
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-9 col-sm-3">
                    {{--<nav>--}}
                        {{--<ul class="pagination theme-colored xs-pull-center m-0">--}}
                            {{--<li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>--}}
                            {{--<li class="active"><a href="#">1</a></li>--}}
                            {{--<li><a href="#">2</a></li>--}}
                            {{--<li><a href="#">3</a></li>--}}
                            {{--<li><a href="#">4</a></li>--}}
                            {{--<li><a href="#">5</a></li>--}}
                            {{--<li><a href="#">...</a></li>--}}
                            {{--<li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>--}}
                        {{--</ul>--}}
                    {{--</nav>--}}
                    {{$courses->links()}}
                </div>
            </div>
        </div>
    </section>
@endif
@endsection

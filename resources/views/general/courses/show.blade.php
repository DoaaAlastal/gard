@extends('layouts.app')
@section('content')
{{--$course--}}
@if(App::getlocale()=='en')
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/{{App\Setting::getValue('coursebg')->value}}">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-theme-colored2 font-36">Course Details</h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/courses')}}">Courses</a></li>
                            <li class="active">{{$course->en_title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Services Details -->
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row">
                <div class="col-md-8">
                    <div class="single-service cordetails">
                        <ul class="list-inline  mb-15">
                            <li>
                                <i class="pe-7s-user text-theme-colored2 font-48"></i>
                                <div class="pull-right ml-5">
                                    <span>{{trans('app.Teacher')}}</span>
                                    <h5 class="mt-0">{{$course->model->en_name}}</h5>
                                </div>
                            </li>
                            <li>
                                <i class="pe-7s-ribbon text-theme-colored2 font-48"></i>
                                <div class="pull-right ml-5">
                                    <span>{{trans('app.Category')}}</span>
                                    <h5 class="mt-0">{{$course->category->en_name}}</h5>
                                </div>
                            </li>
                            <li>
                                <i class="pe-7s-cash text-theme-colored2 font-48"></i>
                                <div class="pull-right ml-10">
                                    <span>Course Price</span>
                                    <h5 class="mt-0">{{$course->currency->sign}}{{$course->price}}</h5>
                                </div>
                            </li>
                            <li class="pull-right">
                                <div>
                                    @if(Auth::guard('user')->check() && \App\User::hasCourse($course->id))
                                        <a class="btn btn-info btn-flat font-12 mt-10 ml-5" disabled=""> Enrolled</a>
                                    @else
                                        <a class="btn btn-info btn-flat font-12 mt-10 ml-5" href="{{url('course-enroll/'.$course->id)}}"> Enroll Now</a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                        <img src="{{asset($course->big_image)}}" alt="">
                        <h3 class="text-uppercase mt-30 mb-10">{{$course->en_title}}</h3>

                        <div class="double-line-bottom-theme-colored-2 mt-10"></div>
                        <ul id="myTab" class="nav nav-tabs mt-30">
                            <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>
                            <li><a href="#tab2" data-toggle="tab">Course Info</a></li>
                            <li><a href="#tab3" data-toggle="tab">Teacher</a></li>
                            <li><a href="#tab4" data-toggle="tab">Reviews</a></li>
                            <li><a href="#tab5" data-toggle="tab">Comments</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="tab1">
                                <h4 class="line-bottom-theme-colored-2 mb-15">Course Details</h4>
                                <p>{{$course->en_description}}</p>
                                <h4 class="line-bottom-theme-colored-2 mt-20 mb-10">Topics</h4>
                                <ul class="list theme-colored2 angle-double-right">
                                    @if(count($course->topics)>0)
                                        @foreach($course->topics as $topic)
                                            <li>{{$topic->en_title}}</li>
                                        @endforeach
                                    @else
                                        <span class="text-danger">No Topics</span>
                                    @endif

                                </ul>
                                <h4 class="line-bottom-theme-colored-2 mt-20 mb-10">{{trans('app.Course Attachments')}}</h4>
                                <ul class="list theme-colored2 paper">
                                    @if(count($course->attachments)>0)
                                        @foreach($course->attachments as $file)
                                            <li><a title="Download "
                                                   class="fa fa-download"
                                                   target="_self"
                                                   href="{{asset($file->attachment_path)}}"
                                                   download="{{$file->attachment_name}}">{{$file->attachment_name}}</a></li>
                                        @endforeach
                                    @else
                                        <span class="text-danger">{{trans('app.No Files')}}</span>
                                    @endif
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <h4 class="line-bottom-theme-colored-2 mb-15">{{trans('app.Course Info')}}</h4>
                                <ul class="course-info-list font-14 mt-20">
                                    <li>
                      <span class="course-info-title">
                      <i class="pe-7s-date font-26 vertical-align-middle text-theme-colored2 mr-10"></i>Luanch at:</span>
                                        <span class="course-info-details">{{$course->created_at->format('Y,M,d')}}</span>
                                    </li>
                                    <li>
                      <span class="course-info-title">
                      <i class="pe-7s-timer font-26 vertical-align-middle text-theme-colored2 mr-10"></i>Course Duration:</span>
                                        <span class="course-info-details">{{$course->number_of_hours}} Hours</span>
                                    </li>

                                    <li>
                      <span class="course-info-title">
                      <i class="pe-7s-umbrella font-26 vertical-align-middle text-theme-colored2 mr-10"></i>Student Capacity:</span>
                                        <span class="course-info-details">Unlimited</span>
                                    </li>
                                    <li>
                      <span class="course-info-title">
                      <i class="pe-7s-note2 font-26 vertical-align-middle text-theme-colored2 mr-10"></i>Class Schedule:</span>
                                        <span class="course-info-details">24/7 Online</span>
                                    </li>
                                    <li>
                      <span class="course-info-title">
                      <i class="pe-7s-users font-26 vertical-align-middle text-theme-colored2 mr-10"></i>Course Teacher:</span>
                                        <span class="course-info-details">{{$course->model->en_name}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="tab3">
                                <h4 class="line-bottom-theme-colored-2 mb-20">Course Teacher</h4>
                                <div class="row">
                                    <div class="col-md-9">
                                        <img src="{{asset($course->model->image)}}" alt="" class="img-fullwidth">
                                        <h5 class="mb-0">{{$course->model->en_name}}</h5>
                                        <b>{{$course->model->en_job_title}}</b>
                                        <p>{{$course->model->en_bio}}</p>
                                        @if(Auth::guard('user')->check() && \App\User::hasCourse($course->id))
                                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#sendSMS">
                                                    <span>
													<i class="fa fa-envelope"></i>
													<span>
														Send Message
													</span>
												</span>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#sendEmail">
                                                    <span>
													<i class="fa fa-envelope"></i>
													<span>
														Send Email
													</span>
												</span>
                                            </a>
                                        @endif

                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab4">
                                <h4 class="line-bottom-theme-colored-2 mb-20">Course Reviews</h4>
                                <div>
                                    Review Course :  &nbsp;&nbsp;
                                    @if(Auth::guard('user')->check() )
                                        @if(\App\User::hasCourse($course->id) )
                                            @if(\App\User::reviewCourse($course->id) == 0)
                                                <form method="post" action="{{url('course/review')}}">
                                                    @csrf
                                                    <input type="hidden" name="course" value="{{$course->id}}">
                                                    <label class="radio-inline"> <input type="radio" name="rate" value="5" onclick="this.form.submit()"> 5 stars </label>
                                                    <label class="radio-inline"> <input type="radio" name="rate" value="4" onclick="this.form.submit()"> 4 stars </label>
                                                    <label class="radio-inline"> <input type="radio" name="rate" value="3" onclick="this.form.submit()"> 3 stars </label>
                                                    <label class="radio-inline"> <input type="radio" name="rate" value="2" onclick="this.form.submit()"> 2 stars </label>
                                                    <label class="radio-inline"> <input type="radio" name="rate" value="1" onclick="this.form.submit()"> 1 star </label>
                                                </form>
                                            @else
                                                <span class="text-info"> <b>* Your already review this course!</b></span>
                                            @endif
                                        @else
                                            <span class="text-danger"><b>* Your not registered on this course!</b></span>
                                        @endif
                                    @endif

                                </div>
                                <hr>
                                <div class="course-reviews">
                                    <h4 class="mb-0">Average Rating:<span class="text-theme-colored2 vertical-align-middle font-30 ml-20">{{$course->reviews}}</span></h4>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="star-rating filled mt-5 mb-5 ml-0">
                                                <span data-width="{{$course->reviews*20}}%"></span>
                                            </div>
                                            <div class="course-progress-area">
                                                <div class="progress-item style3">
                                                    <div class="progress-title">
                                                        <h5>5 Stars<span class="pull-right">{{$course->stars(5)}}</span></h5>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-percent="100"></div>
                                                    </div>

                                                </div>
                                                <div class="progress-item style3">
                                                    <div class="progress-title">
                                                        <h5>4 Stars<span class="pull-right">{{$course->stars(4)}}</span></h5>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-percent="75"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-item style3">
                                                    <div class="progress-title">
                                                        <h5>3 Stars<span class="pull-right">{{$course->stars(3)}}</span></h5>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-percent="60"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-item style3">
                                                    <div class="progress-title">
                                                        <h5>2 Stars<span class="pull-right">{{$course->stars(2)}}</span></h5>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-percent="35"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-item style3">
                                                    <div class="progress-title">
                                                        <h5>1 Star<span class="pull-right">{{$course->stars(1)}}</span></h5>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-percent="15"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab5">
                                <h4 class="line-bottom-theme-colored-2 mb-0">Comments</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="blog-posts single-post">
                                            <div class="comments-area">
                                                <ul class="comment-list">
                                                    @foreach($course->comments as $comment)
                                                        <li>
                                                            <div class="media comment-author"> <a class="media-left user-img-thumb" href="#"><img class="media-object img-thumbnail " src="{{asset($comment->commented->image)}}" alt=""></a>
                                                                <div class="media-body">
                                                                    <h5 class="media-heading comment-heading">{{$comment->commented->en_name}}:</h5>
                                                                    <div class="comment-date">{{$comment->created_at->format('Y-M-d')}}</div>
                                                                    <p>{{$comment->comment}}</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="comment-box">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h5>Leave a Comment</h5>
                                                        <div class="row">
                                                            @if(Auth::guard('admin')->check() || Auth::guard('instructor')->check()||Auth::guard('user')->check())
                                                            <form role="form" id="comment-form" method="post" action="{{url('course-comment/'.$course->id)}}">
                                                                @csrf
                                                                <div class="col-sm-12 pt-0 pb-0">

                                                                    <div class="form-group">
                                                                        <textarea class="form-control" required name="comment" id="comment"  placeholder="Enter Your Comment" rows="7"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="Please wait...">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            @else
                                                                <span class="text-danger" style="padding-left: 10px;"> * You must logged in to make comment</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="sidebar sidebar-left mt-sm-30 ml-30 ml-sm-0">
                        <div class="widget fcor border-1px bg-silver-deep p-15">
                            <h4 class="widget-title line-bottom-theme-colored-2">Featured Courses</h4>
                            <div class="product-list">
                                @foreach($latest as $item)
                                <div class="media">
                                    <a class="media-left pull-left flip" href="{{url('course-details/'.$item->id)}}">
                                        <img class="media-object thumb" width="80" src="{{asset($item->thumb_image)}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h5 class="media-heading product-title mb-0"><a href="{{url('course-details/'.$item->id)}}">{{$item->en_title}}</a></h5>
                                        <div class="star-rating mt-5 mb-5 ml-0" title="Rated 4.50 out of 5">
                                            <span data-width="{{$item->reviews*20}}%">{{$item->reviews}}</span>
                                        </div>
                                        <span class="price">${{$item->price}}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
<!-- Arabic Course Details -->
  <!-- Section: inner-header -->
  <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/{{App\Setting::getValue('coursebg')->value}}">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-theme-colored2 font-36">{{trans('app.Course Details')}}</h2>
                        <ol class="breadcrumb pull-right mt-10 white">
                            <li><a href="{{url('/')}}">{{trans('app.Home')}}</a></li>
                            <li><a href="{{url('/courses')}}">{{trans('app.Courses')}}</a></li>
                            <li class="active">{{$course->ar_title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Services Details -->
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row">
                <div class="col-md-8">
                    <div class="single-service cordetails">
                        <ul class="list-inline  mb-15">
                            <li>
                                <i class="pe-7s-user text-theme-colored2 font-48"></i>
                                <div class="pull-left ml-5">
                                    <span>{{trans('app.Teacher')}}</span>
                                    <h5 class="mt-0">{{$course->model->ar_name}}</h5>
                                </div>
                            </li>
                            <li>
                                <i class="pe-7s-ribbon text-theme-colored2 font-48"></i>
                                <div class="pull-left ml-5">
                                    <span>{{trans('app.Category')}}</span>
                                    <h5 class="mt-0">{{$course->category->ar_name}}</h5>
                                </div>
                            </li>
                            <li>
                                <i class="pe-7s-cash text-theme-colored2 font-48"></i>
                                <div class="pull-left mr-10 ">
                                    <span>{{trans('app.Course Price')}}</span>
                                    <h5 class="mt-0">${{$course->price}}</h5>
                                </div>
                            </li>
                            <li class="pull-left">
                                <div>
                                    @if(Auth::guard('user')->check() && \App\User::hasCourse($course->id))
                                        <a class="btn btn-info btn-flat font-12 mt-10 ml-5" disabled=""> ملتحق </a>
                                    @else
                                        <a class="btn btn-info btn-flat font-12 mt-10 ml-5" href="{{url('course-enroll/'.$course->id)}}"> التحق الآن</a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                        <img src="{{asset($course->big_image)}}" alt="">
                        <h3 class="text-uppercase mt-30 mb-10">{{$course->ar_title}}</h3>
                        <div class="double-line-bottom-theme-colored-2 mt-10"></div>
                        <ul id="myTab" class="nav nav-tabs mt-30">
                            <li class="active"><a href="#tab1" data-toggle="tab">{{trans('app.Description')}}</a></li>
                            <li><a href="#tab2" data-toggle="tab">{{trans('app.Course Info')}}</a></li>
                            <li><a href="#tab3" data-toggle="tab">{{trans('app.Teachers')}}</a></li>
                            <li><a href="#tab4" data-toggle="tab">{{trans('app.Reviews')}}</a></li>
                            <li><a href="#tab5" data-toggle="tab">{{trans('index.comments')}}</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="tab1">
                                <h4 class="line-bottom-theme-colored-2 mb-15">{{trans('app.Course Details')}}</h4>
                                <p>{{$course->ar_description}}</p>
                                <h4 class="line-bottom-theme-colored-2 mt-20 mb-10">{{trans('app.Topics')}}</h4>
                                <ul class="list theme-colored2 angle-double-right">
                                    @if(count($course->topics)>0)
                                        @foreach($course->topics as $topic)
                                            <li>{{$topic->ar_title}}</li>
                                        @endforeach
                                    @else
                                        <span class="text-danger">{{trans('app.No Topics')}}</span>
                                    @endif

                                </ul>
                                <h4 class="line-bottom-theme-colored-2 mt-20 mb-10">{{trans('app.Course Attachments')}}</h4>
                                <ul class="list theme-colored2 paper">
                                    @if(count($course->attachments)>0)
                                        @foreach($course->attachments as $file)
                                            <li><a title="Download "
                                                   class="fa fa-download"
                                                   target="_self"
                                                   href="{{asset($file->attachment_path)}}"
                                                   download="{{$file->attachment_name}}">{{$file->attachment_name}}</a></li>
                                        @endforeach
                                    @else
                                        <span class="text-danger">{{trans('app.No Files')}}</span>
                                    @endif
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <h4 class="line-bottom-theme-colored-2 mb-15">{{trans('app.Course Info')}}</h4>
                                <ul class="course-info-list font-14 mt-20">
                                    <li>
                      <span class="course-info-title">
                      <i class="pe-7s-date font-26 vertical-align-middle text-theme-colored2 ml-10"></i>{{trans('app.Luanch at')}}:</span>
                                        <span class="course-info-details">{{$course->created_at->format('Y,M,d')}}</span>
                                    </li>
                                    <li>
                      <span class="course-info-title">
                      <i class="pe-7s-timer font-26 vertical-align-middle text-theme-colored2 ml-10"></i>{{trans('app.Course Duration')}}:</span>
                                        <span class="course-info-details">{{$course->number_of_hours}} {{trans('index.hours')}}</span>
                                    </li>

                                    <li>
                      <span class="course-info-title">
                      <i class="pe-7s-umbrella font-26 vertical-align-middle text-theme-colored2 ml-10"></i>{{trans('app.Student Capacity')}}:</span>
                                        <span class="course-info-details">{{trans('app.Unlimited')}}</span>
                                    </li>
                                    <li>
                      <span class="course-info-title">
                      <i class="pe-7s-note2 font-26 vertical-align-middle text-theme-colored2 ml-10"></i>{{trans('app.Class Schedule')}}:</span>
                                        <span class="course-info-details">24/7 {{trans('app.Online')}}</span>
                                    </li>
                                    <li>
                      <span class="course-info-title">
                      <i class="pe-7s-users font-26 vertical-align-middle text-theme-colored2 ml-10"></i>{{trans('app.Course Teacher')}}:</span>
                                        <span class="course-info-details">{{$course->model->ar_name}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="tab3">
                                <h4 class="line-bottom-theme-colored-2 mb-20">{{trans('app.Course Teacher')}}</h4>
                                <div class="row">
                                    <div class="col-md-9">
                                        <img src="{{asset($course->model->image)}}" alt="" class="img-fullwidth">
                                        <h5 class="mb-0">{{$course->model->ar_name}}</h5>
                                        <b>{{$course->model->ar_job_title}}</b>
                                        <p>{{$course->model->ar_bio}}</p>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab4">
                                <h4 class="line-bottom-theme-colored-2 mb-20">{{trans('app.Course Reviews')}}</h4>
                                <div class="course-reviews">
                                    <h4 class="mb-0">{{trans('app.Average Rating')}} :<span class="text-theme-colored2 vertical-align-middle font-30 mr-20">4.6</span></h4>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="star-rating filled mt-5 mb-5 ml-0">
                                                <span data-width="{{$course->reviews*20}}%"></span>
                                            </div>
                                            <div class="course-progress-area">
                                                <div class="progress-item style3">
                                                    <div class="progress-title">
                                                        <h5>5 {{trans('app.Stars')}}<span class="pull-right">{{$course->stars(5)}}</span></h5>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-percent="100"></div>
                                                    </div>

                                                </div>
                                                <div class="progress-item style3">
                                                    <div class="progress-title">
                                                        <h5>4 {{trans('app.Stars')}}<span class="pull-right">{{$course->stars(4)}}</span></h5>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-percent="75"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-item style3">
                                                    <div class="progress-title">
                                                        <h5>3 {{trans('app.Stars')}}<span class="pull-right">{{$course->stars(3)}}</span></h5>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-percent="60"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-item style3">
                                                    <div class="progress-title">
                                                        <h5>2 {{trans('app.Stars')}}<span class="pull-right">{{$course->stars(2)}}</span></h5>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-percent="35"></div>
                                                    </div>
                                                </div>
                                                <div class="progress-item style3">
                                                    <div class="progress-title">
                                                        <h5>1 {{trans('app.Stars')}}<span class="pull-right">{{$course->stars(1)}}</span></h5>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-percent="15"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab5">
                                <h4 class="line-bottom-theme-colored-2 mb-0">{{trans('index.comments')}}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="blog-posts single-post">
                                            <div class="comments-area">
                                                <ul class="comment-list">
                                                    @foreach($course->comments as $comment)
                                                        <li>
                                                            <div class="media comment-author"> <a class="media-left user-img-thumb" href="#"><img class="media-object img-thumbnail " src="{{asset($comment->commented->image)}}" alt=""></a>
                                                                <div class="media-body">
                                                                    <h5 class="media-heading comment-heading">{{$comment->commented->ar_name}}:</h5>
                                                                    <div class="comment-date">{{$comment->created_at->format('Y-M-d')}}</div>
                                                                    <p>{{$comment->comment}}</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="comment-box">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h5>{{trans('app.Leave a Comment')}}</h5>
                                                        <div class="row">
                                                            @if(Auth::guard('admin')->check() || Auth::guard('instructor')->check()||Auth::guard('user')->check())
                                                            <form role="form" id="comment-form" method="post" action="{{url('course-comment/'.$course->id)}}">
                                                                @csrf
                                                                <div class="col-sm-12 pt-0 pb-0">

                                                                    <div class="form-group">
                                                                        <textarea class="form-control" required name="comment" id="comment"  placeholder="أضف تعليقك..." rows="7"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="انتظر...">{{trans('app.Submit')}}</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            @else
                                                                <span class="text-danger" style="padding-left: 10px;"> *{{trans('app.cmsg')}} </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="sidebar sidebar-right mt-sm-30 ml-30 ml-sm-0">
                        <div class="widget fcor border-1px bg-silver-deep p-15">
                            <h4 class="widget-title line-bottom-theme-colored-2">{{trans('app.Featured Courses')}}</h4>
                            <div class="product-list">
                                @foreach($latest as $item)
                                <div class="media ">
                                    <a class="media-left pull-left flip" href="{{url('course-details/'.$item->id)}}">
                                        <img class="media-object thumb" width="80" src="{{asset($item->thumb_image)}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h5 class="media-heading product-title mb-0"><a href="{{url('course-details/'.$item->id)}}">{{$item->ar_title}}</a></h5>
                                        <div class="star-rating mt-5 mb-5 mr-0 " title="Rated 4.50 out of 5">
                                            <span  data-width="90%">4.50</span>
                                        </div>
                                        <span class="price">${{$item->price}}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

<!-- Send SMS modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="sendSMS">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Send Message For Course Trainer</h4>
            </div>
            <div class="modal-body">
                <div class="bg-lightest border-1px p-30 mb-0">
                    <form name="login-form" class="clearfix" role="form" method="POST" action="{{ url('/student/message/new-message') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="sender_type" value="App\User">
                        <input type="hidden" name="sender_id" value="{{Auth::guard('user')->user()->id}}">
                        <input type="hidden" name="receiver_type" value="{{get_class($course->model)}}">
                        <input type="hidden" name="receiver_id" value="{{$course->model->id}}">
                        <div class="row">
                            <div class="form-group col-md-12 {{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content"> SMS Content</label>
                                <textarea class="form-control m-input" rows="10" id="content" name="content"  value="">{{old('content')}}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block col-md-12">
                             <strong class="error-sms">{{ $errors->first('content') }}</strong>
                           </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark btn-lg mt-15" type="submit">Send </button>
                        </div>
                    </form>
                </div>
                <div>
                </div>
            </div>
        </div>
    </div>
    <!--  End Send Ticket modal -->

</div>
<!-- end main-content -->

<!-- Send Email modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="sendEmail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Send Email For Course Trainer</h4>
            </div>
            <div class="modal-body">
                <div class="bg-lightest border-1px p-30 mb-0">
                    <form name="login-form" class="clearfix" role="form" method="POST" action="{{ url('/student/message/new-email') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="sender_type" value="App\User">
                        <input type="hidden" name="sender_id" value="{{Auth::guard('user')->user()->id}}">
                        <input type="hidden" name="email" value="{{$course->model->email}}">
                        <div class="row">
                            <div class="form-group col-md-12 {{ $errors->has('emailMSG') ? ' has-error' : '' }}">
                                <label for="content"> Email</label>
                                <textarea class="form-control m-input" rows="10" id="emailMSG" name="emailMSG"  value="">{{old('emailMSG')}}</textarea>
                                @if ($errors->has('emailMSG'))
                                    <span class="help-block col-md-12">
                             <strong class="error-sms">{{ $errors->first('emailMSG') }}</strong>
                           </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark btn-lg mt-15" type="submit">Send </button>
                        </div>
                    </form>
                </div>
                <div>
                </div>
            </div>
        </div>
    </div>
    <!--  End Send Ticket modal -->

</div>
<!-- end main-content -->

@endsection

@extends('layouts.app')
@section('content')
@if(App::getlocale()=='en')
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="{{asset($event->thumb_image)}}">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h3 class="font-28" >{{$event->en_title}} Details </h3>
              <ol class="breadcrumb text-left mt-10 white">
                  <ol class="breadcrumb text-left mt-10 white">
                      <li><a href="{{url('/')}}">Home</a></li>
                      <li><a href="#">Events</a></li>
                      <li class="active">{{$event->en_title}}</li>
                  </ol>
              </ol>
            </div>
          </div>
        </div>
      </div>      
    </section>

    <section class="bg-theme-colored">
      <div class="container pt-40 pb-40">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 id="basic-coupon-clock" class="text-white"></h2>
            <!-- Final Countdown Timer Script -->
            <script type="text/javascript">
              $(document).ready(function() {
                $('#basic-coupon-clock').countdown( {{ strtotime($event->start_at)}}, function(event) {
                  $(this).html(event.strftime('%D days %H:%M:%S'));
                });
              });
            </script>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <ul>
            <li>
                
                <p>@if($event->IsOnline==1)
                  <i class="fa fa-circle text-success"></i> Online
                  @else
                  <i class="fa fa-circle text-error"></i> Offline
                  @endif
            </p>
              </li>

              <li>
                <h5>Title:</h5>
                <p>{{$event->en_title}} {{$event->IsOnline?'Online':'Offline'}}</p>
              </li>
              
              <li>
                <h5>Location:</h5>
                <p>{{$event->en_location}}</p>
              </li>
              <li>
                <h5>Start Date:</h5>
                <p> {{date('M d,Y', strtotime($event->start_at))}}</p>
              </li>
              <li>
                <h5>End Date:</h5>
                <p>{{date('M d,Y', strtotime($event->end_at))}}</p>
              </li>
              
            </ul>
          </div>
          <div class="col-md-8">
            <img src="{{asset($event->big_image)}}" alt="">
          </div>
        </div>
        <div class="row mt-60">
          <div class="col-md-6">
            <h4 class="mt-0">Event Description</h4>
            <p>{{$event->en_description}}.</p>
          </div>
        </div>
          <hr/>
          <div class="row" >
              <div class="col-md-12 pull-right flip sm-pull-none">
                  <div class="blog-posts single-post">
                      <div class="comments-area">
                          <h5 class="comments-title"> <i class="fa fa-comment text-theme-colored"></i> <span>Comments:</span> </h5>
                          <ul class="comment-list">
                              @foreach($event->comments as $comment)
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
                                          <form role="form" id="comment-form" method="post" action="{{url('event-comment/'.$event->id)}}">
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
    </section>
    <!-- Arabic Event Details -->
@else
<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="{{asset($event->thumb_image)}}">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h3 class="font-28" >{{$event->ar_title}} {{trans('app.Details')}} </h3>
              <ol class="breadcrumb pull-right mt-10 white">
                  <ol class="breadcrumb pull-right mt-10 white">
                      <li><a href="{{url('/')}}">{{trans('app.Home')}}</a></li>
                      <li><a href="#">{{trans('app.events')}}</a></li>
                      <li class="active">{{$event->ar_title}}</li>
                  </ol>
              </ol>
            </div>
          </div>
        </div>
      </div>      
    </section>

    <section class="bg-theme-colored">
      <div class="container pt-40 pb-40">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 id="basic-coupon-clock" class="text-white"></h2>
            <!-- Final Countdown Timer Script -->
            <script type="text/javascript">
              $(document).ready(function() {
                $('#basic-coupon-clock').countdown( {{ strtotime($event->start_at)}}, function(event) {
                  $(this).html(event.strftime('%D days %H:%M:%S'));
                });
              });
            </script>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <ul>
            <li>
                
                <p>@if($event->IsOnline==1)
                  <i class="fa fa-circle text-success"></i> مفتوح
                  @else
                  <i class="fa fa-circle text-error"></i> مغلق
                  @endif
            </p>
              </li>

              <li>
                <h5>{{trans('app.Title')}}:</h5>
                <p>{{$event->ar_title}} /{{$event->IsOnline?'مفتوح':'مغلق'}}</p>
              </li>
              
              <li>
              <h5>{{trans('app.Location')}}:</h5>
                <p>{{$event->ar_location}}</p>
              </li>
              <li>
                <h5>{{trans('app.Start Date')}}:</h5>
                <p> {{date('M d,Y', strtotime($event->start_at))}}</p>
              </li>
              <li>
                <h5>{{trans('app.End Date')}}:</h5>
                <p>{{date('M d,Y', strtotime($event->end_at))}}</p>
              </li>
              
            </ul>
          </div>
          <div class="col-md-8">
            <img src="{{asset($event->big_image)}}" alt="">
          </div>
        </div>
        <div class="row mt-60">
          <div class="col-md-6">
            <h4 class="mt-0">{{trans('app.Event Description')}}</h4>
            <p>{{$event->ar_description}}.</p>
          </div>
        </div>
          <hr/>
          <div class="row" >
              <div class="col-md-12 pull-right flip sm-pull-none">
                  <div class="blog-posts single-post">
                      <div class="comments-area">
                          <h5 class="comments-title"> <i class="fa fa-comment text-theme-colored"></i> <span>{{trans('index.comments')}}:</span> </h5>
                          <ul class="comment-list">
                              @foreach($event->comments as $comment)
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
                                          <form role="form" id="comment-form" method="post" action="{{url('event-comment/'.$event->id)}}">
                                              @csrf
                                              <div class="col-sm-12 pt-0 pb-0">

                                                  <div class="form-group">
                                                      <textarea class="form-control" required name="comment" id="comment"  placeholder="أضف تعليقك هنا" rows="7"></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                      <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="انتظر...">{{trans('app.Submit')}}</button>
                                                  </div>
                                              </div>
                                          </form>
                                      @else
                                          <span class="text-danger" style="padding-left: 10px;"> * {{trans('app.cmsg')}}</span>
                                      @endif
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
@endif

@endsection

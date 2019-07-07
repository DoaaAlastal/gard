@extends('layouts.app')
@section('content')
   @if(App::getlocale()=='en') 
    <!-- Start main-content -->
    <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="uploads/general/book.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">{{$ticket->subject}}</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/student/account')}}">Tickets</a></li>
                <li><a>{{$ticket->subject}}</a></li>
                <li class="active">Ticket</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container pt-70 pb-40">
        <div class="section-content">
          <div class="row multi-row-clearfix">
            <div class="bg-lightest border-1px p-30 mb-0">
                <div class="comments-area">
                <h5 class="comments-title">{{$ticket->sender->en_name}}</h5>
                <ul class="comment-list">
                {{-- Show Main Message --}}
                @if($ticket->attachment)
                  <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img" src="{{asset($ticket->sender->image)}}" alt=""></a>
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">{{$ticket->sender->en_name}} says:</h5>
                        <div class="comment-date">{{$ticket->created_at->format('Y-m-d') }}</div>
                        <a class="media-right" class="hover-link" data-lightbox-gallery="youtube-video"
                          href="{{asset($ticket->attachment)}}" title="{{$ticket->subject}}">
                            <img class="media-object img-thumbnail" width="200" height="200" src="{{asset($ticket->attachment)}}" alt=""/>
                    </div>
                  </li>
                  @endif
                  <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img"  src="{{asset($ticket->sender->image)}}" alt=""></a>
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">{{$ticket->sender->en_name}} says:</h5>
                        <div class="comment-date">{{$ticket->created_at->format('Y-m-d') }}</div>
                        <p>{{$ticket->content}}</p>
                    </div>
                  </li>
                  {{-- End Main Message--}}
                  {{-- Show Replies--}}
                  @foreach($ticket->replies as $reply)
                  @if($reply->sender == Auth::guard('user')->user() )
                  <li>
                  <div class="media comment-author nested-comment"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img" src="{{asset($reply->sender->image)}}" alt=""></a>

                  <div class="media-body">
                        <h5 class="media-heading comment-heading">{{$reply->sender->en_name}} says:</h5>
                        <div class="comment-date">{{$reply->created_at->format('Y-m-d') }}</div>
                        <p>{{$reply->content}}</p>
                    </div>
                  </div>
                  </li>
                  @else
                  <li>
                  <div class="media comment-author nested-comment"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img" src="{{asset($reply->sender->image)}}" alt=""></a>

                  <div class="media-body">
                        <h5 class="media-heading comment-heading">{{$reply->sender->en_name}} says:</h5>
                        <div class="comment-date">{{$reply->created_at->format('Y-m-d') }}</div>
                        <p>{{$reply->content}}</p>
                    </div>
                  </li>
                  @endif
                  @endforeach
                  {{-- End  Replies--}}
                </ul>
              </div>
              <div class="comment-box">
                <div class="row">
                  <div class="col-sm-12">
                    <hr>
                    <div class="row">
                      <form role="form" id="comment-form" method="POST" action="{{url('student/support/send-reply')}}" name="reply">
                      @csrf
                          <input type="hidden" name="support_id" value="{{$ticket->id}}">
                          <input type="hidden" name="sender_type" value="App\User">
                          <input type="hidden" name="sender_id" value="{{Auth::guard('user')->user()->id}}">
                        <div class="col-sm-11">
                          <div class="form-group">
                            <input type="text" class="form-control" required name="content" id="content"  placeholder="Type here..." />
                            </div>
                        </div>
                        <div class="col-sm-1">
                          <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-circled pull-right mt-5 btn-lg " data-loading-text="Please wait..."><i class="fa fa-send"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div> 
             
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  <!-- Arabic Replay Page -->
  @else
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="uploads/general/book.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">{{$ticket->subject}}</h2>
              <ol class="breadcrumb pull-right mt-10 white">
                <li><a href="{{url('/')}}">{{trans('app.Home')}}</a></li>
                <li><a href="{{url('/student/account')}}">{{trans('profile.Tickets')}}</a></li>
                <li class="active"><a>{{$ticket->subject}}</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container pt-70 pb-40">
        <div class="section-content">
          <div class="row multi-row-clearfix">
            <div class="bg-lightest border-1px p-30 mb-0">
                <div class="comments-area">
                <h5 class="comments-title">{{$ticket->sender->ar_name}}</h5>
                <ul class="comment-list">
                {{-- Show Main Message --}}
                @if($ticket->attachment)
                  <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img" src="{{asset($ticket->sender->image)}}" alt=""></a>
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">{{$ticket->sender->ar_name}}:</h5>
                        <div class="comment-date">{{$ticket->created_at->format('Y-m-d') }}</div>
                        <a class="media-right" class="hover-link" data-lightbox-gallery="youtube-video"
                          href="{{asset($ticket->attachment)}}" title="{{$ticket->subject}}">
                            <img class="media-object img-thumbnail" width="200" height="200" src="{{asset($ticket->attachment)}}" alt=""/>
                    </div>
                  </li>
                  @endif
                  <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img"  src="{{asset($ticket->sender->image)}}" alt=""></a>
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">{{$ticket->sender->ar_name}} :</h5>
                        <div class="comment-date">{{$ticket->created_at->format('Y-m-d') }}</div>
                        <p>{{$ticket->content}}</p>
                    </div>
                  </li>
                  {{-- End Main Message--}}
                  {{-- Show Replies--}}
                  @foreach($ticket->replies as $reply)
                  @if($reply->sender == Auth::guard('user')->user() )
                  <li>
                  <div class="media comment-author nested-comment"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img" src="{{asset($reply->sender->image)}}" alt=""></a>

                  <div class="media-body">
                        <h5 class="media-heading comment-heading">{{$reply->sender->ar_name}} :</h5>
                        <div class="comment-date">{{$reply->created_at->format('Y-m-d') }}</div>
                        <p>{{$reply->content}}</p>
                    </div>
                  </li>
                  @else
                  <li>
                  <div class="media comment-author nested-comment"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img" src="{{asset($reply->sender->image)}}" alt=""></a>

                  <div class="media-body">
                        <h5 class="media-heading comment-heading">{{$reply->sender->ar_name}} :</h5>
                        <div class="comment-date">{{$reply->created_at->format('Y-m-d') }}</div>
                        <p>{{$reply->content}}</p>
                    </div>
                  </li>
                  @endif
                  @endforeach
                  {{-- End  Replies--}}
                </ul>
              </div>
              <div class="comment-box">
                <div class="row">
                  <div class="col-sm-12">
                    <hr>
                    <div class="row">
                      <form role="form" id="comment-form" method="POST" action="{{url('student/support/send-reply')}}" name="reply">
                      @csrf
                          <input type="hidden" name="support_id" value="{{$ticket->id}}">
                          <input type="hidden" name="sender_type" value="App\User">
                          <input type="hidden" name="sender_id" value="{{Auth::guard('user')->user()->id}}">
                        <div class="col-sm-11">
                          <div class="form-group">
                            <input type="text" class="form-control" required name="content" id="content"  placeholder="اكتب هنا..." />
                            </div>
                        </div>
                        <div class="col-sm-1">
                          <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-circled pull-right mt-5 btn-lg " data-loading-text="انتظر..."><i class="fa fa-send"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div> 
             
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  @endif

@endsection

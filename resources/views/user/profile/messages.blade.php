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
              <h2 class="text-theme-colored2 font-36">{{$user->en_name}} Messages</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/student/profile/messages')}}">Messages</a></li>
                <li class="active"> {{$user->en_name}}</li>
              </ol>
           </div>
          </div>
        </div>
      </div>
    </section>
      
    <!-- Section: Doctor Details -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-sx-12 col-sm-4 col-md-4">
              <div class="doctor-thumb">
                <img src="{{asset($user->image)}}" alt="" class="user-img">
              </div>
              <div class="info p-20 bg-black-333">
                <h4 class="text-uppercase text-white">{{$user->en_name}}</h4>
               
                <ul class="list angle-double-right m-0">
                  <li class="mt-0 text-gray-silver"><strong class="text-gray-lighter">Email</strong><br> {{$user->email}}</li>
                   <li class="mt-0 text-gray-silver"><strong class="text-gray-lighter">Mobile No. </strong><br> {{$user->mobile}}</li>
                  <li class="text-gray-silver"><strong class="text-gray-lighter">Address</strong><br> {{$user->en_address}}</li>
                </ul>
                <ul class="styled-icons icon-gray icon-circled icon-sm mt-15 mb-15">
                  <li><a href="{{$user->facebook}}"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="{{$user->twitter}}"><i class="fa fa-twitter"></i></a></li>
                </ul>
                <a class="btn btn-info btn-flat mt-10 mb-sm-30" href="{{url('student/account/show-personal-info')}}">Edit Profile</a>
                <a  class="btn btn-danger btn-flat mt-10 mb-sm-30" href="{{ url('/student/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/student/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
              </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8">
              <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active" ><a href="#inbox" aria-controls="inbox" role="tab" data-toggle="tab" class="font-15 text-uppercase"><span>Inbox</span> </a></li>
                <li role="presentation" ><a href="#send" aria-controls="bookmarks" role="tab" data-toggle="tab" class="font-15 text-uppercase">Sent <span class="badge"></span></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="Inbox">
                  <div class="comments-area">
                  <ul class="comment-list">
                  @foreach($inbox as $sms)
                  <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img"  src="{{asset($sms->sender->image)}}" alt=""></a>
                      <div class="media-body row">
                       <div class="col-xs-12 col-sm-8 col-md-9">
                       <h5 class="media-heading comment-heading">{{$sms->sender->en_name}}</h5>
                        <div class="comment-date">{{$sms->created_at->format('Y-m-d') }}</div>
                       </div>
                       <div class="col-xs-12 col-sm-8 col-md-3">
                       <a href='{{url("student/profile/messages/chat/$sms->id")}}'><button type="button" class="btn btn-primary btn-circled">
                        Open Chat
											</button></a>
                       </div>
                    </div>
                  </li>
                  <hr>
                  @endforeach
                  </ul>
                  </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="sent">
                  <div class="comments-area">
                  <ul class="comment-list">
                  @foreach($sent as $sms)
                  <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img"  src="{{asset($sms->receiver->image)}}" alt=""></a>
                      <div class="media-body row">
                       <div class="col-xs-12 col-sm-8 col-md-9">
                       <h5 class="media-heading comment-heading">{{$sms->receiver->en_name}}</h5>
                        <div class="comment-date">{{$sms->created_at->format('Y-m-d') }}</div>
                       </div>
                       <div class="col-xs-12 col-sm-8 col-md-3">
                       <a href='{{url("student/profile/messages/chat/$sms->id")}}'><button type="button" class="btn btn-primary btn-circled">
                        Open Chat
											</button></a>
                       </div>
                    </div>
                  </li>
                  <hr>
                  @endforeach
                  </ul>
                  </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Arabic Message -->
    @else
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/uploads/general/book.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">{{$user->ar_name}} {{trans('profile.Messages')}}</h2>
              <ol class="breadcrumb pull-right mt-10 white">
                <li><a href="{{url('/')}}">{{trans('app.Home')}}</a></li>
                <li><a href="{{url('/student/profile/messages')}}">{{trans('profile.Messages')}}</a></li>
                <li class="active"> {{$user->ar_name}}</li>
              </ol>
           </div>
          </div>
        </div>
      </div>
    </section>
      
    <!-- Section: Doctor Details -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-sx-12 col-sm-4 col-md-4">
              <div class="doctor-thumb">
                <img src="{{asset($user->image)}}" alt="" class="user-img">
              </div>
              <div class="info p-20 bg-black-333">
                <h4 class="text-uppercase text-white">{{$user->ar_name}}</h4>
                
                <ul class="list angle-double-right m-0">
                  <li class="mt-0 text-gray-silver"><strong class="text-gray-lighter">{{trans('profile.Email')}}</strong><br> {{$user->email}}</li>
                   <li class="mt-0 text-gray-silver"><strong class="text-gray-lighter">{{trans('profile.Mobile')}} </strong><br> {{$user->mobile}}</li>
                  <li class="text-gray-silver"><strong class="text-gray-lighter">{{trans('profle.Address')}}</strong><br> {{$user->ar_address}}</li>
                </ul>
                <ul class="styled-icons icon-gray icon-circled icon-sm mt-15 mb-15">
                  <li><a href="{{$user->facebook}}"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="{{$user->twitter}}"><i class="fa fa-twitter"></i></a></li>
                </ul>
                <a class="btn btn-info btn-flat mt-10 mb-sm-30" href="{{url('student/account/show-personal-info')}}">{{trans('profile.Edit Profile')}}</a>
                <a  class="btn btn-danger btn-flat mt-10 mb-sm-30" href="{{ url('/student/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{trans('app.Logout')}}
                                    </a>

                                    <form id="logout-form" action="{{ url('/student/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
              </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8">
              <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active" ><a href="#inbox" aria-controls="inbox" role="tab" data-toggle="tab" class="font-15 text-uppercase"><span>{{trans('profile.Inbox')}}</span> </a></li>
                <li role="presentation" ><a href="#send" aria-controls="bookmarks" role="tab" data-toggle="tab" class="font-15 text-uppercase">{{trans('profile.Sent')}} <span class="badge"></span></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="Inbox">
                  <div class="comments-area">
                  <ul class="comment-list">
                  @foreach($inbox as $sms)
                  <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img"  src="{{asset($sms->sender->image)}}" alt=""></a>
                      <div class="media-body row">
                       <div class="col-xs-12 col-sm-8 col-md-9">
                       <h5 class="media-heading comment-heading">{{$sms->sender->ar_name}}</h5>
                        <div class="comment-date">{{$sms->created_at->format('Y-m-d') }}</div>
                       </div>
                       <div class="col-xs-12 col-sm-8 col-md-3">
                       <a href='{{url("student/profile/messages/chat/$sms->id")}}'><button type="button" class="btn btn-primary btn-circled">
                        {{trans('profile.Open Chat')}}
											</button></a>
                       </div>
                    </div>
                  </li>
                  <hr>
                  @endforeach
                  </ul>
                  </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="sent">
                  <div class="comments-area">
                  <ul class="comment-list">
                  @foreach($sent as $sms)
                  <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" id="user-reply-img"  src="{{asset($sms->receiver->image)}}" alt=""></a>
                      <div class="media-body row">
                       <div class="col-xs-12 col-sm-8 col-md-9">
                       <h5 class="media-heading comment-heading">{{$sms->receiver->en_name}}</h5>
                        <div class="comment-date">{{$sms->created_at->format('Y-m-d') }}</div>
                       </div>
                       <div class="col-xs-12 col-sm-8 col-md-3">
                       <a href='{{url("student/profile/messages/chat/$sms->id")}}'><button type="button" class="btn btn-primary btn-circled">
                        Open Chat
											</button></a>
                       </div>
                    </div>
                  </li>
                  <hr>
                  @endforeach
                  </ul>
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

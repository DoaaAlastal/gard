@extends('layouts.app')
@section('css')
@if(App::getlocale()=='en') 
<link href="/css/chat.css" rel="stylesheet" type="text/css" />
@else
<link href="/css/chatrtl.css" rel="stylesheet" type="text/css" />
@endif
@endsection
@section('content')
   @if(App::getlocale()=='en') 
  <!-- Start main-content -->
  <div class="main-content">
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
                  <li class="mt-0 text-gray-silver"><strong class="text-gray-lighter">Mobile No.</strong><br> {{$user->mobile}}</li>
                  
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

                <!-- Start chat -->

            <div class="cont">  
           <h3 class=" text-left">
             @if($sms->sender == Auth::guard('user')->user() )
                {{$sms->receiver->en_name}}
             @else
                 {{$sms->sender->en_name}}
             @endif</h3>
             <hr>
            <div class="messaging">
             <div class="mesgs">
            <div class="msg_history">
            {{-- Show Main Message --}}
           @if($sms->sender == Auth::guard('user')->user() )
           <div class="outgoing_msg">
              <div class="sent_msg">
                <p>{{$sms->content}}</p>
                <span class="time_date">  {{$sms->created_at }} </span> </div>
            </div>
            @else
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="{{asset($sms->sender->image)}}" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>{{$sms->content}}</p>
                  <span class="time_date"> {{$sms->created_at }}   | </span></div>
              </div>
            </div>
            @endif
            {{-- End Main Message--}}
            {{-- Show Replies--}}
           @foreach($sms->replies as $reply)
           @if($reply->sender == Auth::guard('user')->user() )
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>{{$reply->content}}</p>
                <span class="time_date">  {{$reply->created_at }} </span> </div>
            </div>
            @else
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="{{asset($reply->sender->image)}}" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>{{$reply->content}}</p>
                  <span class="time_date"> {{$reply->created_at }}   | </span></div>
              </div>
            </div>
            @endif
            @endforeach
          <div class="type_msg">
            <div class="input_msg_write">
                <form method="post" action="{{url('student/profile/messages/send-reply')}}">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{$sms->id}}">
                    <input type="text" name="content" class="write_msg" placeholder="Type a message" />
                    <button class="msg_send_btn " type="submit" style="left:0;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </form>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>            <!-- End chat -->

            
              <div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- Arabic Chat Page -->
@else
<!-- Start main-content -->
<div class="main-content">
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
                  <li class="text-gray-silver"><strong class="text-gray-lighter">{{trans('profile.Address')}}</strong><br> {{$user->ar_address}}</li>
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

                <!-- Start chat -->

            <div class="cont">  
           <h3 class=" text-right">
             @if($sms->sender == Auth::guard('user')->user() )
                {{$sms->receiver->ar_name}}
             @else
                 {{$sms->sender->ar_name}}
             @endif</h3>
             <hr>
            <div class="messaging">
             <div class="mesgs">
            <div class="msg_history">
            {{-- Show Main Message --}}
           @if($sms->sender == Auth::guard('user')->user() )
           <div class="outgoing_msg">
              <div class="sent_msg">
                <p>{{$sms->content}}</p>
                <span class="time_date">  {{$sms->created_at }} </span> </div>
            </div>
            @else
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="{{asset($sms->sender->image)}}" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>{{$sms->content}}</p>
                  <span class="time_date"> {{$sms->created_at }}   | </span></div>
              </div>
            </div>
            @endif
            {{-- End Main Message--}}
            {{-- Show Replies--}}
           @foreach($sms->replies as $reply)
           @if($reply->sender == Auth::guard('user')->user() )
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>{{$reply->content}}</p>
                <span class="time_date">  {{$reply->created_at }} </span> </div>
            </div>
            @else
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="{{asset($reply->sender->image)}}" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>{{$reply->content}}</p>
                  <span class="time_date"> {{$reply->created_at }}   | </span></div>
              </div>
            </div>
            @endif
            @endforeach
          <div class="type_msg">
            <div class="input_msg_write">
                <form method="post" action="{{url('student/profile/messages/send-reply')}}">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{$sms->id}}">
                    <input type="text" name="content"  class="write_msg" placeholder="اكتب الرسالة هنا" />
                    <button class="msg_send_btn " type="submit" style="left:0;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </form>

            </div>
          </div>
        </div>
      </div>
      </div>
      </div>            <!-- End chat -->

            
              <div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endif
     

@endsection

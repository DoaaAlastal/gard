@extends('layouts.app')
@section('content')
    @if(App::getlocale()=='en')
 
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="uploads/general/book.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">Edit profile</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active">Current Page</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
      
    <!-- Section: Doctor Details -->
    <section class="">
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
                <a class="btn btn-info btn-flat mt-10 mb-sm-30" href="{{url('student/account/update-personal-info')}}">Edit Profile</a>
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
              <form  action="{{url('student/account/update-personal-info')}}" method="POST">
              @csrf  
              <div class="icon-box mb-0 p-0">
                  <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                    <i class="fa fa-user"></i>
                  </a>
                  <h4 class="text-gray pt-10 mt-0 mb-30">Edit Profile</h4>
                </div>
                <hr>
                <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi id perspiciatis facilis nulla possimus quasi, amet qui. Ea rerum officia, aspernatur nulla neque nesciunt alias.</p>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>English Name</label>
                    <input name="en_name" class="form-control" type="text" value="{{Auth::guard('user')->user()->en_name}}" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>Arabic Name</label>
                    <input name="ar_name" class="form-control" type="text" value="{{Auth::guard('user')->user()->ar_name}}" >
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Mobile</label>
                    <input name="mobile" class="form-control" type="text" value="{{Auth::guard('user')->user()->mobile}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email</label>
                    <input name="email" class="form-control" type="email" value="{{Auth::guard('user')->user()->email}}">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>English Address</label>
                    <input name="en_address" class="form-control" type="text" value="{{Auth::guard('user')->user()->en_address}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Arabic Address</label>
                    <input name="ar_address" class="form-control" type="text" value="{{Auth::guard('user')->user()->ar_address}}">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>English Bio</label>
                    <textarea name="en_bio" class="form-control" cols="20" rows="5">{{Auth::guard('user')->user()->en_bio}}</textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Arabic Bio</label>
                    <textarea name="ar_bio" class="form-control" cols="20" rows="5">{{Auth::guard('user')->user()->ar_bio}}</textarea>
                  </div>
                </div>
                 <div class="row">
                  <div class="form-group col-md-6">
                    <label>Facebook URL</label>
                    <input name="facebook" class="form-control" type="text" value="{{Auth::guard('user')->user()->facebook}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Twitter URL</label>
                    <input name="twitter" class="form-control" type="text" value="{{Auth::guard('user')->user()->twitter}}">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-lg mt-15" type="submit">Update</button>
                </div>
              </form>
              
              <hr class="mt-70 mb-70">

              <form name="editprofile-form" action="{{url('student/account/update-password')}}" method="post" >
              {{ csrf_field() }}
                <div class="icon-box mb-0 p-0">
                  <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                    <i class="fa fa-key"></i>
                  </a>
                  <h4 class="text-gray pt-10 mt-0 mb-30">Change Password</h4>
                </div>
                <hr>
                <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi id perspiciatis facilis nulla possimus quasi, amet qui. Ea rerum officia, aspernatur nulla neque nesciunt alias.</p>

                <div class="row">
                  <div class="form-group col-md-6 {{ $errors->has('oldpassword') ? ' has-error' : '' }}">
                    <label>New Password</label>
                    <input name="newpassword" class="form-control" type="password" value="{{old('newpassword')}}">
                    @if ($errors->has('newpassword'))
                                        <span class="help-block col-md-12">
                                              <strong class="error-sms1">{{ $errors->first('newpassword') }}</strong>
                                        </span>
                     @endif
                  </div>
                  <div class="form-group col-md-6 {{ $errors->has('newpassword_confirmation ') ? ' has-error' : '' }}">
                    <label>Re-enter New Password</label>
                    <input  name="newpassword_confirmation"  class="form-control" type="password" value="{{old('newpassword_confirmation')}}" >
                    @if ($errors->has('newpassword_confirmation'))
                                        <span class="help-block col-md-12">
                                            <strong class="error-sms1">{{ $errors->first('newpassword_confirmation') }}</strong>
                                        </span>
                                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12{{ $errors->has('oldpassword ') ? ' has-error' : '' }}">
                    <label>Old Password</label>
                    <input  class="form-control" name="oldpassword" type="password" value="{{old('oldpassword')}}">
                    @if ($errors->has('oldpassword'))
                                        <span class="help-block col-md-12">
                                              <strong class="error-sms1">{{ $errors->first('oldpassword') }}</strong>
                                        </span>
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-lg mt-15" type="submit">Update</button>
                </div>
              </form>
              <hr class="mt-70 mb-70">

              <form name="editprofile-form" action="{{url('student/account/update-image')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="icon-box mb-0 p-0">
                  <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                    <i class="fa fa-image"></i>
                  </a>
                  <h4 class="text-gray pt-10 mt-0 mb-30">Change Image</h4>
                </div>
                <hr>
                <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi id perspiciatis facilis nulla possimus quasi, amet qui. Ea rerum officia, aspernatur nulla neque nesciunt alias.</p>

                <div class="row">
                  <div class="form-group col-md-12{{ $errors->has('image ') ? ' has-error' : '' }}">
                    <label>Image</label>
                          <input class="form-control m-input" type="file"  name="image" >
                    @if ($errors->has('image'))
                      <span class="help-block col-md-12">
                             <strong class="error-sms1">{{ $errors->first('image') }}</strong>
                       </span>
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-lg mt-15" type="submit">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- Arabic Update Profile -->
    @else
     <!-- Section: inner-header -->
     <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="uploads/general/book.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">{{trans('profile.Edit Profile')}}</h2>
              <ol class="breadcrumb pull-right mt-10 white">
                <li><a href="#">{{trans('app.Home')}}</a></li>
                <li><a href="#">{{trans('app.Pages')}}</a></li>
                <li class="active">{{trans('profile.Current Page')}}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
      
    <!-- Section: Doctor Details -->
    <section class="">
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
                <a class="btn btn-info btn-flat mt-10 mb-sm-30" href="{{url('student/account/update-personal-info')}}">Edit Profile</a>
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
              <form  action="{{url('student/account/update-personal-info')}}" method="POST">
              @csrf  
              <div class="icon-box mb-0 p-0">
                  <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-right mb-0 mr-10">
                    <i class="fa fa-user"></i>
                  </a>
                  <h4 class="text-gray pt-10 mt-0 mb-30">{{trans('profile.Edit Profile')}}</h4>
                </div>
                <hr>
                <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi id perspiciatis facilis nulla possimus quasi, amet qui. Ea rerum officia, aspernatur nulla neque nesciunt alias.</p>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>{{trans('profile.English Name')}}</label>
                    <input name="en_name" class="form-control" type="text" value="{{Auth::guard('user')->user()->en_name}}" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>{{trans('profile.Arabic Name')}}</label>
                    <input name="ar_name" class="form-control" type="text" value="{{Auth::guard('user')->user()->ar_name}}" >
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>{{trans('profile.Mobile')}}</label>
                    <input name="mobile" class="form-control" type="text" value="{{Auth::guard('user')->user()->mobile}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>{{trans('profile.Email')}}</label>
                    <input name="email" class="form-control" type="email" value="{{Auth::guard('user')->user()->email}}">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>{{trans('profile.English Address')}}</label>
                    <input name="en_address" class="form-control" type="text" value="{{Auth::guard('user')->user()->en_address}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>{{trans('profile.Arabic Address')}}</label>
                    <input name="ar_address" class="form-control" type="text" value="{{Auth::guard('user')->user()->ar_address}}">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>{{trans('profile.English Bio')}}</label>
                    <textarea name="en_bio" class="form-control" cols="20" rows="5">{{Auth::guard('user')->user()->en_bio}}</textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label>{{trans('profile.Arabic Bio')}}</label>
                    <textarea name="ar_bio" class="form-control" cols="20" rows="5">{{Auth::guard('user')->user()->ar_bio}}</textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Facebook URL</label>
                    <input name="facebook" class="form-control" type="text" value="{{Auth::guard('user')->user()->facebook}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Twitter URL</label>
                    <input name="twitter" class="form-control" type="text" value="{{Auth::guard('user')->user()->twitter}}">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-lg mt-15" type="submit">{{trans('profile.Update')}}</button>
                </div>
              </form>
              
              <hr class="mt-70 mb-70">

              <form name="editprofile-form" action="{{url('student/account/update-password')}}" method="post" >
              {{ csrf_field() }}
                <div class="icon-box mb-0 p-0">
                  <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-right mb-0 mr-10">
                    <i class="fa fa-key"></i>
                  </a>
                  <h4 class="text-gray pt-10 mt-0 mb-30">{{trans('profile.Change Password')}}</h4>
                </div>
                <hr>
                <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi id perspiciatis facilis nulla possimus quasi, amet qui. Ea rerum officia, aspernatur nulla neque nesciunt alias.</p>

                <div class="row">
                  <div class="form-group col-md-6 {{ $errors->has('oldpassword') ? ' has-error' : '' }}">
                    <label>{{trans('profile.New Password')}}</label>
                    <input name="newpassword" class="form-control" type="password" value="{{old('newpassword')}}">
                    @if ($errors->has('newpassword'))
                                        <span class="help-block col-md-12">
                                              <strong class="error-sms1">{{ $errors->first('newpassword') }}</strong>
                                        </span>
                     @endif
                  </div>
                  <div class="form-group col-md-6 {{ $errors->has('newpassword_confirmation ') ? ' has-error' : '' }}">
                    <label>{{trans('profile.Re-enter New Password')}}</label>
                    <input  name="newpassword_confirmation"  class="form-control" type="password" value="{{old('newpassword_confirmation')}}" >
                    @if ($errors->has('newpassword_confirmation'))
                                        <span class="help-block col-md-12">
                                            <strong class="error-sms1">{{ $errors->first('newpassword_confirmation') }}</strong>
                                        </span>
                                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12{{ $errors->has('oldpassword ') ? ' has-error' : '' }}">
                    <label>{{trans('profile.Old Password')}}</label>
                    <input  class="form-control" name="oldpassword" type="password" value="{{old('oldpassword')}}">
                    @if ($errors->has('oldpassword'))
                                        <span class="help-block col-md-12">
                                              <strong class="error-sms1">{{ $errors->first('oldpassword') }}</strong>
                                        </span>
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-lg mt-15" type="submit">{{trans('profile.Update')}}</button>
                </div>
              </form>
              <hr class="mt-70 mb-70">

              <form name="editprofile-form" action="{{url('student/account/update-image')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="icon-box mb-0 p-0">
                  <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-right mb-0 mr-10">
                    <i class="fa fa-image"></i>
                  </a>
                  <h4 class="text-gray pt-10 mt-0 mb-30">{{trans('profile.Change Image')}}</h4>
                </div>
                <hr>
                <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi id perspiciatis facilis nulla possimus quasi, amet qui. Ea rerum officia, aspernatur nulla neque nesciunt alias.</p>

                <div class="row">
                  <div class="form-group col-md-12{{ $errors->has('image ') ? ' has-error' : '' }}">
                    <label>{{trans('profile.Image')}}</label>
                          <input class="form-control m-input" type="file"  name="image" >
                    @if ($errors->has('image'))
                      <span class="help-block col-md-12">
                             <strong class="error-sms1">{{ $errors->first('image') }}</strong>
                       </span>
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-lg mt-15" type="submit">{{trans('profile.Update')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

@endsection

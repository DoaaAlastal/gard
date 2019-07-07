@extends('layouts.app')
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
              <h2 class="text-theme-colored2 font-36">My Account</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li><a href="/student/account">Profile</a></li>
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
                <h6 class="text-small text-white">
                  @if($user->IsActive==1)
                  <i class="fa fa-circle text-success"></i> Active
                  @else
                  <i class="fa fa-circle text-error"></i>  In Active
                  @endif
                </h6>
                <ul class="list angle-double-right m-0">
                  <li class="mt-0 text-gray-silver"><strong class="text-gray-lighter">Email</strong><br> {{$user->email}}</li>
                  <li class="text-gray-silver"><strong class="text-gray-lighter">Address</strong><br> {{$user->en_address}}</li>
                </ul>
                <ul class="styled-icons icon-gray icon-circled icon-sm mt-15 mb-15">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
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
                <li role="presentation" class="active" ><a href="#bio" aria-controls="bio" role="tab" data-toggle="tab" class="font-15 text-uppercase"><span>Bio</span> </a></li>
                <li role="presentation" ><a href="#bookmarks" aria-controls="bookmarks" role="tab" data-toggle="tab" class="font-15 text-uppercase">Courses <span class="badge"></span></a></li>
                <li role="presentation"><a href="#tickets" aria-controls="tickets" role="tab" data-toggle="tab" class="font-15 text-uppercase">Support Tickets <span class="badge"></span></a></li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="bio">
                    <div class="table-responsive">
                    <blockquote class="theme-colored pt-20 pb-20">{{$user->en_bio}}</blockquote>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="bookmarks">
                  <table class="table">
                       <tbody>
                      <thead>
                      <tr>
                          <th>Thumbnail</th>
                          <th>Title</th>
                          <th>Price</th>
                          <th>Topics</th>
                          <th></th>
                      </tr>
                      </thead>
                           @foreach($user->courses as $course)
                          <tr>
                              <th scope="row"><img src="{{asset($course->thumb_image)}}" style="width:100px; height:50px;" alt=""></th>
                              <td><h4>{{$course->en_title}}</h4></td>
                              <td><h4>${{$course->price}}</h4></td>
                              <td><h4><a href="{{url('/student/course/topics/'.$course->id)}}"><i class="fa fa-eye"></i></a></h4></td>
                              <td><a href="{{url('course-details/'.$course->id)}}"><button class="btn btn-dark btn-flat pull-right m-0">Course Details</button></a></td>
                          </tr>
                          @endforeach
                       </tbody>
                    </table> 

                  </div>
                  <div role="tabpanel" class="tab-pane" id="tickets">
                        <div class="row">
                            <div class="col-sx-12 col-sm-4 col-md-9"></div>
                            <div class="col-sx-12 col-sm-4 col-md-3">
                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#newTicket">
                   <span>
													<i class="fa fa-plus"></i>
													<span>
														New Ticket
													</span>
												</span>
                                </a>
                            </div>
                        </div>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>subject</th>
                                <th>Attachment</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->tickets as $item)
                                <tr>
                                    <th scope="row">{{$item->subject}}</th>
                                    <td>
                                        <a title="Show"
                                           target="_blank"
                                           class="fa fa-eye"
                                           href="{{asset($item->attachment)}}"
                                           on-click="window.open({{$item->attachment}},'_blank');">
                                        </a>
                                    </td>
                                    <td>
                                        @if($item->is_active == 1)
                                            <span class="btn btn-success btn-xs"> Open </span>
                                        @else
                                            <span class="btn btn-danger btn-xs"> Closed </span>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-info btn-xs replyBtn" href="{{url('student/support/send-reply/'.$item->id)}}">Reply ticket</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

      <!-- Send Ticket modal -->
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="newTicket">
          <div class="modal-dialog modal-md">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel2">Send New Ticket</h4>
                  </div>
                  <div class="modal-body">
                      <div class="bg-lightest border-1px p-30 mb-0">
                          <form name="login-form" class="clearfix" role="form" method="POST" action="{{ url('/student/support/send-ticket') }}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <input type="hidden" name="sender_type" value="App\User">
                              <input type="hidden" name="sender_id" value="{{Auth::guard('user')->user()->id}}">
                              <div class="row">
                                  <div class="form-group col-md-12 {{ $errors->has('subject') ? ' has-error' : '' }}">
                                      <label for="subject">Ticket Subject</label>
                                      <input id="subject" name="subject" class="form-control" type="text" value="{{ old('subject') }}" placeholder="Enter your Ticket Subject">
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-12 {{ $errors->has('content') ? ' has-error' : '' }}">
                                      <label for="content"> Ticket Content</label>
                                      <textarea class="form-control m-input" id="content" name="content"  value="">{{old('content')}}</textarea>
                                      @if ($errors->has('content'))
                                          <span class="help-block col-md-12">
                             <strong class="error-sms">{{ $errors->first('content') }}</strong>
                           </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-12 {{ $errors->has('attachment') ? ' has-error' : '' }}">
                                      <label for="attachment"> Ticket Attachment</label>
                                      <input id="attachment" name="attachment" class="form-control" type="file" value="{{ old('attachment') }}">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <button class="btn btn-dark btn-lg mt-15" type="submit">Send Ticket</button>
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





      </div>
  <!-- end main-content -->
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
                              <h2 class="text-theme-colored2 font-36">{{trans('profile.My Account')}}</h2>
                              <ol class="breadcrumb pull-right mt-10 white">
                                  <li><a href="/">{{trans('app.Home')}}</a></li>
                                  <li><a href="/student/account">{{trans('profile.Profile')}}</a></li>
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
                                  <h6 class="text-small text-white">
                                      @if($user->IsActive==1)
                                          <i class="fa fa-circle text-success"></i> فعال
                                      @else
                                          <i class="fa fa-circle text-error"></i>  غير فعال
                                      @endif
                                  </h6>
                                  <ul class="list angle-double-right m-0">
                                      <li class="mt-0 text-gray-silver"><strong class="text-gray-lighter">{{trans('profile.Email')}}</strong><br> {{$user->email}}</li>
                                      <li class="text-gray-silver"><strong class="text-gray-lighter">{{trans('profile.Address')}}</strong><br> {{$user->ar_address}}</li>
                                  </ul>
                                  <ul class="styled-icons icon-gray icon-circled icon-sm mt-15 mb-15">
                                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
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
                                      <li role="presentation" class="active" ><a href="#bio" aria-controls="bio" role="tab" data-toggle="tab" class="font-15 text-uppercase"><span>{{trans('profile.Bio')}}</span> </a></li>
                                      <li role="presentation" ><a href="#bookmarks" aria-controls="bookmarks" role="tab" data-toggle="tab" class="font-15 text-uppercase">{{trans('app.Courses')}} <span class="badge"></span></a></li>
                                      <li role="presentation"><a href="#tickets" aria-controls="tickets" role="tab" data-toggle="tab" class="font-15 text-uppercase">{{trans('profile.Support Tickets')}} <span class="badge"></span></a></li>

                                  </ul>

                                  <!-- Tab panes -->
                                  <div class="tab-content">
                                      <div role="tabpanel" class="tab-pane active" id="bio">
                                          <div class="table-responsive">
                                              <blockquote class="theme-colored pt-20 pb-20">{{$user->ar_bio}}</blockquote>
                                          </div>
                                      </div>
                                      <div role="tabpanel" class="tab-pane" id="bookmarks">
                                          <table class="table">
                                              <tbody>
                                              @foreach($user->courses as $course)

                                                  <tr>
                                                      <th scope="row"><img src="{{asset($course->thumb_image)}}" style="width:100px; height:50px;" alt=""></th>
                                                      <td><h4>{{$course->ar_title}}</h4>
                                                      </td><td><h4>${{$course->price}}</h4>
                                                      </td><td><h4><a href="{{url('/student/course/topics/'.$course->id)}}"><i class="fa fa-eye"></i></a></h4>
                                                      </td></tr>
                                              @endforeach
                                              </tbody>
                                          </table>

                                      </div>
                                      <div role="tabpanel" class="tab-pane" id="tickets">
                                          <div class="row">
                                              <div class="col-sx-12 col-sm-4 col-md-9"></div>
                                              <div class="col-sx-12 col-sm-4 col-md-3">
                                                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#newTicket">
                   <span>
													<i class="fa fa-plus"></i>
													<span>
														{{trans('profile.New Ticket')}}
													</span>
												</span>
                                                  </a>
                                              </div>
                                          </div>

                                          <table class="table table-hover">
                                              <thead>
                                              <tr>
                                                  <th>{{trans('profile.Subject')}}</th>
                                                  <th>{{trans('profile.Attachment')}}</th>
                                                  <th>{{trans('prifile.Status')}}</th>
                                                  <th></th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($user->tickets as $item)
                                                  <tr>
                                                      <th scope="row">{{$item->subject}}</th>
                                                      <td>
                                                          <a title="Show"
                                                             target="_blank"
                                                             class="fa fa-eye"
                                                             href="{{asset($item->attachment)}}"
                                                             on-click="window.open({{$item->attachment}},'_blank');">
                                                          </a>
                                                      </td>
                                                      <td>
                                                          @if($item->is_active == 1)
                                                              <span class="btn btn-success btn-xs"> مفتوح  </span>
                                                          @else
                                                              <span class="btn btn-danger btn-xs"> مغلق </span>
                                                          @endif
                                                      </td>
                                                      <td><a class="btn btn-info btn-xs replyBtn" href="{{url('student/support/send-reply/'.$item->id)}}">{{trans('profile.Reply ticket')}}</a></td>
                                                  </tr>
                                              @endforeach
                                              </tbody>
                                          </table>
                                      </div>

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>

          <!-- Send Ticket modal -->
          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="newTicket">
              <div class="modal-dialog modal-md">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel2">{{trans('profile.Send New Ticket')}}</h4>
                      </div>
                      <div class="modal-body">
                          <div class="bg-lightest border-1px p-30 mb-0">
                              <form name="login-form" class="clearfix" role="form" method="POST" action="{{ url('/student/support/send-ticket') }}" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="sender_type" value="user">
                                  <div class="row">
                                      <div class="form-group col-md-12 {{ $errors->has('subject') ? ' has-error' : '' }}">
                                          <label for="subject">{{trans('profile.Ticket Subject')}}</label>
                                          <input id="subject" name="subject" class="form-control" type="text" value="{{ old('subject') }}" placeholder="أدخل عنوان الطلب">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="form-group col-md-12 {{ $errors->has('content') ? ' has-error' : '' }}">
                                          <label for="content"> {{trans('profile.Ticket Content')}}</label>
                                          <textarea class="form-control m-input" id="content" name="content"  value="">{{old('content')}}</textarea>
                                          @if ($errors->has('content'))
                                              <span class="help-block col-md-12">
                             <strong class="error-sms">{{ $errors->first('content') }}</strong>
                           </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="form-group col-md-12 {{ $errors->has('attachment') ? ' has-error' : '' }}">
                                          <label for="attachment"> {{trans('profile.Ticket Attachment')}}</label>
                                          <input id="attachment" name="attachment" class="form-control" type="file" value="{{ old('attachment') }}">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <button class="btn btn-dark btn-lg mt-15" type="submit">{{trans('profile.Send Ticket')}}</button>
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





      </div>
      <!-- end main-content -->
  @endif
@endsection

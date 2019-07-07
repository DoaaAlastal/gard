@extends('instructor.layout.app')

@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Instructor Dashboard
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="{{url('instructor/')}}" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('instructor/profile')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Profile
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('instructor/profile/messages')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Messages
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        @include('instructor.partials.profile-sidebar')
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                    <i class="flaticon-share m--hide"></i>
                                    Inbox
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                    Sent
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show " id="m_user_profile_tab_1" >
                        <div class="m-portlet__body">
                            <div class="m-widget3">
                                @foreach($inbox as $sms)
                                <div class="m-widget3__item">
                                    <div class="m-widget3__header">
                                        <div class="m-widget3__user-img">
                                            <img class="m-widget3__img" src='{{asset($sms->sender->image)}}' alt="">
                                        </div>
                                        <div class="m-widget3__info">
														<span class="m-widget3__username">
															{{$sms->sender->en_name}}
														</span>
                                            <br>
                                            <span class="m-widget3__time">
															{{$sms->created_at}}
											</span>
                                        </div>
                                        <span class="m-widget3__status m--font-info">
											<a href='{{url("instructor/profile/messages/chat/$sms->id")}}'><button type="button" class="btn m-btn--pill    btn-primary">
                                                Open Chat
											</button></a>
										</span>
                                    </div>
                                    <div class="m-widget3__body">
                                        <p class="m-widget3__text">
                                        {{$sms->content}}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="m_user_profile_tab_2">
                        <div class="m-portlet__body">
                            <div class="m-widget3">
                            @foreach($sent as $sms)
                                <div class="m-widget3__item">
                                    <div class="m-widget3__header">
                                        <div class="m-widget3__user-img">
                                            <img class="m-widget3__img" src='{{asset($sms->receiver->image)}}' alt="">
                                        </div>
                                        <div class="m-widget3__info">
                                                            <span class="m-widget3__username">
                                                                {{$sms->receiver->en_name}}
                                                            </span>
                                            <br>
                                            <span class="m-widget3__time">
                                                                {{$sms->created_at}}
                                                </span>
                                        </div>
                                        <span class="m-widget3__status m--font-info">
                                           <a href='{{url("instructor/profile/messages/chat/$sms->id")}}'><button type="button" class="btn m-btn--pill    btn-primary">
                                                Open Chat
											</button></a>
                                        </span>
                                    </div>
                                    <div class="m-widget3__body">
                                        <p class="m-widget3__text">
                                            {{$sms->content}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

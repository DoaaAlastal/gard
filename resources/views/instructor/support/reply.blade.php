@extends('instructor.layout.app')

@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Support Center
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
                    <a href="{{url('instructor/support')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Support
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a  class="m-nav__link">
											<span class="m-nav__link-text">
												Ticket #{{$ticket->id}}
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
        <div class="col-xl-12 col-lg-12">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" >
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" >
                                    <i class="flaticon-share m--hide"></i>
                                    {{$ticket->subject}}
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show " >
                        <div class="m-portlet__body">
                            <div class="m-widget3">
                                <div class="tab-content">
                                    <div class="tab-pane active show m-scrollable" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                                        <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                                            <div class="m-messenger__messages mCustomScrollbar _mCS_10 mCS-autoHide" style="height: 280px; position: relative; overflow: visible;"><div id="mCSB_10" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_10_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                                        <div class="m-messenger__datetime" >
                                                            {{$ticket->created_at->format('Y-m-d') }}
                                                        </div>
                                                        {{-- Show Main Message --}}
                                                        @if($ticket->attachment)
                                                            <div class="m-messenger__wrapper">
                                                                <div class="m-messenger__message m-messenger__message--out">
                                                                    <div class="m-messenger__message-body">
                                                                        <div class="m-messenger__message-arrow"></div>
                                                                        <div class="m-messenger__message-content">
                                                                            <div class="m-messenger__message-text">
                                                                                <img src="{{asset($ticket->attachment)}}" alt="" width="200" height="200">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="m-messenger__wrapper">
                                                            <div class="m-messenger__message m-messenger__message--out">
                                                                <div class="m-messenger__message-body">
                                                                    <div class="m-messenger__message-arrow"></div>
                                                                    <div class="m-messenger__message-content">
                                                                        <div class="m-messenger__message-text">
                                                                            {{$ticket->content}}<br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- End Main Message--}}
                                                        {{-- Show Replies--}}
                                                        @foreach($ticket->replies as $reply)
                                                            @if($reply->sender == Auth::guard('instructor')->user() )
                                                                <div class="m-messenger__wrapper">
                                                                    <div class="m-messenger__message m-messenger__message--out">
                                                                        <div class="m-messenger__message-body">
                                                                            <div class="m-messenger__message-arrow"></div>
                                                                            <div class="m-messenger__message-content">
                                                                                <div class="m-messenger__message-text">
                                                                                    {{$reply->content}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="m-messenger__wrapper">
                                                                    <div class="m-messenger__message m-messenger__message--in">
                                                                        <div class="m-messenger__message-pic">
                                                                            <img src="{{asset($reply->sender->image)}}" alt="" class="mCS_img_loaded">
                                                                        </div>
                                                                        <div class="m-messenger__message-body">
                                                                            <div class="m-messenger__message-arrow"></div>
                                                                            <div class="m-messenger__message-content">
                                                                                <div class="m-messenger__message-text">
                                                                                    {{$reply->content}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        {{-- End  Replies--}}

                                                    </div></div><div id="mCSB_10_scrollbar_vertical" class="mCSB_scrollTools mCSB_10_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_10_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 18px; max-height: 120px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                                            <div class="m-messenger__seperator"></div>
                                            <form method="POST" action="{{url('instructor/support/send-reply')}}" name="reply">
                                                @csrf
                                                <input type="hidden" name="support_id" value="{{$ticket->id}}">
                                                <input type="hidden" name="sender_type" value="App\Instructor">
                                                <input type="hidden" name="sender_id" value="{{Auth::guard('instructor')->user()->id}}">
                                                <div class="m-messenger__form">
                                                    <div class="m-messenger__form-controls">
                                                        <input type="text" name="content"  required placeholder="Type here..." class="m-messenger__form-input">
                                                    </div>
                                                    <div class="m-messenger__form-tools">
                                                        <button type="submit" class="m-messenger__form-attachment" >
                                                            <i class="la la-send"></i>
                                                        </button>
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
        </div>
    </div>
@endsection

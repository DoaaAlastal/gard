@extends('layouts.app')
@section('content')
  @if(App::getlocale()=='en')  
 <!-- Start main-content -->
 <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="{{App\Setting::getValue('event')->value}}">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">Events</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Events</a></li>
                <li class="active"> Online Events</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Events Grid -->
    <section>
      <div class="container pt-70 pb-40">
        <div class="section-content">
          <div class="row multi-row-clearfix">
           @if(count($onlineEvents)>0)
          @foreach($onlineEvents as $onlineEvent)
            <div class="col-sm-6 col-md-4">
              <div class="event-list bg-silver-light maxwidth500 mb-30">
                <div class="thumb event-img">
                  <img src="{{asset($onlineEvent->thumb_image)}}" alt="" class="img-fullwidth">
                  <div class="entry-date media-left text-center flip bg-theme-colored2 pt-5 pr-15 pb-5 pl-15">
                    <ul>
                      <li class="font-16 text-white font-weight-600 border-bottom">{{date('d', strtotime($onlineEvent->start_at))}} </li>
                      <li class="font-12 text-white text-uppercase">{{date('M', strtotime($onlineEvent->start_at))}}</li>
                    </ul>
                  </div>
                </div>
                <div class="event-list-details border-1px bg-white clearfix p-20 pt-15 pb-30">
                  <h4 class="text-uppercase font-weight-600 mb-5"><a href="#">{{$onlineEvent->en_title}}</a></h4>
                  <ul class="list-inline">
                    <li><i class="fa fa-clock-o text-theme-colored2"></i> {{date('H:i', strtotime($onlineEvent->start_at))}} - {{date('H:i', strtotime($onlineEvent->end_at))}} </li>
                    <li> <i class="fa fa-map-marker text-theme-colored2"></i> {{$onlineEvent->en_location}}.</li>
                  </ul>
                  <p class="mt-15">{{$onlineEvent->en_description}}.</p> 
                <a href="{{'/event-details/'.$onlineEvent->id}}"  class="btn btn-default mt-5">Details </a>
                </div>
              </div>
            </div>
            @endforeach
            @else
            <p> <h3>There is no Online Events </h3> </p>
            @endif
          </div>
        </div>
        {{$onlineEvents->links()}}
      </div>
    </section>
  </div>
  <!-- end main-content -->
   @else

   <!-- Arabic Online Events -->

   <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="{{App\Setting::getValue('event')->value}}">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">{{trans('app.events')}}</h2>
              <ol class="breadcrumb pull-right  mt-10 white">
                <li><a href="#">{{trans('app.Home')}}</a></li>
                <li><a href="#">{{trans('app.events')}}</a></li>
                <li class="active"> {{trans('app.online-Events')}}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Events Grid -->
    <section>
      <div class="container pt-70 pb-40">
        <div class="section-content">
          <div class="row multi-row-clearfix">
              @if(count($onlineEvents)>0)
          @foreach($onlineEvents as $onlineEvent)
            <div class="col-sm-6 col-md-4">
              <div class="event-list bg-silver-light maxwidth500 mb-30">
                <div class="thumb event-img">
                  <img src="{{asset($onlineEvent->thumb_image)}}" alt="" class="img-fullwidth">
                  <div class="entry-date media-left text-center flip bg-theme-colored2 pt-5 pr-15 pb-5 pl-15">
                    <ul>
                      <li class="font-16 text-white font-weight-600 border-bottom">{{date('d', strtotime($onlineEvent->start_at))}} </li>
                      <li class="font-12 text-white text-uppercase">{{date('M', strtotime($onlineEvent->start_at))}}</li>
                    </ul>
                  </div>
                </div>
                <div class="event-list-details border-1px bg-white clearfix p-20 pt-15 pb-30">
                  <h4 class="text-uppercase font-weight-600 mb-5"><a href="#">{{$onlineEvent->ar_title}}</a></h4>
                  <ul class="list-inline">
                    <li><i class="fa fa-clock-o text-theme-colored2"></i> {{date('H:i', strtotime($onlineEvent->start_at))}} - {{date('H:i', strtotime($onlineEvent->end_at))}} </li>
                    <li> <i class="fa fa-map-marker text-theme-colored2"></i> {{$onlineEvent->ar_location}}.</li>
                  </ul>
                  <p class="mt-15">{{$onlineEvent->ar_description}}.</p> 
                <a href="{{'/event-details/'.$onlineEvent->id}}"  class="btn btn-default mt-5">{{trans('app.Details')}} </a>
                </div>
              </div>
            </div>
            @endforeach
            @else
            <p> <h3>{{trans('app.OEmsg')}} </h3> </p>
            @endif
          </div>
        </div>
        {{$onlineEvents->links()}}
      </div>
    </section>
  </div>
  <!-- end main-content -->
  @endif
  @endsection

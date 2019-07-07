@extends('layouts.app')
@section('content')
@if(App::getlocale()=='en')
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="{{App\Setting::getValue('countbg')->value}}">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">Blog</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active"> News</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Blog -->
    <section>
      <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row multi-row-clearfix">
          <div class="blog-posts">
            <div class="col-md-12">
              <div class="list-dashed">
                  @foreach($news as $item)
                <article class="post clearfix mb-30 pb-30">
                  <div class="row">
                    <div class="col-sm-5">
                      <div class="entry-header">
                        <div class="post-thumb"> <img class="img-responsive img-fullwidth" src="{{asset($item->thumb_image)}}" alt=""> </div>
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="entry-content mt-0">
                        <a href="#">
                        <h4 class="entry-title mt-0 pt-0">{{$item->en_title}}</h4>
                        </a>
                        <ul class="list-inline font-12 mb-20 mt-10">
                          <li>posted by <a href="#" class="text-theme-colored">{{$item->en_author}} |</a></li>
                          <li><span class="text-theme-colored">{{date('M d,Y', strtotime($item->created_at))}}</span></li>
                        </ul>
                        <p class="mb-30"> {{$item->en_content}}<a href="{{'/post-details/'.$item->id}}">[...]</a></p>
                        <ul class="list-inline like-comment pull-left font-12">
                          <li><i class="pe-7s-comment"></i>{{$item->totalCommentsCount()}} </li>
                        </ul>
                        <a class="pull-right text-gray font-13" href="{{'/post-details/'.$item->id}}"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
                      </div>
                    </div>
                  </div>
                </article>
               @endforeach
              </div>
            </div>
          </div>
        </div>
        {{$news->links()}}
      </div>
    </section>
    @else
  <!-- Arabic  News -->
   <!-- Section: inner-header -->
   <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="{{App\Setting::getValue('countbg')->value}}">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">{{trans('app.Blog')}}</h2>
              <ol class="breadcrumb pull-right mt-10 white">
                <li><a href="{{url('/')}}">{{trans('app.Home')}}</a></li>
                <li class="active"> {{trans('index.news')}}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Blog -->
    <section>
      <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row multi-row-clearfix">
          <div class="blog-posts">
            <div class="col-md-12">
              <div class="list-dashed">
                  @foreach($news as $item)
                <article class="post clearfix mb-30 pb-30">
                  <div class="row">
                    <div class="col-sm-5">
                      <div class="entry-header">
                        <div class="post-thumb"> <img class="img-responsive img-fullwidth" src="{{asset($item->thumb_image)}}" alt=""> </div>
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="entry-content mt-0">
                        <a href="#">
                        <h4 class="entry-title mt-0 pt-0">{{$item->ar_title}}</h4>
                        </a>
                        <ul class="list-inline font-12 mb-20 mt-10">
                          <li>{{trans('app.posted by')}}: <a href="#" class="text-theme-colored">{{$item->ar_author}} |</a></li>
                          <li><span class="text-theme-colored">{{date('M d,Y', strtotime($item->created_at))}}</span></li>
                        </ul>
                        <p class="mb-30"> {{$item->ar_content}}<a href="{{'/post-details/'.$item->id}}">[...]</a></p>
                        <ul class="list-inline like-comment pull-left font-12">
                          <li><i class="pe-7s-comment"></i>{{$item->totalCommentsCount()}} </li>
                        </ul>
                        <a class="pull-right text-gray font-13" href="{{'/post-details/'.$item->id}}">{{trans('app.Read more')}} <i class="fa fa-angle-double-left text-theme-colored"></i></a>
                      </div>
                    </div>
                  </div>
                </article>
               @endforeach
              </div>
            </div>
          </div>
        </div>
        {{$news->links()}}
      </div>
    </section>
    @endif

@endsection

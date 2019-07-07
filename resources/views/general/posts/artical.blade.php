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
            <li class="active"> Articles</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container mt-30 mb-30 pt-30 pb-30">
    <div class="row">
      <div class="col-md-9 pull-right flip sm-pull-none">
        <div class="blog-posts">
          <div class="col-md-12">
            <div class="row list-dashed">
              @foreach($articals as $item)
              <article class="post clearfix mb-30 pb-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="{{asset($item->thumb_image)}}" alt="" class="img-responsive img-fullwidth"> 
                  </div>
                </div>
                <div class="entry-content border-1px p-20 pr-10">
                  <div class="entry-meta media no-bg no-border mt-15 pb-20">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600">{{$item->Category->en_name}}</li>
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0"><a href="{{'/post-details/'.$item->id}}">{{$item->en_title}}</a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> {{$item->totalCommentsCount()}}  Comments</span>
                      </div>

                    </div>
                  </div>
                  <p class="mt-10">{{str_limit($item->en_content, 220)}}.</p>
                  <a href="{{'/post-details/'.$item->id}}" class="btn-read-more">Read more</a>
                  <div class="clearfix"></div>
                </div>
              </article>
             @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sidebar sidebar-right mt-sm-30">
          <div class="widget">
            <h5 class="widget-title line-bottom">Category</h5>
            <ul class="list-divider list-border list check">
               @foreach($category as $item)
              <li><a href="">{{$item->en_name}}</a></li>
              @endforeach
            </ul>
          </div>
         
          <div class="widget">
            <h5 class="widget-title line-bottom">Tags</h5>
            <div class="tags">
               @foreach($tag as $item)
              <a href="">{{$item->en_name}}</a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    {{$articals->links()}}
  </div>
</section>  
<!-- Arabic Articale -->
@else

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
            <li class="active">{{trans('app.Articles')}} </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container mt-30 mb-30 pt-30 pb-30">
    <div class="row">
      <div class="col-md-9 pull-right flip sm-pull-none">
        <div class="blog-posts">
          <div class="col-md-12">
            <div class="row list-dashed">
              @foreach($articals as $item)
              <article class="post clearfix mb-30 pb-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="{{asset($item->thumb_image)}}" alt="" class="img-responsive img-fullwidth"> 
                  </div>
                </div>
                <div class="entry-content border-1px p-20 pr-10">
                  <div class="entry-meta media no-bg no-border mt-15 pb-20">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600">{{$item->Category->ar_name}}</li>
                      </ul>
                    </div>
                    <div class="media-body pr-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0"><a href="{{'/post-details/'.$item->id}}">{{$item->ar_title}}</a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> {{$item->totalCommentsCount()}}  {{trans('index.comments')}}</span>
                      </div>

                    </div>
                  </div>
                  <p class="mt-10">{{str_limit($item->ar_content, 220)}}.</p>
                  <a href="{{'/post-details/'.$item->id}}" class="btn-read-more">{{trans('app.Read more')}}</a>
                  <div class="clearfix"></div>
                </div>
              </article>
             @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sidebar sidebar-right mt-sm-30">
          <div class="widget">
            <h5 class="widget-title line-bottom">{{trans('app.Category')}}</h5>
            <ul class="list-divider list-border list check">
               @foreach($category as $item)
              <li><a href="">{{$item->ar_name}}</a></li>
              @endforeach
            </ul>
          </div>
         
          <div class="widget">
            <h5 class="widget-title line-bottom">{{trans('app.Tags')}}</h5>
            <div class="tags">
               @foreach($tag as $item)
              <a href="">{{$item->ar_name}}</a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    {{$articals->links()}}
  </div>
</section> 
@endif
  @endsection

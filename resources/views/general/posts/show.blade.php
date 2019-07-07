@extends('layouts.app')
@section('content')

@if(App::getlocale()=='en')

<!-- Section: inner-header -->
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/{{App\Setting::getValue('countbg')->value}}">
  <div class="container pt-120 pb-60">
    <!-- Section Content -->
    <div class="section-content">
      <div class="row"> 
        <div class="col-md-6">
          <h2 class="text-theme-colored2 font-36">{{$post->en_title}} Details</h2>
          <ol class="breadcrumb text-left mt-10 white">
            <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{url('/artical')}}">Articles</a></li>
            <li class="active">Article</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section: Blog -->
<section>
  <div class="container mt-30 mb-30 pt-30 pb-30">
    <div class="row">
      <div class="col-md-9 pull-right flip sm-pull-none">
        <div class="blog-posts single-post">
          <article class="post clearfix mb-0">
            <div class="entry-header">
              <div class="post-thumb thumb"> <img src="{{asset($post->big_image)}}" alt="" class="img-responsive img-fullwidth"> </div>
            </div>
            <div class="entry-content">
              <div class="entry-meta media no-bg no-border mt-15 pb-20">
                <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                  <ul>
                    <li class="font-16 text-white font-weight-600">{{$post->Category->en_name}}</li>
                    <li class="font-12 text-white text-uppercase"></li>
                  </ul>
                </div>
                <div class="media-body pl-15">
                  <div class="event-content pull-left flip">
                    <h3 class="entry-title text-white text-uppercase pt-0 mt-0"><a >{{$post->en_title}}</a></h3>
                    <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> {{$post->totalCommentsCount()}} Comments</span>
                  </div>
                </div>
              </div>
              <p class="mb-15">{{$post->en_content}}</p>
              <div class="mt-30 mb-0">
                <b>Author:</b>  {{$post->en_author}}
              </div>
            </div>
          </article>
          <div class="tagline p-0 pt-20 mt-5">
            <div class="row">
              <div class="col-md-8">
                <div class="tags">
                  <p class="mb-0"><i class="fa fa-tags text-theme-colored"></i> <span>Tags:</span> </p>
                    @php
                    $tagsDB = '';
                    if($post->tags){
                        $tags = explode(',', $post->tags);
                        $tagsDB = \DB::table("tags")->whereIn('id',$tags)->get();
                    }
                    @endphp
                    @if($tagsDB)
                        @foreach($tagsDB as $tag)
                            <span class="label label-default">{{$tag->en_name}}</span>
                        @endforeach
                    @endif
                </div>
              </div>

            </div>
          </div>
          <div class="comments-area">
            <h5 class="comments-title"> <i class="fa fa-comment text-theme-colored"></i> <span>Comments:</span> </h5>
            <ul class="comment-list">
              @foreach($post->comments as $comment)
              <li>
                <div class="media comment-author"> <a class="media-left user-img-thumb" href="#"><img class="media-object img-thumbnail " src="{{asset($comment->commented->image)}}" alt=""></a>
                  <div class="media-body">
                    <h5 class="media-heading comment-heading">{{$comment->commented->en_name}}:</h5>
                    <div class="comment-date">{{$comment->created_at->format('Y-M-d')}}</div>
                    <p>{{$comment->comment}}</p>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="comment-box">
            <div class="row">
              <div class="col-sm-12">
                <h5>Leave a Comment</h5>
                <div class="row">
                    @if(Auth::guard('admin')->check() || Auth::guard('instructor')->check()||Auth::guard('user')->check())
                    <form role="form" id="comment-form" method="post" action="{{url('post-comment/'.$post->id)}}">
                        @csrf
                        <div class="col-sm-12 pt-0 pb-0">
                   
                      <div class="form-group">
                        <textarea class="form-control" required name="comment" id="comment"  placeholder="Enter Your Comment" rows="7"></textarea>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="Please wait...">Submit</button>
                      </div>
                    </div>
                  </form>
                    @else
                        <span class="text-danger" style="padding-left: 10px;"> * You must logged in to make comment</span>
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sidebar sidebar-left mt-sm-30">
          
          <div class="widget">
            <h5 class="widget-title line-bottom">Categories</h5>
            <div class="categories">
              <ul class="list list-border angle-double-right">
                @foreach($category as $item)
                <li><a href="">{{$item->en_name}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="widget">
            <h5 class="widget-title line-bottom">Latest News</h5>
            <div class="latest-posts">
                @foreach(App\Post::orderBy('created_at','desc')->where('type','news')->whereNull('deleted_at')->take(3)->get() as $item)
                    <article class="post media-post clearfix pb-0 mb-10">
                        <a class="post-thumb post-img-thumb" href="{{url('/post-details/'.$item->id)}}"><img src="{{asset($item->thumb_image)}}" alt=""></a>
                        <div class="post-right">
                            <h5 class="post-title mt-0 mb-5"><a href="{{url('/post-details/'.$item->id)}}">{{$item->en_title}}</a></h5>
                            <p class="post-date mb-0 font-12">{{date('Y,M,d', strtotime($item->created_at))}}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 
<!-- Arabic Posts Details -->
@else
<!-- Section: inner-header -->
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/{{App\Setting::getValue('countbg')->value}}">
  <div class="container pt-120 pb-60">
    <!-- Section Content -->
    <div class="section-content">
      <div class="row"> 
        <div class="col-md-6">
          <h2 class="text-theme-colored2 font-36">{{$post->ar_title}} {{trans('app.Details')}}</h2>
          <ol class="breadcrumb pull-right mt-10 white">
            <li><a href="{{url('/')}}">{{trans('app.Home')}}</a></li>
              <li><a href="{{url('/artical')}}">{{trans('app.Articles')}}</a></li>
            <li class="active">{{trans('app.Article')}}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section: Blog -->
<section>
  <div class="container mt-30 mb-30 pt-30 pb-30">
    <div class="row">
      <div class="col-md-9 pull-right flip sm-pull-none">
        <div class="blog-posts single-post">
          <article class="post clearfix mb-0">
            <div class="entry-header">
              <div class="post-thumb thumb"> <img src="{{asset($post->big_image)}}" alt="" class="img-responsive img-fullwidth"> </div>
            </div>
            <div class="entry-content">
              <div class="entry-meta media no-bg no-border mt-15 pb-20">
                <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                  <ul>
                    <li class="font-16 text-white font-weight-600">{{$post->Category->ar_name}}</li>
                    <li class="font-12 text-white text-uppercase"></li>
                  </ul>
                </div>
                <div class="media-body pl-15">
                  <div class="event-content pull-left flip">
                    <h3 class="entry-title text-white text-uppercase pt-0 mt-0"><a >{{$post->ar_title}}</a></h3>
                    <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> {{$post->totalCommentsCount()}} {{trans('index.comments')}}</span>
                  </div>
                </div>
              </div>
              <p class="mb-15">{{$post->ar_content}}</p>
              <div class="mt-30 mb-0">
                <b>{{trans('app.Author')}}:</b>  {{$post->ar_author}}
              </div>
            </div>
          </article>
          <div class="tagline p-0 pt-20 mt-5">
            <div class="row">
              <div class="col-md-8">
                <div class="tags">
                  <p class="mb-0"><i class="fa fa-tags text-theme-colored"></i> <span>{{trans('app.Tags')}}:</span> </p>
                    @php
                    $tagsDB = '';
                    if($post->tags){
                        $tags = explode(',', $post->tags);
                        $tagsDB = \DB::table("tags")->whereIn('id',$tags)->get();
                    }
                    @endphp
                    @if($tagsDB)
                        @foreach($tagsDB as $tag)
                            <span class="label label-default">{{$tag->ar_name}}</span>
                        @endforeach
                    @endif
                </div>
              </div>

            </div>
          </div>
          <div class="comments-area">
            <h5 class="comments-title"> <i class="fa fa-comment text-theme-colored"></i> <span>{{trans('index.comments')}}:</span> </h5>
            <ul class="comment-list">
              @foreach($post->comments as $comment)
              <li>
                <div class="media comment-author"> <a class="media-left user-img-thumb" href="#"><img class="media-object img-thumbnail " src="{{asset($comment->commented->image)}}" alt=""></a>
                  <div class="media-body">
                    <h5 class="media-heading comment-heading">{{$comment->commented->ar_name}}:</h5>
                    <div class="comment-date">{{$comment->created_at->format('Y-M-d')}}</div>
                    <p>{{$comment->comment}}</p>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="comment-box">
            <div class="row">
              <div class="col-sm-12">
                <h5>{{trans('app.Leave a Comment')}}</h5>
                <div class="row">
                    @if(Auth::guard('admin')->check() || Auth::guard('instructor')->check()||Auth::guard('user')->check())
                    <form role="form" id="comment-form" method="post" action="{{url('post-comment/'.$post->id)}}">
                        @csrf
                        <div class="col-sm-12 pt-0 pb-0">
                   
                      <div class="form-group">
                        <textarea class="form-control" required name="comment" id="comment"  placeholder="أضف تعليقك..." rows="7"></textarea>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="انتظر...">{{trans('app.Submit')}}</button>
                      </div>
                    </div>
                  </form>
                    @else
                        <span class="text-danger" style="padding-left: 10px;"> * {{trans('app.cmsg')}}</span>
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sidebar sidebar-left mt-sm-30">
          
          <div class="widget">
            <h5 class="widget-title line-bottom">{{trans('app.Category')}}</h5>
            <div class="categories">
              <ul class="list list-border angle-double-right">
                @foreach($category as $item)
                <li><a href="">{{$item->ar_name}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="widget">
            <h5 class="widget-title line-bottom">{{trans('index.lastest')}} {{trans('index.news')}}</h5>
            <div class="latest-posts">
                @foreach(App\Post::orderBy('created_at','desc')->where('type','news')->whereNull('deleted_at')->take(3)->get() as $item)
                    <article class="post media-post clearfix pb-0 mb-10">
                        <a class="post-thumb post-img-thumb" href="{{url('/post-details/'.$item->id)}}"><img src="{{asset($item->thumb_image)}}" alt=""></a>
                        <div class="post-right">
                            <h5 class="post-title mt-0 mb-5"><a href="{{url('/post-details/'.$item->id)}}">{{$item->ar_title}}</a></h5>
                            <p class="post-date mb-0 font-12">{{date('Y,M,d', strtotime($item->created_at))}}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

@endsection

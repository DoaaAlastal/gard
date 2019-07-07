@extends('layouts.app')
@section('content')
@if(App::getlocale()=='en')
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="{{App\Setting::getValue('countbg')->en_value}}" style="background-image: url(&quot;http://placehold.it/1920x820&quot;);">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-theme-colored2 font-36">{{$page->en_title}}</h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a>Pages</a></li>
                            <li class="active">{{$page->en_title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container pt-70 pb-40">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="text-uppercase mt-0"><span class="text-theme-colored2">{{$page->en_title}}</span></h3>
                        <div class="double-line-bottom-theme-colored-2"></div>
                        <p class="mt-20">{{$page->en_content}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
<!-- Arabic About page -->
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="{{App\Setting::getValue('countbg')->en_value}}" style="background-image: url(&quot;http://placehold.it/1920x820&quot;);">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-theme-colored2 font-36">{{$page->ar_title}}</h2>
                        <ol class="breadcrumb pull-right mt-10 white">
                            <li><a href="{{url('/')}}">{{trans('app.Home')}}</a></li>
                            <li><a>{{trans('app.Pages')}}</a></li>
                            <li class="active">{{$page->ar_title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container pt-70 pb-40">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="text-uppercase mt-0"><span class="text-theme-colored2">{{$page->ar_title}}</span></h3>
                        <div class="double-line-bottom-theme-colored-2"></div>
                        <p class="mt-20">{{$page->ar_content}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
@endsection

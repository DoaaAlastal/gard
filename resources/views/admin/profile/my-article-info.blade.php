@extends('admin.layout.app')

@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Admin Dashboard
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="{{url('admin/')}}" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('admin/profile')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Profile
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('admin/profile/my-articles')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												My Articles
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
											<span class="m-nav__link-text">
												{{$article->en_title}}
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
        @include('admin.partials.profile-sidebar')
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active">
                                    <i class="flaticon-share m--hide"></i>
                                    My Articles  -  {{$article->en_title}}
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-portlet__nav-item--last">
                                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                    <a href="{{url('admin/profile/my-articles')}}" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                        <i class="la la-arrow-left"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="tab-content">
                    <div class="tab-pane active show " >
                        <div class="row" style="padding:20px">
                            <div class="col-xl-12">
                                <!--begin:: Widgets/Blog-->
                                <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                                    <div class="m-portlet__head m-portlet__head--fit">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-action">
                                                <button type="button" class="btn btn-sm m-btn--pill  btn-brand">
                                                    {{$article->Category->en_name}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div class="m-widget19">
                                            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                                                <img src="{{asset($article->big_image)}}" alt="">
                                                <h3 class="m-widget19__title m--font-light">
                                                    {{$article->en_title}}
                                                </h3>
                                                <div class="m-widget19__shadow"></div>
                                            </div>
                                            <div class="m-widget19__content">
                                                <div class="m-widget19__header">
                                                    <div class="m-widget19__info">
														<span class="m-widget19__username">
															{{$article->en_author}}
														</span>
                                                        <br>

                                                    </div>
                                                    <div class="m-widget19__stats" >
														<span class="m-widget19__number m--font-brand">
															{{$article->totalCommentsCount()}}
														</span>
                                                        <span class="m-widget19__comment">
															Comments
														</span>
                                                    </div>
                                                </div>
                                                <div class="m-widget19__body">
                                                    {{ $article->en_content }}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end:: Widgets/Blog-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

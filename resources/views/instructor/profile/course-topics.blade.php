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
                    <a href="{{url('instructor/profile/my-courses')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												My Courses
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
											<span class="m-nav__link-text">
												{{$course->en_title}}
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
                                <a class="nav-link m-tabs__link active">
                                    <i class="flaticon-share m--hide"></i>
                                    My Courses - {{$course->en_title}}
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show " >
                        <div class="row" style="padding:20px">
                             @foreach($course->topics as $topic)
                                <div class="col-xl-4">
                                    <!--begin:: Widgets/Blog-->
                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                                        <div class="m-portlet__head m-portlet__head--fit">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-action">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-portlet__body">
                                            <div class="m-widget19">
                                                <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                                                    <img src="{{asset($course->big_image)}}" alt="">
                                                    <div class="m-widget19__shadow"></div>
                                                </div>
                                                <div class="m-widget19__content" >
                                                    <div class="m-widget19__header">
                                                        <div class="m-widget19__info">
														<span class="m-widget19__username">
															{{$topic->en_title}}
														</span>
                                                            <br>
                                                        </div>

                                                    </div>
                                                    <div class="m-widget19__body" style="display: none">
                                                        {{ str_limit($topic->en_description, 150 , '...') }}
                                                    </div>
                                                </div>
                                                <div class="m-widget19__action">
                                                    <a href="{{$topic->video}}"><button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom intro__video" data-lity>
                                                            <span>Watch Video</span>
                                                            <i class="glyph-icon flaticon-visible"></i>
                                                        </button>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end:: Widgets/Blog-->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

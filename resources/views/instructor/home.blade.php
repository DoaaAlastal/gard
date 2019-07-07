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
                    <a href="{{url('instructor/')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Home
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
    <div class="m-portlet ">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Approved Courses
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
													Approved
												</span>
                            <span class="m-widget24__stats m--font-brand">
													{{$approved_courses}}
												</span>
                            <div class="m--space-10"></div>

                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Courses Requests
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
													Waiting Approvel
												</span>
                            <span class="m-widget24__stats m--font-brand">
													{{$requested_courses}}
												</span>
                            <div class="m--space-10"></div>

                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Feedbacks-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Approved Articles
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
													Approved
												</span>
                            <span class="m-widget24__stats m--font-info">
													{{$approved_posts}}
												</span>
                            <div class="m--space-10" style="padding-bottom: 35px;"></div>


                        </div>
                    </div>
                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Feedbacks-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Requested Articles
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
													Requested
												</span>
                            <span class="m-widget24__stats m--font-info">
													{{$requested_posts}}
												</span>
                            <div class="m--space-10" style="padding-bottom: 35px;"></div>


                        </div>
                    </div>
                    <!--end::New Feedbacks-->
                </div>
            </div>
        </div>
    </div>
@endsection

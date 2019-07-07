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
                    <a href="{{url('admin/')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Dashboard
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
                                Total Courses
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
													All Courses
												</span>
                            <span class="m-widget24__stats m--font-brand">
													{{$courses}}
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
                                Total Instructors
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
													All Instructors
												</span>
                            <span class="m-widget24__stats m--font-info">
													{{$instructors}}
												</span>
                            <div class="m--space-10" style="padding-bottom: 35px;"></div>


                        </div>
                    </div>
                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Orders-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Students
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
													All Students
												</span>
                            <span class="m-widget24__stats m--font-danger">
													{{$users}}
												</span>
                            <div class="m--space-10"></div>
                        </div>
                    </div>
                    <!--end::New Orders-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Users-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Total Events
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
													All Events
												</span>
                            <span class="m-widget24__stats m--font-success">
													{{$events}}
												</span>
                            <div class="m--space-10"></div>

                        </div>
                    </div>
                    <!--end::New Users-->
                </div>
            </div>
        </div>
    </div>
@endsection

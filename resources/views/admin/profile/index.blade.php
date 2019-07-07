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
												My Profile
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
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                    <i class="flaticon-share m--hide"></i>
                                    Personal Information
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                    Image
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                    Password
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show " id="m_user_profile_tab_1" >
                        <form class="m-form m-form--fit m-form--label-align-right" action="{{url('admin/profile/update-personal-info')}}" method="post">
                            {{ csrf_field() }}
                            <div class="m-portlet__body">
                                <div class="form-group{{ $errors->has('en_name') ? ' has-error' : '' }} m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">
                                        English Name
                                    </label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" name="en_name" value="{{Auth::guard('admin')->user()->en_name}}">
                                    </div>
                                    @if ($errors->has('en_name'))
                                        <span class="help-block col-md-12">
                                             <strong class="error-sms1">{{ $errors->first('en_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('ar_name') ? ' has-error' : '' }} m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">
                                        Arabic Name
                                    </label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" name="ar_name" value="{{Auth::guard('admin')->user()->ar_name}}">
                                    </div>
                                    @if ($errors->has('ar_name'))
                                        <span class="help-block col-md-12">
                                             <strong class="error-sms1">{{ $errors->first('ar_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">
                                        Email Address
                                    </label>
                                    <div class="col-7">
                                        <input class="form-control m-input"  name="email" type="email" value="{{Auth::guard('admin')->user()->email}}">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block col-md-12">
                                             <strong class="error-sms1">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">
                                        Phone No.
                                    </label>
                                    <div class="col-7">
                                        <input class="form-control m-input" name="phone" type="phone" value="{{Auth::guard('admin')->user()->phone}}">
                                    </div>
                                    @if ($errors->has('phone'))
                                        <span class="help-block col-md-12">
                                             <strong class="error-sms1">{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('en_address') ? ' has-error' : '' }} m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">
                                        English Address
                                    </label>
                                    <div class="col-7">
                                        <input class="form-control m-input" name="en_address" type="text" value="{{Auth::guard('admin')->user()->en_address}}">
                                    </div>
                                    <span class="help-block col-md-12">
                                        <strong class="error-sms1">{{ $errors->first('en_address') }}</strong>
                                    </span>
                                </div>
                                <div class="form-group{{ $errors->has('ar_address') ? ' has-error' : '' }} m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">
                                        Arabic Address
                                    </label>
                                    <div class="col-7">
                                        <input class="form-control m-input" name="ar_address" type="text" value="{{Auth::guard('admin')->user()->ar_address}}">
                                    </div>
                                    <span class="help-block col-md-12">
                                        <strong class="error-sms1">{{ $errors->first('ar_address') }}</strong>
                                    </span>
                                </div>

                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-7">
                                            <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                Save changes
                                            </button>
                                            &nbsp;&nbsp;

                                            <a class="btn btn-secondary m-btn m-btn--air m-btn--custom" href="/admin/">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="m_user_profile_tab_2">
                        <form class="m-form m-form--fit m-form--label-align-right" action="{{url('admin/profile/update-image')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">
                                        Change Image
                                    </label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="file"  name="image" >
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-7">
                                            <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                Save changes
                                            </button>
                                            &nbsp;&nbsp;

                                            <a class="btn btn-secondary m-btn m-btn--air m-btn--custom" href="/admin/">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="m_user_profile_tab_3">
                        <form class="m-form m-form--fit m-form--label-align-right" action="{{url('admin/profile/update-password')}}" method="post">
                            {{ csrf_field() }}
                            <div class="m-portlet__body">

                                <div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }} m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">
                                        Old Password
                                    </label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password" name="oldpassword" value="{{old('oldpassword')}}">
                                    </div>
                                    @if ($errors->has('oldpassword'))
                                        <span class="help-block col-md-12">
                                              <strong class="error-sms1">{{ $errors->first('oldpassword') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }} m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">
                                        New Password
                                    </label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password" name="newpassword" value="{{old('newpassword')}}">
                                    </div>
                                    @if ($errors->has('newpassword'))
                                        <span class="help-block col-md-12">
                                              <strong class="error-sms1">{{ $errors->first('newpassword') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('newpassword_confirmation ') ? ' has-error' : '' }} m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">
                                        Confirm Password
                                    </label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password"  name="newpassword_confirmation"   value="{{old('newpassword_confirmation')}}">
                                    </div>
                                    @if ($errors->has('newpassword_confirmation'))
                                        <span class="help-block col-md-12">
                                            <strong class="error-sms1">{{ $errors->first('newpassword_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-7">
                                            <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                Save changes
                                            </button>
                                            &nbsp;&nbsp;

                                            <a class="btn btn-secondary m-btn m-btn--air m-btn--custom" href="/admin/">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

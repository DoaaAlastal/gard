@extends('user.layout.auth')

@section('content')
@if(App::getlocale()=='en')

    <div class="main-content " >
        <!-- Section: home -->
        <section id="home" class="divider bg-lighter">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-push-3">
                                <div class="bg-lightest border-1px p-30 mb-0">
                                    <div class="text-center mb-60"><a href="#" class=""><img alt="" src="/{{App\Setting::getValue('logo')->en_value}}"></a></div>
                                    <h3 class="text-theme-colored mt-0 pt-5">{{trans('auth.student-Login')}} <span> <a href="{{url('instructor/login')}}"> {{trans('auth.login-as-instructor')}}</a></span></h3>
                                    <hr>
                                    <form name="login-form" class="clearfix" role="form" method="POST" action="{{ url('/student/login') }}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="form_username_email">Email</label>
                                                <input id="email" name="email" class="form-control" type="email" value="{{ old('email') }}" placeholder="Enter your Email Address">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password">Password</label>
                                                <input id="password" name="password" class="form-control" type="password" placeholder="Enter Your Password">
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <!--<div class="checkbox pull-left mt-15">-->
                                        <!--    <label for="form_checkbox">-->
                                        <!--        <input id="form_checkbox" name="form_checkbox" type="checkbox">-->
                                        <!--        Remember me </label>-->
                                        <!--</div>-->
                                        <div class="form-group pull-right mt-10">
                                            <button type="submit" class="btn btn-dark btn-sm">Login</button>
                                        </div>
                                        <div class="clear text-center pt-10">
                                            <a class="text-theme-colored font-weight-600 font-12" href="{{ url('/student/password/reset') }}">Forgot Your Password?</a>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @else
<div class="main-content " >
        <!-- Section: home -->
        <section id="home" class="divider">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-push-3">
                                <div class="bg-lightest border-1px p-30 mb-0">
                                    <div class="text-center mb-60"><a href="#" class=""><img alt="" src="/{{App\Setting::getValue('logo')->en_value}}"></a></div>
                                    <h3 class="text-theme-colored mt-0 pt-5" style="text-align:right;">{{trans('auth.student-Login')}} <span> <a href="{{url('instructor/login')}}"> {{trans('auth.login-as-instructor')}}</a></span></h3>
                                    <hr>
                                    <form name="login-form" class="clearfix" role="form" method="POST" action="{{ url('/student/login') }}">
                                        {{ csrf_field() }}
                                        <div class="row" style=" text-align: right;">
                                            <div class="form-group  col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="form_username_email">{{trans('auth.Email')}}</label>
                                                <input style=" text-align: right;" id="email" name="email" class="form-control" type="email" value="{{ old('email') }}" placeholder="أدخل البريد الالكتروني">
                                            </div>
                                        </div>
                                        <div class="row" style=" text-align: right;">
                                            <div class="form-group  col-md-12 {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password">{{trans('auth.Password')}}</label>
                                                <input style=" text-align: right;" id="password" name="password" class="form-control" type="password" placeholder="أدخل كلمة المرور">
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <!--<div class="checkbox pull-left mt-15">-->
                                        <!--    <label for="form_checkbox">-->
                                        <!--        <input id="form_checkbox" name="form_checkbox" type="checkbox">-->
                                        <!--        Remember me </label>-->
                                        <!--</div>-->
                                        <div class="form-group pull-left mt-10">
                                            <button type="submit" class="btn btn-dark btn-sm">{{trans('auth.Login')}}</button>
                                        </div>
                                        <div class="clear text-center pt-10">
                                            <a class="text-theme-colored font-weight-600 font-12" href="{{ url('/student/password/reset') }}">{{trans('auth.Forgot')}}</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endif
@endsection

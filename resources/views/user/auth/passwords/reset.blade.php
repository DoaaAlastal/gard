@extends('user.layout.auth')

@section('content')
@if(getlocale()=='en')
    <div class="main-content">
        <!-- Section: home -->
        <section id="home" class="divider bg-lighter">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-push-3">
                                <div class="bg-lightest border-1px p-30 mb-0">
                                    <div class="text-center mb-60"><a href="#" class=""><img alt="" src="/{{App\Setting::getValue('logo')->en_value}}"></a></div>
                                    <h4 class="text-theme-colored mt-0 pt-5"> Reset Password</h4>
                                    <hr>
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/password/reset') }}">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="row">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12 ">
                                                <label for="form_username_email">Email Address</label>
                                                <input id="email" name="email" class="form-control" type="email" value="{{ old('email') }}" placeholder="Enter your Email Address">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-12 ">
                                                <label for="password">Password</label>
                                                <input id="password" name="password" class="form-control" type="password" placeholder="Enter Your Password">
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group pull-right mt-10">
                                            <button type="submit" class="btn btn-dark btn-sm">Reset Password</button>
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
    <!-- Arabic Reset Password page -->
    @else
     <div class="main-content">
        <!-- Section: home -->
        <section id="home" class="divider bg-lighter">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-push-3">
                                <div class="bg-lightest border-1px p-30 mb-0">
                                    <div class="text-center mb-60"><a href="#" class=""><img alt="" src="/{{App\Setting::getValue('logo')->en_value}}"></a></div>
                                    <h4 class="text-theme-colored mt-0 pt-5" style="text-align:right;">{{trans('auth.Reset Password')}}</h4>
                                    <hr>
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/password/reset') }}">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="row" style="text-align:right;">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12 ">
                                                <label for="form_username_email">{{trans('auth.Email')}}</label>
                                                <input style="text-align:right;" id="email" name="email" class="form-control" type="email" value="{{ old('email') }}" placeholder="Enter your Email Address">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row"style="text-align:right;">
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-12 ">
                                                <label for="password">Password</label>
                                                <input style="text-align:right;" id="password" name="password" class="form-control" type="password" placeholder="Enter Your Password">
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password-confirm" class="col-md-4 control-label">{{trans('auth.Confirm Password')}}</label>
                                            <div class="col-md-6">
                                                <input style="text-align:right;" id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group pull-right mt-10">
                                            <button type="submit" class="btn btn-dark btn-sm">{{trans('auth.Reset Password')}}</button>
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

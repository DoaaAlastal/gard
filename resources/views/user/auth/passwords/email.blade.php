@extends('user.layout.auth')

<!-- Main Content -->
@section('content')
@if(App::getlocale()=='en')
    <div class="main-content">
        <!-- Section: home -->
        <section id="home" class="divider bg-lighter">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-push-3">
                                <div class="bg-lightest border-1px p-30 mb-0">
                                    <div class="text-center mb-60"><a href="{{url('/')}}" class=""><img alt="" src="/{{App\Setting::getValue('logo')->en_value}}"></a></div>
                                    <h4 class="text-theme-colored mt-0 pt-5"> Reset Password</h4>
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <hr>
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/password/email') }}">
                                        {{ csrf_field() }}


                                        <div class="row">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}  col-md-12">
                                                <label for="form_username_email">Email Address</label>
                                                <input id="email" name="email" class="form-control" type="email" value="{{ old('email') }}" placeholder="Enter your Email Address">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group pull-right mt-10">
                                            <button type="submit" class="btn btn-dark btn-sm">Send Password Reset Link</button>
                                        </div>
                                        <br/>

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
<div class="main-content">
        <!-- Section: home -->
        <section id="home" class="divider bg-lighter">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-push-3">
                                <div class="bg-lightest border-1px p-30 mb-0">
                                    <div class="text-center mb-60"><a href="{{url('/')}}" class=""><img alt="" src="/{{App\Setting::getValue('logo')->en_value}}"></a></div>
                                    <h4 class="text-theme-colored mt-0 pt-5" style="text-align:right;"> {{trans('auth.Reset Password')}}</h4>
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <hr>
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/password/email') }}">
                                        {{ csrf_field() }}


                                        <div class="row" style="text-align:right;">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}  col-md-12">
                                                <label for="form_username_email">{{trans('auth.Email')}}</label>
                                                <input style="text-align:right;" id="email" name="email" class="form-control" type="email" value="{{ old('email') }}" placeholder="أدخل بريدك الالكتروني">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group pull-left mt-10">
                                            <button type="submit" class="btn btn-dark btn-sm">{{trans('auth.Reset Link')}}</button>
                                        </div>
                                        <br/>

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

@extends('instructor.layout.auth')

@section('content')
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: url(/demo/assets/app/media/img//bg/bg-3.jpg);">
            <div class="m-login__wrapper-1 m-portlet-full-height">
                <div class="m-login__wrapper-1-1">
                    <div class="m-login__contanier">
                        <div class="m-login__content">
                            <div class="m-login__logo">
                                <a href="#">
                                    <img src="/demo/assets/app/media/img//logos/logo-2.png">
                                </a>
                            </div>
                            <div class="m-login__title">
                                <h3>
                                    JOIN OUR GREAT METRO COMMUNITY GET FREE ACCOUNT
                                </h3>
                            </div>
                            <div class="m-login__desc">
                                Amazing Stuff is Lorem Here.Grownng Team
                            </div>
                            <div class="m-login__form-action">
									<a href="{{url('instructor/register')}}">
                                        <button type="button" class="btn btn-outline-focus m-btn--pill">
                                            Get An Account
                                        </button>
                                    </a>
								</div>
                        </div>
                    </div>
                    <div class="m-login__border">
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="m-login__wrapper-2 m-portlet-full-height">
                <div class="m-login__contanier">
                    <div class="m-login__signin">
                        <div class="m-login__head">
                            <h3 class="m-login__title">
                                Instructor Dashboard Login
                            </h3>
                        </div>
                        <form class="m-login__form m-form" method="POST" action="{{ url('/instructor/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-form__group" >
                                <input id="email" style="padding-left: 15px;" type="email" class="form-control m-input" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="Email Address">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} m-form__group" >
                                <input style="padding-left: 15px;" class="form-control m-input m-login__form-input--last" type="Password" placeholder="Password" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="row m-login__form-sub">
                                <div class="col m--align-left">
                                    <label class="m-checkbox m-checkbox--focus">
                                        <input type="checkbox" name="remember">
                                        Remember me
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col m--align-right">
                                    <a href="javascript:;" id="m_login_forget_password" class="m-link">
                                        Forget Password ?
                                    </a>
                                </div>
                            </div>
                            <div class="m-login__form-action">
                                <button type="submit"  class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                    Sign In
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="m-login__forget-password">
                        <div class="m-login__head">
                            <h3 class="m-login__title">
                                Instructor Forgotten Password ?
                            </h3>
                            <div class="m-login__desc">
                                Enter your email to reset your password:
                            </div>
                        </div>
                        <form class="m-login__form m-form" method="POST" action="{{ url('/instructor/password/email') }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} m-form__group">
                                <input class="form-control m-input" type="text" placeholder="Email" name="email" id="email" value="{{ old('email') }}" autocomplete="off">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="m-login__form-action">
                                <button  class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                    Request
                                </button>
                                <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom ">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

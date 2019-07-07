@extends('instructor.layout.auth')

@section('content')
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: url(/demo/assets/app/media/img//bg/bg-3.jpg);">
            <div class="m-login__wrapper-1 m-portlet-full-height">
                <div class="m-login__wrapper-1-1" style="padding-top: 100px;">
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
                        </div>
                    </div>
                    <div class="m-login__border">
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="m-login__wrapper-2 m-portlet-full-height" >
                <div class="m-login__contanier">
                    <div class="m-login__signin" style="margin-top: -80px;">
                        <div class="m-login__head">
                            <h3 class="m-login__title">
                                Instructor Sign Up
                            </h3>
                            <div class="m-login__desc">
                                Enter your details to create your account:
                            </div>
                        </div>
                        <form class="m-login__form m-form"  role="form" method="POST" action="{{ url('/instructor/register') }}" name="register">
                            {{ csrf_field() }}
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text" placeholder="English Name" name="en_name" value="{{ old('en_name') }}">
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="email" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}">
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="password" placeholder="Password" name="password" value="{{ old('password') }}">
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="password_confirmation">
                            </div>
                            <div class="m-login__form-sub">
                                <label class="m-checkbox m-checkbox--focus">
                                    <input type="checkbox" name="agree">
                                    I Agree the
                                    <a href="#" class="m-link m-link--focus">
                                        terms and conditions
                                    </a>
                                    .
                                    <span></span>
                                </label>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="m-login__form-action">
                                <button type="submit" onclick="document.this.submit()" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                    Sign Up
                                </button>
                                <button id="m_login_signup_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">
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

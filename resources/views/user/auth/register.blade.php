@extends('user.layout.auth')

@section('content')
@if(App::getlocale()=='en')
    <!-- Start main-content -->
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
                                    <form id="job_apply_form" class=" register-form " role="form" method="POST" action="{{ url('/student/register') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="icon-box mb-0 p-0">
                                            <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                                                <i class="pe-7s-users"></i>
                                            </a>
                                            <h3 class="text-theme-colored mt-0 pt-5">{{trans('auth.student-register')}} <span> <a href="{{url('instructor/register')}}"> {{trans('auth.register-as-instructor')}}</a></span></h3>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label>Email Address</label>
                                                <input name="email" id="email" class="form-control" type="email" value="{{old('email') }}" placeholder="Enter your Email Address">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 {{ $errors->has('en_name') ? ' has-error' : '' }}">
                                                <label for="en_name">English Name</label>
                                                <input id="en_name" name="en_name" id="en_name" class="form-control" type="text" value="{{old('en_name')}}" placeholder="Enter English Name">
                                                @if ($errors->has('en_name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('en_name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 {{ $errors->has('ar_name') ? ' has-error' : '' }}">
                                                <label for="ar_name">Arabic Name</label>
                                                <input id="ar_name" name="ar_name" id="ar_name" class="form-control" type="text" value="{{old('ar_name')}}" placeholder="Enter Arabic Name">
                                                @if ($errors->has('ar_name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('ar_name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password"> Password</label>
                                                <input id="password" name="password" class="form-control" type="password" value="{{old('password')}}" placeholder="Enter your Password">
                                                @if ($errors->has('password'))
                                                    <span class="help-block col-md-12">
                             <strong class="error-sms">{{ $errors->first('password') }}</strong>
                           </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Re-enter Password</label>
                                                <input  name="password_confirmation" id="password-confirm" class="form-control" type="password" value="{{old('password')}}" placeholder="Enter Password Confirmation" >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6 {{ $errors->has('en_bio') ? ' has-error' : '' }}">
                                                <label for="en_bio"> English Bio</label>
                                                <textarea class="form-control m-input" id="en_bio" name="en_bio"  value="">{{old('en_bio')}}</textarea>
                                                @if ($errors->has('en_bio'))
                                                    <span class="help-block col-md-12">
                             <strong class="error-sms">{{ $errors->first('en_bio') }}</strong>
                           </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 {{ $errors->has('ar_bio') ? ' has-error' : '' }}">
                                                <label for="ar_bio"> Arabic Bio</label>
                                                <textarea class="form-control m-input" id="ar_bio" name="ar_bio"  value="">{{old('ar_bio')}}</textarea>
                                                @if ($errors->has('ar_bio'))
                                                    <span class="help-block col-md-12">
                             <strong class="error-sms">{{ $errors->first('ar_bio') }}</strong>
                           </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12 {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                                <label>Mobile</label>
                                                <input name="mobile" id="mobile" class="form-control" type="mobile" value="{{old('mobile')}}" placeholder="Enter Mobile">
                                                @if ($errors->has('mobile'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 {{ $errors->has('en_address') ? ' has-error' : '' }}">
                                                <label for="en_address">English Address</label>
                                                <input id="en_address" name="en_address" id="en_address" class="form-control" type="text" value="{{old('en_address')}}">
                                                @if ($errors->has('en_address'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('en_address') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6 {{ $errors->has('ar_address') ? ' has-error' : '' }}">
                                                <label for="ar_address">Arabic Address</label>
                                                <input id="ar_address" name="ar_address" id="ar_address" class="form-control" type="text" value="{{old('ar_address')}}">
                                                @if ($errors->has('ar_address'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('ar_address') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6 {{ $errors->has('country_id') ? ' has-error' : '' }}">
                                                <label for="country_id">Country</label>
                                                <select class="form-control required" id="country_id" name="country_id">
                                                    <option value=""> Select Country </option>
                                                    @foreach($country as $country)
                                                        <option {{old('country_id')==$country->id?"selected":""}} value='{{$country->id}}'>{{$country->en_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('country_id'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_id') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                                <label for="city_id">City</label>
                                                <select class="form-control required " id="city_id" name="city_id">
                                                    <option value=""> Select City </option>
                                                </select>
                                                @if ($errors->has('city_id'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-dark btn-lg btn-block mt-15" type="submit">Register Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        @else
<!-- Start main-content -->
<div class="main-content">
        <!-- Section: home -->
        <section id="home" class="divider ">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-push-3">
                                <div class="bg-lightest border-1px p-30 mb-0">
                                    <div class="text-center mb-60"><a href="#" class=""><img alt="" src="/{{App\Setting::getValue('logo')->en_value}}"></a></div>
                                    <form id="job_apply_form" class=" register-form " role="form" method="POST" action="{{ url('/student/register') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="icon-box mb-0 p-0">
                                            <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-right mb-0 ml-10">
                                                <i class="pe-7s-users"></i>
                                            </a>
                                            <h3 class="text-theme-colored mt-0 pt-5" style="text-align:right;">{{trans('auth.student-register')}} <span> <a href="{{url('instructor/register')}}"> {{trans('auth.register-as-instructor')}}</a></span></h3>
                                        </div>
                                        <hr>
                                        <div class="row" style="text-align:right;">
                                            <div class="form-group col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label>{{trans('auth.Email')}} </label>
                                                <input style="text-align:right;" name="email" id="email" class="form-control" type="email" value="{{old('email') }}" placeholder="البريد الالكتروني">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row" style="text-align:right;">
                                            <div class="form-group col-md-6 {{ $errors->has('en_name') ? ' has-error' : '' }}">
                                                <label for="en_name">{{trans('auth.English Name')}}</label>
                                                <input style="text-align:right;" id="en_name" name="en_name" id="en_name" class="form-control" type="text" value="{{old('en_name')}}" placeholder="الاسم بالانجليزية">
                                                @if ($errors->has('en_name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('en_name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 {{ $errors->has('ar_name') ? ' has-error' : '' }}">
                                                <label for="ar_name">{{trans('auth.Arabic Name')}}</label>
                                                <input style="text-align:right;" id="ar_name" name="ar_name" id="ar_name" class="form-control" type="text" value="{{old('ar_name')}}" placeholder="الاسم بالعربية">
                                                @if ($errors->has('ar_name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('ar_name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row" style="text-align:right;">
                                            <div class="form-group col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password"> {{trans('auth.Password')}}</label>
                                                <input style="text-align:right;" id="password" name="password" class="form-control" type="password" value="{{old('password')}}" placeholder="كلمة المرور">
                                                @if ($errors->has('password'))
                                                    <span class="help-block col-md-12">
                             <strong class="error-sms">{{ $errors->first('password') }}</strong>
                           </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>{{trans('auth.Re-enter Password')}}</label>
                                                <input style="text-align:right;" name="password_confirmation" id="password-confirm" class="form-control" type="password" value="{{old('password')}}" placeholder="تأكيد كلمة المرور" >
                                            </div>
                                        </div>

                                        <div class="row" style="text-align:right;">
                                            <div class="form-group col-md-6 {{ $errors->has('en_bio') ? ' has-error' : '' }}">
                                                <label for="en_bio"> {{trans('auth.English Bio')}}</label>
                                                <textarea style="text-align:right;" class="form-control m-input" id="en_bio" name="en_bio"  value="">{{old('en_bio')}}</textarea>
                                                @if ($errors->has('en_bio'))
                                                    <span class="help-block col-md-12">
                             <strong class="error-sms">{{ $errors->first('en_bio') }}</strong>
                           </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 {{ $errors->has('ar_bio') ? ' has-error' : '' }}">
                                                <label for="ar_bio"> {{trans('auth.Arabic Bio')}}</label>
                                                <textarea style="text-align:right;" class="form-control m-input" id="ar_bio" name="ar_bio"  value="">{{old('ar_bio')}}</textarea>
                                                @if ($errors->has('ar_bio'))
                                                    <span class="help-block col-md-12">
                             <strong class="error-sms">{{ $errors->first('ar_bio') }}</strong>
                           </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row" style="text-align:right;">
                                            <div class="form-group col-md-12 {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                                <label>{{trans('auth.Mobile')}}</label>
                                                <input style="text-align:right;" name="mobile" id="mobile" class="form-control" type="mobile" value="{{old('mobile')}}" placeholder="الجوال">
                                                @if ($errors->has('mobile'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row" style="text-align:right;">
                                            <div class="form-group col-md-6 {{ $errors->has('en_address') ? ' has-error' : '' }}">
                                                <label for="en_address">{{trans('auth.English Address')}}</label>
                                                <input style="text-align:right;" id="en_address" name="en_address" id="en_address" class="form-control" type="text" value="{{old('en_address')}}">
                                                @if ($errors->has('en_address'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('en_address') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6 {{ $errors->has('ar_address') ? ' has-error' : '' }}">
                                                <label for="ar_address">{{trans('auth.Arabic Address')}}</label>
                                                <input style="text-align:right;" id="ar_address" name="ar_address" id="ar_address" class="form-control" type="text" value="{{old('ar_address')}}">
                                                @if ($errors->has('ar_address'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('ar_address') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row" style="text-align:right;">
                                            <div class="form-group col-md-6 {{ $errors->has('country_id') ? ' has-error' : '' }}">
                                                <label for="country_id">{{trans('auth.Country')}}</label>
                                                <select class="form-control required" id="country_id" name="country_id">
                                                    <option value=""> اختر البلد </option>
                                                    @foreach($country as $country)
                                                        <option {{old('country_id')==$country->id?"selected":""}} value='{{$country->id}}'>{{$country->en_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('country_id'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_id') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                                <label for="city_id">{{trans('auth.City')}}</label>
                                                <select class="form-control required " id="city_id" name="city_id">
                                                    <option value=""> اختر المدينة </option>
                                                </select>
                                                @if ($errors->has('city_id'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-dark btn-lg btn-block mt-15" type="submit">{{trans('auth.Register Now')}}</button>
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
    <!-- end main-content -->
@endif
    </div>
    <!-- end main-content -->
@endsection
@section('js')
    <script type="text/javascript">
        $('select#country_id').change(function(){
            var countryId = $(this).val();
            $ciudaditems = $('.cityItems').remove();
            $.get("{{url('/cities/')}}/"+countryId, function(data){
                $.each(data, function(index, element){
                    $("select#city_id option[value='']").remove();
                    $('select#city_id').append('<option value="'+element.id+'" class="cityItems">'+element.en_name+'</option>')
                });
            }, 'json');
        });
    </script>
@endsection

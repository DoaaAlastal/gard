@extends('admin.layout.app')

@section('content')
    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                       Website Settings
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('admin/setting') }}" enctype="multipart/form-data">
            @csrf
            <div class="m-portlet__body">
                <div class="form-group {{ $errors->has('sitename') ? ' has-error' : '' }} m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Site Name</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="sitename" id="sitename" placeholder="Site Name" value="{{@$settings['sitename']}}">
                        @if ($errors->has('sitename'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('sitename') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }} m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Site Description</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea class="form-control m-input" rows="8" name="description" id="description" placeholder="Site Description">{{@$settings['description']}}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}  m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Site URL</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="url" class="form-control m-input" name="url" id="url" placeholder="Site URL" value="{{@$settings['url']}}">
                        @if ($errors->has('url'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('url') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Email</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="email" class="form-control m-input" name="email" id="email" placeholder="Email" value="{{@$settings['email']}}">
                        @if ($errors->has('email'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}  m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Logo</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="file" class="form-control m-input" name="logo" id="logo"  value="{{@$settings['logo']}}">
                        @if ($errors->has('logo'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('logo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}  m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Phone Number</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control m-input" name="phone" id="phone" placeholder="phone Number" value="{{@$settings['phone']}}">
                        @if ($errors->has('phone'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }} m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Mobile Number</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control m-input" name="mobile" id="mobile" placeholder="Mobile Number" value="{{@$settings['mobile']}}">
                        @if ($errors->has('mobile'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}  m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Facebook URL</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="url" class="form-control m-input" name="facebook" id="facebook" placeholder="Facebook URL" value="{{@$settings['facebook']}}">
                        @if ($errors->has('facebook'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('facebook') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('twitter') ? ' has-error' : '' }}  m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12"> Twitter URL</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="url" class="form-control m-input" name="twitter" id="twitter" placeholder="Twitter URL" value="{{@$settings['twitter']}}">
                        @if ($errors->has('twitter'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('twitter') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('linkedin') ? ' has-error' : '' }} m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">LinkedIn URL</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="url" class="form-control m-input" name="linkedin" id="linkedin" placeholder="Linkedin URL" value="{{@$settings['linkedin']}}">
                        @if ($errors->has('linkedin'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('linkedin') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('instagram') ? ' has-error' : '' }} m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Instagram URL</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="url" class="form-control m-input" name="instagram" id="instagram" placeholder="Instagram URL" value="{{@$settings['instagram']}}">
                        @if ($errors->has('instagram'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('instagram') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('keywords') ? ' has-error' : '' }} m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12"> Keywords</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="keywords" id="keywords" placeholder="gard,course,learn,..." value="{{@$settings['keywords']}}">
                        @if ($errors->has('keywords'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('keywords') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('signature') ? ' has-error' : '' }}  m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Admin signature</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="file" class="form-control m-input" name="signature" id="signature"  value="{{@$settings['signature']}}">
                        @if ($errors->has('signature'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('signature') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('definition_video') ? ' has-error' : '' }}  m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Definition video</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="url" class="form-control m-input" name="definition_video" id="definition_video" placeholder="definition video url" value="{{@$settings['definition_video']}}">
                        @if ($errors->has('definition_video'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('definition_video') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }} m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Location</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="location" id="location" placeholder="En location" value="{{@$settings['location']}}">
                        @if ($errors->has('location'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('location') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('ar_location') ? ' has-error' : '' }} m-form__group row">
                    <label class="col-form-label col-md-3 col-sm-12">Ar-Location</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="ar_location" id="ar_location" placeholder="Ar location" value="{{@$settings['ar_location']}}">
                        @if ($errors->has('ar_location'))
                            <span class="help-block col-md-12">
                                <strong class="error-sms">{{ $errors->first('ar_location') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>



            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="submit" class="btn btn-success">save</button>
                            <a  class="btn btn-secondary" href="{{ url('/admin/') }}">cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

    <!--end::Portlet-->
@endsection




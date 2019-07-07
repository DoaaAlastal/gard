@extends('admin.layout.app')
@section('content')

    <!-- BEGIN PAGE Body-->

    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Update Topic
                    </h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('admin/topic/update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$topic->id}}">
            <input type="hidden" name="course_id" value="{{$course->id}}">
            <div class="m-portlet__body">
                <div class="m-form__content">
                    <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="m_form_1_msg">
                        <div class="m-alert__icon">
                            <i class="la la-warning"></i>
                        </div>
                        <div class="m-alert__text">
                            Oh snap! Change a few things up and try submitting again.
                        </div>
                        <div class="m-alert__close">
                            <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('en_title') ? ' has-error' : '' }} m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        English Title
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="en_title" placeholder="Enter English Topic Title"  value="{{ $topic->en_title }}">
                        <span class="m-form__help">
												English Topic Title.
											</span>
                    </div>
                    @if ($errors->has('en_title'))
                        <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('en_title') }}</strong>
                                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('ar_title') ? ' has-error' : '' }} m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Arabic Title
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="ar_title" placeholder="Enter Arabic Topic Title"  value="{{ $topic->ar_title }}">
                        <span class="m-form__help">
												Arabic Topic Title.
											</span>
                    </div>
                    @if ($errors->has('ar_title'))
                        <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('ar_title') }}</strong>
                                        </span>
                    @endif
                </div>

                <div class="form-group m-form__group row{{ $errors->has('en_description') ? ' has-error' : '' }}">
                    <label for="en_description" class="col-form-label col-lg-3 col-sm-12">
                        English Description
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea class="form-control m-input" id="en_description" name="en_description" rows="3" value="">{{$topic->en_description}}</textarea>
                        @if ($errors->has('en_description'))
                            <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('en_description') }}</strong>
                                              </span>
                        @endif
                    </div>
                </div>

                <div class="form-group m-form__group row{{ $errors->has('ar_description') ? ' has-error' : '' }}">
                    <label for="ar_description" class="col-form-label col-lg-3 col-sm-12">
                        Arabic Description
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea class="form-control m-input" id="ar_description" name="ar_description" rows="3" value="">{{$topic->ar_description}}</textarea>
                        @if ($errors->has('ar_description'))
                            <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('ar_description') }}</strong>
                                              </span>
                        @endif
                    </div>
                </div>

                <div class="form-group m-form__group row {{ $errors->has('video') ? ' has-error' : '' }}">
                    <label for="video" class="col-form-label col-lg-3 col-sm-12">
                        Vedio URL
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input class="form-control m-input" type="url"  id="video" name="video" value="{{$topic->video}}" >
                    </div>
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" class="btn btn-success">
                                    Save
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="window.location='{{url('admin/course-topics/'.$course->id)}}'" >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!-- END PAGE Body-->
@endsection




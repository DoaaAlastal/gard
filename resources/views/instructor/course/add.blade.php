@extends('instructor.layout.app')

@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Course List
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="{{url('instructor/')}}" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a  class="m-nav__link">
											<span class="m-nav__link-text">
												System
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('admin/course')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Course
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('instructor/course/create')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Create
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

    <!-- BEGIN PAGE Body-->

        <div class="m-portlet">
		    	<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
                                 Add New Course
							</h3>
						</div>
				    </div>
			    </div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('instructor/course') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <input type="hidden" name="model_type" value="App\Instructor">
                                <input type="hidden" name="model_id" value="{{Auth::guard('instructor')->user()->id}}">
								<div class="m-portlet__body">
                                    <div class="form-group m-form__group row {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <label for="category_id" class="col-form-label col-lg-3 col-sm-12">
                                            Category
                                        </label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <select class="form-control m-input" id="category_id" name="category_id">
                                                <option value=""> Select Category </option>
                                                @foreach($categories as $category)
                                                    <option {{old('category_id')==$category->id?"selected":""}} value='{{$category->id}}'>{{$category->en_name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('category_id') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('ar_title') ? ' has-error' : '' }} m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">
                                            English Title
                                        </label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <input type="text" class="form-control m-input" name="en_title" placeholder="Enter English Course Title"  value="{{ old('en_title') }}">
                                            <span class="m-form__help">
												English Course Title.
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
                                            <input type="text" class="form-control m-input" name="ar_title" placeholder="Enter Arabic Course Title"  value="{{ old('ar_title') }}">
                                            <span class="m-form__help">
												Arabic Course Title.
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
                                            <textarea class="form-control m-input" id="en_description" name="en_description" rows="3" value="">{{old('en_description')}}</textarea>
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
                                            <textarea class="form-control m-input" id="ar_description" name="ar_description" rows="3" value="">{{old('ar_description')}}</textarea>
                                            @if ($errors->has('ar_description'))
                                                <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('ar_description') }}</strong>
                                              </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row{{ $errors->has('big_image') ? ' has-error' : '' }}">
                                        <label for="big_image" class="col-form-label col-lg-3 col-sm-12">
                                            Course Big Image
                                        </label>
                                        <div></div>
                                        <div class=" col-lg-4 col-md-9 col-sm-12">
                                            <input type="file" class="custom-file-input" id="big_image" name="big_image" value="{{ old('big_image') }}">
                                            <label class="custom-file-label" for="big_image">
                                                Choose file
                                            </label>

                                            @if ($errors->has('big_image'))
                                                <span class="help-block col-md-12" style="font-size:10pt;color:red">
                                            <strong>{{ $errors->first('big_image') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row{{ $errors->has('thumb_image') ? ' has-error' : '' }}">
                                        <label for="thumb_image" class="col-form-label col-lg-3 col-sm-12">
                                            Course Thumb Image
                                        </label>
                                        <div></div>
                                        <div class=" col-lg-4 col-md-9 col-sm-12">
                                            <input type="file" class="custom-file-input" id="thumb_image" name="thumb_image" value="{{ old('thumb_image') }}">
                                            <label class="custom-file-label" for="thumb_image">
                                                Choose file
                                            </label>

                                            @if ($errors->has('thumb_image'))
                                                <span class="help-block col-md-12" style="font-size:10pt;color:red">
                                                  <strong>{{ $errors->first('thumb_image') }}</strong>
                                                  </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="course_attachments" class="col-form-label col-lg-3 col-sm-12">
                                            Course Attachments
                                        </label>
                                        <div></div>
                                        <div class=" col-lg-4 col-md-9 col-sm-12">
                                            <input type="file" multiple="multiple" class="custom-file-input" id="course_attachments[]" name="course_attachments[]" value="{{ old('course_attachments') }}">
                                            <label class="custom-file-label" for="course_attachments">
                                                Uploads file
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row {{ $errors->has('tags') ? ' has-error' : '' }}">
                                        <label class="col-form-label col-lg-3 col-sm-12">
                                            Tags
                                        </label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <select class="form-control m-bootstrap-select m_selectpicker" name="tags[]" id="tags[]" multiple>
                                                @foreach($tags as $tag)
                                                    <option {{old('tags')==$tag->id?"selected":""}} value='{{$tag->id}}'>{{$tag->en_name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('tags'))
                                                <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('tags') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row {{ $errors->has('price') ? ' has-error' : '' }}">
                                        <label for="price" class="col-form-label col-lg-3 col-sm-12">
                                            Price
                                        </label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <input class="form-control m-input" type="number" step="0.1" name="price" value="{{old('price')}}" id="price">
                                            @if ($errors->has('price'))
                                                <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('price') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row {{ $errors->has('discount') ? ' has-error' : '' }}">
                                        <label for="discount" class="col-form-label col-lg-3 col-sm-12">
                                            Discount
                                        </label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <input class="form-control m-input" type="number" name="discount" value="{{old('discount')}}" id="discount">
                                            @if ($errors->has('discount'))
                                                <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('discount') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row {{ $errors->has('currency_id') ? ' has-error' : '' }}">
                                        <label for="currency_id" class="col-form-label col-lg-3 col-sm-12">
                                            Course Currency
                                        </label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <select class="form-control m-input" id="currency_id" name="currency_id">
                                                <option value=""> Select Currency </option>
                                                @foreach($currencies as $currency)
                                                    <option {{old('currency_id')==$currency->id?"selected":""}} value='{{$currency->id}}'>{{$currency->en_name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('currency_id'))
                                                <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('currency_id') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row {{ $errors->has('number_of_hours') ? ' has-error' : '' }}">
                                        <label for="number_of_hours" class="col-form-label col-lg-3 col-sm-12">
                                            Number of Hour
                                        </label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <input class="form-control m-input" type="number" name="number_of_hours" value="{{old('number_of_hours')}}" id="number_of_hours">
                                            @if ($errors->has('number_of_hours'))
                                                <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('number_of_hours') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row {{ $errors->has('number_of_videos') ? ' has-error' : '' }}">
                                        <label for="number_of_videos" class="col-form-label col-lg-3 col-sm-12">
                                            Number of Video
                                        </label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <input class="form-control m-input" type="number" name="number_of_videos" value="{{old('number_of_videos')}}" id="number_of_videos">
                                            @if ($errors->has('number_of_videos'))
                                                <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('number_of_videos') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row{{ $errors->has('IsClosed') ? ' has-error' : '' }}">
                                        <div class=" m-checkbox-list ">
                                            <label class="m-checkbox m-checkbox--state-primary">
                                                <input type='hidden' value="0" name="IsClosed"/>
                                                <input {{old('IsClosed')?"checked":""}} type="checkbox" name="IsClosed" id="IsClosed" value="1">
                                                Is Closed
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions m-form__actions">
										<div class="row">
											<div class="col-lg-9 ml-lg-auto">
												<button type="submit" class="btn btn-success">
													Save
												</button>
												<a class="btn btn-secondary" href="{{url('/instructor/course')}}">Cancel</a>
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
@section('js')
<!--begin::Page Resources -->
<script src="/demo/assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="/demo/assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>

<!--end::Page Resources -->
		@endsection



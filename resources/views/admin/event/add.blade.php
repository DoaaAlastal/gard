@extends('admin.layout.app')
@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Add Event
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
                    <a  class="m-nav__link">
											<span class="m-nav__link-text">
												Main Componants
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('admin/event')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Events
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('admin/event/create')}}" class="m-nav__link">
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
                                 Add New Event
							</h3>
						</div>
				    </div>
			    </div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('admin/event') }}" enctype="multipart/form-data">
                            {{ csrf_field() }} 
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
									<div class="form-group{{ $errors->has('ar_title') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
										English Title
										</label>
									<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="en_title" placeholder="Enter English Event Title"  value="{{ old('en_title') }}">
											<span class="m-form__help">
												English Event Title.
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
											<input type="text" class="form-control m-input" name="ar_title" placeholder="Enter Arabic Event Title"  value="{{ old('ar_title') }}">
											<span class="m-form__help">
												Arabic Event Title.
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
									Event Big Image
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
									Event Thumb Image
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

									<div class="form-group m-form__group row{{ $errors->has('en_location') ? ' has-error' : '' }}">
												<label for="en_location" class="col-form-label col-lg-3 col-sm-12">
													English location
												</label>
												<div class="col-lg-4 col-md-9 col-sm-12">
												<textarea class="form-control m-input" id="en_location" name="en_location" rows="3" value="">{{old('en_location')}}</textarea>
												@if ($errors->has('en_location'))
                                               <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('en_location') }}</strong>
                                              </span>
												@endif
                                             </div>
									</div>

									<div class="form-group m-form__group row{{ $errors->has('ar_location') ? ' has-error' : '' }}">
												<label for="ar_description" class="col-form-label col-lg-3 col-sm-12">
													Arabic Location
												</label>
												<div class="col-lg-4 col-md-9 col-sm-12">
												<textarea class="form-control m-input" id="ar_location" name="ar_location" rows="3" value="">{{old('ar_location')}}</textarea>
												@if ($errors->has('ar_location'))
                                               <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('ar_location') }}</strong>
                                              </span>
												@endif
                                            </div>
									</div>
									
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											Event Start Time
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<div class="input-group date">
												<input type="text" class="form-control m-input"  name="start_at" readonly placeholder="Select date & time" id="m_datetimepicker_2" value="{{old('start_at')}}"/>
												<div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-calendar-check-o glyphicon-th"></i>
													</span>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											Event End Time
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<div class="input-group date">
												<input type="text" class="form-control m-input"  name="end_at" readonly placeholder="Select date & time" id="m_datetimepicker_2" value="{{old('end_at')}}"/>
												<div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-calendar-check-o glyphicon-th"></i>
													</span>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group m-form__group row {{ $errors->has('video') ? ' has-error' : '' }}">
											<label for="video" class="col-form-label col-lg-3 col-sm-12">
												Video URL
											</label>
											<div class="col-lg-4 col-md-9 col-sm-12">
												<input class="form-control m-input" type="url"  id="video" name="video" value="{{old('video')}}" >
											</div>
										</div>
                  <div class="form-group m-form__group row {{ $errors->has('IsOnline') ? ' has-error' : '' }}">
										<div class=" m-checkbox-list ">
												<label class="m-checkbox m-checkbox--state-primary">
												<input type='hidden' value='0' name='IsOnline'/>
												<input {{old('IsOnline')?"checked":""}} type="checkbox" name="IsOnline" id="IsOnline" value="1">
																		Is Online
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
												<a class="btn btn-secondary" href="/admin/event">Cancel</a>
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



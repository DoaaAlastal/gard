@extends('admin.layout.app')
@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Add @if($type=='news') News @elseif($type=='articles') Article @endif
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
                    <a href="{{url('admin/posts/'.$type)}}" class="m-nav__link">
											<span class="m-nav__link-text" style="text-transform: capitalize">
												{{$type}}
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
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
							<h3 class="m-portlet__head-text" >
                                 Add New @if($type=='news') News @elseif($type=='articles') Article @endif
							</h3>
						</div>
				    </div>
			    </div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('admin/posts') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <input type="hidden" name="model_type" value="App\Admin">
                                <input type="hidden" name="model_id" value="{{Auth::guard('admin')->user()->id}}">
								<div class="m-portlet__body">
                                    <input type="hidden" name="type" value="{{$type}}">
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



									
									<div class="form-group{{ $errors->has('en_author') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
										English Author
										</label>
									<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="en_author" placeholder="Enter English Post Author"  value="{{ old('en_author') }}">
											<span class="m-form__help">
												English Post Author.
											</span>
                                        </div>
                                        @if ($errors->has('en_author'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('en_author') }}</strong>
                                        </span>
                                @endif
									</div>

									<div class="form-group{{ $errors->has('ar_author') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
										Arabic Author
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="ar_author" placeholder="Enter Arabic Post Author"  value="{{ old('ar_author') }}">
											<span class="m-form__help">
												Arabic Post Author.
											</span>
                                        </div>
                                        @if ($errors->has('ar_author'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('ar_author') }}</strong>
                                        </span>
                                @endif
									</div>

									<div class="form-group{{ $errors->has('en_title') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
										English Title
										</label>
									<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="en_title" placeholder="Enter English Post Title"  value="{{ old('en_title') }}">
											<span class="m-form__help">
												English Post Title.
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
											<input type="text" class="form-control m-input" name="ar_title" placeholder="Enter Arabic Post Title"  value="{{ old('ar_title') }}">
											<span class="m-form__help">
												Arabic Post Title.
											</span>
                                        </div>
                                        @if ($errors->has('ar_title'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('ar_title') }}</strong>
                                        </span>
                                @endif
									</div>

									<div class="form-group m-form__group row{{ $errors->has('en_content') ? ' has-error' : '' }}">
												<label for="en_content" class="col-form-label col-lg-3 col-sm-12">
													English Content
												</label>
												<div class="col-lg-4 col-md-9 col-sm-12">
												<textarea class="form-control m-input" id="en_content" name="en_content" rows="3" value="">{{old('en_content')}}</textarea>
												@if ($errors->has('en_content'))
                                               <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('en_content') }}</strong>
                                              </span>
												@endif
                                             </div>
									</div>

									<div class="form-group m-form__group row{{ $errors->has('ar_content') ? ' has-error' : '' }}">
												<label for="ar_content" class="col-form-label col-lg-3 col-sm-12">
													Arabic Content
												</label>
												<div class="col-lg-4 col-md-9 col-sm-12">
												<textarea class="form-control m-input" id="ar_content" name="ar_content" rows="3" value="">{{old('ar_content')}}</textarea>
												@if ($errors->has('ar_content'))
                                               <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('ar_content') }}</strong>
                                              </span>
												@endif
                                            </div>
									</div>
                                    
									<div class="form-group m-form__group row{{ $errors->has('big_image') ? ' has-error' : '' }}">
								<label for="big_image" class="col-form-label col-lg-3 col-sm-12">
									Big Image
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
									Thumb Image
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



									<div class="form-group m-form__group row {{ $errors->has('video') ? ' has-error' : '' }}">
											<label for="video" class="col-form-label col-lg-3 col-sm-12">
												Video URL
											</label>
											<div class="col-lg-4 col-md-9 col-sm-12">
												<input class="form-control m-input" type="url"  id="video" name="video" value="{{old('video')}}" >
											</div>
										</div>
            
								
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions m-form__actions">
										<div class="row">
											<div class="col-lg-9 ml-lg-auto">
												<button type="submit" class="btn btn-success">
													Save
												</button>
												<a class="btn btn-secondary" href="/admin/posts/{{$type}}">Cancel</a>
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



@extends('admin.layout.app')
@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Add Category
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
                    <a href="{{url('admin/category')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Categories
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
							<h3 class="m-portlet__head-text">
                                 Add New Category
							</h3>
						</div>
				    </div>
			    </div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('admin/category') }}" enctype="multipart/form-data">
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
									<div class="form-group{{ $errors->has('en_name') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											English Name
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="en_name" placeholder="Enter English Category Name"  value="{{ old('en_name') }}">
											<span class="m-form__help">
												English Category Name.
											</span>
                                        </div>
                                        @if ($errors->has('en_name'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('en_name') }}</strong>
                                        </span>
                                @endif
									</div>
                                    
                                    <div class="form-group{{ $errors->has('ar_name') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											Arabic Name
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="ar_name" placeholder="Enter Arabic Category Name"  value="{{ old('ar_name') }}">
											<span class="m-form__help">
                                            Arabic Category Name.
											</span>
                                        </div>
                                        @if ($errors->has('ar_name'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('ar_name') }}</strong>
                                        </span>
																@endif
																
									</div>

									<div class="form-group m-form__group row {{ $errors->has('parent_id') ? ' has-error' : '' }}">
												<label for="parent_id" class="col-form-label col-lg-3 col-sm-12">
													Parent Value
												</label>
												<div class="col-lg-4 col-md-9 col-sm-12">
												<select class="form-control m-input" id="parent_id" name="parent_id">
												<option value=""> Select Parent </option>
                              @foreach($categories as $category)
                               <option {{old('parent_id')==$category->id?"selected":""}} value='{{$category->id}}'>{{$category->en_name}}</option>
                            @endforeach
												</select>
												@if ($errors->has('parent_id'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('parent_id') }}</strong>
                                        </span>
																@endif
                      </div>
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
                                    
									<div class="form-group m-form__group row{{ $errors->has('image') ? ' has-error' : '' }}">
								<label for="image" class="col-form-label col-lg-3 col-sm-12">
									Category Image
								</label>
								<div></div>
								<div class=" col-lg-4 col-md-9 col-sm-12">
									<input type="file" class="custom-file-input" id="image" name="image" value="{{ old('image') }}">
									<label class="custom-file-label" for="image">
										Choose file
									</label>
								
								@if ($errors->has('image'))
                                            <span class="help-block col-md-12" style="font-size:10pt;color:red">
                                            <strong>{{ $errors->first('image') }}</strong>
                                            </span>
										@endif
										</div>
							</div>

							<div class="form-group m-form__group row{{ $errors->has('icon') ? ' has-error' : '' }}">
								<label for="icon" class="col-form-label col-lg-3 col-sm-12">
									Category Icon
								</label>
								<div></div>
								<div class=" col-lg-4 col-md-9 col-sm-12">
									<input type="file" class="custom-file-input" id="icon" name="icon" value="{{ old('icon') }}">
									<label class="custom-file-label" for="icon">
										Choose file
									</label>
								
								@if ($errors->has('icon'))
                  <span class="help-block col-md-12" style="font-size:10pt;color:red">
                  <strong>{{ $errors->first('icon') }}</strong>
                  </span>
								@endif
										</div>
							</div>
								
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions m-form__actions">
										<div class="row">
											<div class="col-lg-9 ml-lg-auto">
												<button type="submit" class="btn btn-success">
													Save
												</button>
												<a class="btn btn-secondary" href="/admin/category">Cancel</a>
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




@extends('admin.layout.app')
@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Edit Admin
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
                    <a class="m-nav__link">
											<span class="m-nav__link-text">
												Users
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('admin/admin')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Admin
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
											<span class="m-nav__link-text">
												Edit Admin
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
                                 Update Admin
							</h3>
						</div>
				    </div>
			    </div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('admin/admin/'.$admin->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }} 
                            <input type="hidden" name="id" value="{{$admin->id}}">
								<div class="m-portlet__body">
									<div class="form-group m-form__group row{{ $errors->has('email') ? ' has-error' : '' }}">
												<label for="email" class="col-form-label col-lg-3 col-sm-12">
													Email address
												</label>
												<div class="col-lg-4 col-md-9 col-sm-12">
												<input type="email" class="form-control m-input" id="email"  placeholder="Enter email" name='email' value="{{ $admin->email }}" >
											 </div>
											 @if ($errors->has('email'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('email') }}</strong>
                                        </span>
																@endif
											</div>
											<div class="form-group{{ $errors->has('en_job_title') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											English Job Tiltle
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="en_job_title" placeholder="Enter English  Job Tiltle"  value="{{ $admin->en_job_title }} ">
                                        </div>
                                        @if ($errors->has('en_job_title'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('en_job_title') }}</strong>
                                        </span>
                                @endif
							  </div>
                                    
                <div class="form-group{{ $errors->has('ar_job_title') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											Arabic Job Tiltle
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="ar_job_title" placeholder="Enter Arabic Job Tiltle"  value="{{ $admin->ar_job_title }} ">
											<span class="m-form__help">
                                            Arabic Job Tiltle.
											</span>
                                        </div>
                                        @if ($errors->has('ar_job_title'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('ar_job_title') }}</strong>
                                        </span>
																@endif
																
									</div>

					<div class="form-group m-form__group row{{ $errors->has('en_bio') ? ' has-error' : '' }}">
                                        <label for="en_bio" class="col-form-label col-lg-3 col-sm-12">
                                            English Bio
                                        </label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <textarea class="form-control m-input" id="en_bio" name="en_bio" value="">{{ $admin->en_bio }}</textarea>
                                            @if ($errors->has('en_bio'))
                                                <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('en_bio') }}</strong>
                                              </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row{{ $errors->has('ar_bio') ? ' has-error' : '' }}">
                                        <label for="ar_bio" class="col-form-label col-lg-3 col-sm-12">
                                            Arabic Bio
                                        </label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <textarea class="form-control m-input" id="ar_bio" name="ar_bio"  value="">{{ $admin->ar_bio }} </textarea>
                                            @if ($errors->has('ar_bio'))
                                                <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('ar_bio') }}</strong>
                                              </span>
                                            @endif
                                        </div>
                                    </div>
											<div class="form-group{{ $errors->has('en_address') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											English Address
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="en_address" placeholder="Enter English address"  value="{{ $admin->en_address }}">
											<span class="m-form__help">
												English Address.
											</span>
                                        </div>
                                        @if ($errors->has('en_address'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('en_address') }}</strong>
                                        </span>
                                @endif
							  </div>
                                    
                <div class="form-group{{ $errors->has('ar_address') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											Arabic Address
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="ar_address" placeholder="Enter Arabic Address"  value="{{ $admin->ar_address}}">
											<span class="m-form__help">
                                            Arabic Address.
											</span>
                                        </div>
                                        @if ($errors->has('ar_address'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('ar_address') }}</strong>
                                        </span>
																@endif
																
									</div>

									<div class="form-group m-form__group row {{ $errors->has('phone') ? ' has-error' : '' }}">
												<label for="password" class="col-form-label col-lg-3 col-sm-12">
												Phone
												</label>
												<div class="col-lg-4 col-md-9 col-sm-12">
												<input type="text" class="form-control m-input" id="phone" name="phone" placeholder="Enter Phone Number" value="{{$admin->phone}}">
											</div>
											@if ($errors->has('phone'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('phone') }}</strong>
                                        </span>
                                @endif
					</div>
					<div class="form-group m-form__group row {{ $errors->has('facebook') ? ' has-error' : '' }}">
											<label for="facebook" class="col-form-label col-lg-3 col-sm-12">
											Facebook Link
											</label>
											<div class="col-lg-4 col-md-9 col-sm-12">
												<input class="form-control m-input" type="url"  id="facebook" name="facebook" value="{{$admin->facebook}}" >
											</div>
										</div>

								<div class="form-group m-form__group row {{ $errors->has('twitter') ? ' has-error' : '' }}">
											<label for="twitter" class="col-form-label col-lg-3 col-sm-12">
											Twitter Link
											</label>
											<div class="col-lg-4 col-md-9 col-sm-12">
												<input class="form-control m-input" type="url"  id="twitter" name="twitter" value="{{$admin->twitter}}" >
											</div>
										</div>

								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions m-form__actions">
										<div class="row">
											<div class="col-lg-9 ml-lg-auto">
												<button type="submit" class="btn btn-success">
													Save
												</button>
												<a class="btn btn-secondary" href="/admin/admin">Cancel</a>
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




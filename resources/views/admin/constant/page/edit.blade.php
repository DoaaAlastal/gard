@extends('admin.layout.app')
@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Edit Static Page
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
												Constant
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('admin/page')}}"  class="m-nav__link">
											<span class="m-nav__link-text">
												Static Pages
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
											<span class="m-nav__link-text">
												{{$page->en_name}}
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
                                 Update Page
							</h3>
						</div>
				    </div>
			    </div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('admin/page/'.$page->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }} 

                            <input type="hidden" name="id" value="{{$page->id}}">
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
											<input type="text" class="form-control m-input" name="en_name" placeholder="Enter English Page Name"  value="{{ $page->en_name }}">
											<span class="m-form__help">
												English Page Name.
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
											<input type="text" class="form-control m-input" name="ar_name" placeholder="Enter Arabic Page Name"  value="{{ $page->ar_name }}">
											<span class="m-form__help">
                                            Arabic Page Name.
											</span>
                                        </div>
                                        @if ($errors->has('ar_name'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('ar_name') }}</strong>
                                        </span>
                                @endif
									</div>
									<div class="form-group{{ $errors->has('en_title') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											English Title
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="en_title" placeholder="Enter English Page Title"  value="{{ $page->en_title }}">
											<span class="m-form__help">
												English Page Title.
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
											<input type="text" class="form-control m-input" name="ar_title" placeholder="Enter Arabic Page Title"  value="{{ $page->ar_title }}">
											<span class="m-form__help">
												Arabic Page Title.
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
												<textarea class="form-control m-input" id="en_content" name="en_content" rows="20" value="">{{$page->en_content}}</textarea>
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
												<textarea class="form-control m-input" id="ar_content" name="ar_content" rows="20" value="">{{$page->ar_content}}</textarea>
												@if ($errors->has('ar_content'))
                                               <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('ar_content') }}</strong>
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
												<a class="btn btn-secondary" href="/admin/page">Cancel</a>
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




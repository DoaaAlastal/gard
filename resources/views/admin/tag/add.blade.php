@extends('admin.layout.app')
@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Add Tag
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
                    <a href="{{url('admin/tag')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Tags
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
                                 Add New Tag
							</h3>
						</div>
				    </div>
			    </div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('admin/tag') }}">
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
											<input type="text" class="form-control m-input" name="en_name" placeholder="Enter English Tag Name"  value="{{ old('en_name') }}">
											<span class="m-form__help">
												English Tag Name.
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
											<input type="text" class="form-control m-input" name="ar_name" placeholder="Enter Arabic Tag Name"  value="{{ old('ar_name') }}">
											<span class="m-form__help">
                                            Arabic Tag Name.
											</span>
                                        </div>
                                        @if ($errors->has('ar_name'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('ar_name') }}</strong>
                                        </span>
                                @endif
									</div>
								
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions m-form__actions">
										<div class="row">
											<div class="col-lg-9 ml-lg-auto">
												<button type="submit" class="btn btn-success">
													Save
												</button>
												<a class="btn btn-secondary" href="/admin/tag">Cancel</a>
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




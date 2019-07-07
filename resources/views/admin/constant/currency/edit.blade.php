@extends('admin.layout.app')
@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Edit Currency
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
                    <a href="{{url('admin/currencies')}}"  class="m-nav__link">
											<span class="m-nav__link-text">
												Currencies
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
											<span class="m-nav__link-text">
												{{$currency->en_name}}
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
                                 Update Currency
							</h3>
						</div>
				    </div>
			    </div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('admin/currencies/'.$currency->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$currency->id}}">
								<div class="m-portlet__body">
									<div class="form-group{{ $errors->has('en_name') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
											English Name
										</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input type="text" class="form-control m-input" name="en_name" placeholder="Enter English Currency Name"  value="{{$currency->en_name}}">
											<span class="m-form__help">
												English Currency Name.
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
											<input type="text" class="form-control m-input" name="ar_name" placeholder="Enter Arabic Currency Name"  value="{{$currency->ar_name}}">
											<span class="m-form__help">
                                            Arabic Currency Name.
											</span>
                                        </div>
                                        @if ($errors->has('ar_name'))
                                    <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('ar_name') }}</strong>
                                        </span>
                                @endif
									</div>

                                    <div class="form-group{{ $errors->has('sign') ? ' has-error' : '' }} m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">
                                            Sign
                                        </label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <input type="text" class="form-control m-input" name="sign" placeholder="Enter Currency Sign"  value="{{$currency->sign}}">
                                            <span class="m-form__help">
												Currency Sign.
											</span>
                                        </div>
                                        @if ($errors->has('sign'))
                                            <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('sign') }}</strong>
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
												<a class="btn btn-secondary" href="/admin/currencies">Cancel</a>
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




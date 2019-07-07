@extends('instructor.layout.app')
@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Add Support Ticket
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
                    <a href="{{url('support/instructor-support-ticket')}}" class="m-nav__link">
											<span class="m-nav__link-text" style="text-transform: capitalize">
												My Tickets
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
                                 Add New Ticket
							</h3>
						</div>
				    </div>
			    </div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('instructor/support/send-ticket') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <input type="hidden" name="sender_type" value="App\Instructor">
                                <input type="hidden" name="sender_id" value="{{Auth::guard('instructor')->user()->id}}">
								<div class="m-portlet__body">
									<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }} m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12">
										Ticket Subject
										</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <input type="text" class="form-control m-input" name="subject" placeholder="Enter Ticket Subject"  value="{{ old('subject') }}">
                                        </div>
                                        @if ($errors->has('subject'))
                                        <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('subject') }}</strong>
                                        </span>
                                        @endif
									</div>

                                    <div class="form-group m-form__group row{{ $errors->has('content') ? ' has-error' : '' }}">
												<label for="en_content" class="col-form-label col-lg-3 col-sm-12">
													Content
												</label>
												<div class="col-lg-4 col-md-9 col-sm-12">
												<textarea class="form-control m-input" id="content" name="content" rows="8" value="">{{old('content')}}</textarea>
												@if ($errors->has('content'))
                                               <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('content') }}</strong>
                                              </span>
												@endif
                                             </div>
									</div>
							<div class="form-group m-form__group row{{ $errors->has('attachment') ? ' has-error' : '' }}">
								<label for="attachment" class="col-form-label col-lg-3 col-sm-12">
									Image
								</label>
								<div></div>
								<div class=" col-lg-4 col-md-9 col-sm-12">
									<input type="file" class="custom-file-input" id="attachment" name="attachment" value="{{ old('attachment') }}">
									<label class="custom-file-label" for="attachment">
										Choose file
									</label>
                                    @if ($errors->has('attachment'))
                                      <span class="help-block col-md-12" style="font-size:10pt;color:red">
                                      <strong>{{ $errors->first('attachment') }}</strong>
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
												<a class="btn btn-secondary" href="{{url('instructor/support/instructor-support-ticket')}}">Cancel</a>
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



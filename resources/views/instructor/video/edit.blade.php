@extends('instructor.layout.app')
@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Edit Video
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="{{url('instructor/')}}" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
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
                    <a  href="{{url('instructor/video')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Videos
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
											<span class="m-nav__link-text">
												{{$video->en_title}}
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
                                 Update Video
							</h3>
						</div>
				    </div>
			    </div>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('instructor/video/'.$video->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <input type="hidden" name="id" value="{{$video->id}}">
                <input type="hidden" name="model_type" value="App\Instructor">
                <input type="hidden" name="model_id" value="{{Auth::guard('instructor')->user()->id}}">
                <div class="m-portlet__body">
                    <div class="form-group{{ $errors->has('en_title') ? ' has-error' : '' }} m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            English Title
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" name="en_title" placeholder="Enter English Video Title"  value="{{$video->en_title}}">
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
                            <input type="text" class="form-control m-input" name="ar_title" placeholder="Enter Arabic Video Title"  value="{{$video->ar_title}}">
                        </div>
                        @if ($errors->has('ar_title'))
                            <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('ar_title') }}</strong>
                                        </span>
                        @endif

                    </div>

                    <div class="form-group m-form__group row {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label for="category_id" class="col-form-label col-lg-3 col-sm-12">
                            Category
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <select class="form-control m-input" id="category_id" name="category_id">
                                <option value=""> Select Category </option>
                                @foreach($categories as $category)
                                    <option {{($video->category_id)==$category->id?"selected":""}} value='{{$category->id}}'>{{$category->en_name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('category_id') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group m-form__group row{{ $errors->has('en_description') ? ' has-error' : '' }}">
                        <label for="en_description" class="col-form-label col-lg-3 col-sm-12">
                            English Description
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <textarea class="form-control m-input" id="en_description" name="en_description" rows="3" value="">{{$video->en_description}}</textarea>
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
                            <textarea class="form-control m-input" id="ar_description" name="ar_description" rows="3" value="">{{$video->en_description}}</textarea>
                            @if ($errors->has('ar_description'))
                                <span class="help-block col-md-12"  style="font-size:10pt;color:red">
                                                 <strong>{{ $errors->first('ar_description') }}</strong>
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
                            <input type="file" class="custom-file-input" id="thumb_image" name="thumb_image" value="{{ $video->thumb_image }}">
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

                    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }} m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            Video URL
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control m-input" name="url" placeholder="Enter Video URL "  value="{{$video->url}}">
                        </div>
                        @if ($errors->has('url'))
                            <span class="help-block col-md-12">
                                          <strong class="error-sms">{{ $errors->first('url') }}</strong>
                                        </span>
                        @endif
                    </div>



                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <button type="submit" class="btn btn-success">
                                        Update
                                    </button>
                                    <a class="btn btn-secondary" href="/instructor/video">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
            <!--end::Form-->
		</div>
    <!-- END PAGE Body-->
@endsection




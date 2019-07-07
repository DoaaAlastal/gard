@extends('admin.layout.app')

@section('css')
    <!--begin::Page Vendors -->
    <link href="/demo/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors -->
@endsection


@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Instructor List
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
												Users
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('admin/instructor')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Instructor
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

    <div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Show All Instructors
										</h3>
									</div>
								</div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">
                                            <a href="{{url('admin/instructor/export')}}" class="btn btn-success m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
												<span>
													<i class="la la-file-excel-o"></i>
                                                    <span>
                                                    Export To Excel
                                                    </span>
												</span>
                                            </a>
                                        </li>
                                        <li class="m-portlet__nav-item"></li>
                                    </ul>
                                </div>

                            </div>

							<div class="m-portlet__body">
								<!--begin: Datatable -->
								<table class="table table-striped- table-bordered table-hover table-checkable"  id="m_table_2">
									<thead>
										<tr>
											<th>
												 Name
											</th>
											<th>
												 Job Title
                                            </th>
                                            <th>
												Address
											</th>
											<th>
												Mobile
											</th>
											<th>
												Image
											</th>
                                            <th>
												Status
											</th>
                                            <th>
												Actions
											</th>
										
										</tr>
									</thead>
									<tbody>
                                    @foreach($instructors as $instructor)
                                <tr>
									<td> {{$instructor->en_name}} </td>
									<td>{{$instructor->en_job_title}} </td>
									<td> {{$instructor->en_address}} </td>
									<td>{{$instructor->mobile}} </td>
                                    <td>
                                        <a title="Show"
                                           target="_blank"
                                           href="{{asset($instructor->image)}}"
										   on-click="window.open({{$instructor->image}},'_blank');">
										   <i class="fa fa-eye" style="font-size: 15px !important;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if($instructor->is_active == 1 )
                                            <span class="m-badge m-badge--success m-badge--wide">Active </span>
                                            <a href="{{url('admin/ban-instructor-'.$instructor->id)}}" title="Ban" class="text-danger pull-right" ><i class="fa fa-lock" style="font-size: 15px !important;"></i></a>
                                        @else
                                            <span class="m-badge m-badge--danger m-badge--wide">Banned </span>
                                            <a href="{{url('admin/unban-instructor-'.$instructor->id)}}" title="Unban" class="text-danger pull-right" ><i class="fa fa-unlock" style="font-size: 15px !important;"></i></a>
                                        @endif
                                    </td>
                                   <td>
                                       <a data-toggle="modal" data-target="#email{{$instructor->id}}" title="Send Email" style="text-decoration: none;cursor: pointer"  class="text-success" ><i class="fa fa-envelope " style="font-size: 15px !important;"></i></a>
                                       <a data-toggle="modal" data-target="#message{{$instructor->id}}" title="Send Message" style="text-decoration: none;cursor: pointer" class="text-warning" ><i class="flaticon-chat-1" style="text-decoration: none;font-size: 15px !important;"></i></a>
                                       <a href="{{url('admin/instructor', $instructor['id']) }}" class="text-danger deleteBtn" data-toggle="modal" data-target="#delete{{$instructor->id}}"><i class="fa fa-trash" style="font-size: 17px !important;"></i></a>


                                       <div class="modal fade" id="message{{$instructor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{ url('admin/instructor-new-message') }}" >
                                                       {{ csrf_field() }}
                                                       <input type="hidden" name="sender_type" value="App\Admin">
                                                       <input type="hidden" name="receiver_type" value="App\Instructor">
                                                       <input type="hidden" name="sender_id" value="{{Auth::guard('admin')->user()->id}}">
                                                       <input type="hidden" name="receiver_id" value="{{$instructor->id}}">
                                                       <div class="modal-header">
                                                           <h5 class="modal-title" id="exampleModalLabel" style="text-transform: capitalize">
                                                               New Message To - <span class="text-danger"> {{$instructor->en_name}}</span>
                                                           </h5>
                                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">
                                                                        &times;
                                                                    </span>
                                                           </button>
                                                       </div>
                                                       <div class="modal-body">
                                                           <div class="m-portlet__body">

                                                               <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }} m-form__group row">

                                                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                                                       <textarea required class="form-control m-input" rows="13" name="content" placeholder="Type Your Message Here" value="">{{ old('content') }}</textarea>

                                                                   </div>
                                                                   @if ($errors->has('content'))
                                                                       <span class="help-block col-md-12">
                                                                          <strong class="error-sms">{{ $errors->first('content') }}</strong>
                                                                        </span>
                                                                   @endif
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="modal-footer">
                                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                               Close
                                                           </button>
                                                           <button type="submit" class="btn btn-success" >
                                                               Send
                                                           </button>
                                                       </div>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="modal fade" id="email{{$instructor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{ url('admin/instructor-new-email') }}" >
                                                       {{ csrf_field() }}
                                                       <input type="hidden" name="receiver_type" value="admin">
                                                       <input type="hidden" name="receiver_id" value="{{$instructor->id}}">
                                                       <input type="hidden" name="receiver_name" value="{{$instructor->en_name}}">
                                                       <div class="modal-header">
                                                           <h5 class="modal-title" id="exampleModalLabel" style="text-transform: capitalize">
                                                               New Email To - <span class="text-danger"> {{$instructor->en_name}}</span>
                                                           </h5>
                                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">
                                                                        &times;
                                                                    </span>
                                                           </button>
                                                       </div>
                                                       <div class="modal-body">
                                                           <div class="m-portlet__body">

                                                               <div class="form-group m-form__group row">

                                                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                                                       <textarea required class="form-control m-input" rows="13" name="emailMSG" placeholder="Type Your Email Here" value="">{{ old('emailMSG') }}</textarea>

                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="modal-footer">
                                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                               Close
                                                           </button>
                                                           <button type="submit" class="btn btn-success" >
                                                               Send
                                                           </button>
                                                       </div>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>

                                   </td>
								</tr>
						@endforeach
									</tbody>
								</table>
							</div>
                        </div>
                           <!-- END PAGE Body-->
@endsection

@section('js')
<!--begin::Page Vendors -->
<script src="/demo/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->  
        <!--begin::Page Resources -->
		<script src="/demo/assets/demo/default/custom/crud/datatables/advanced/column-visibility.js" type="text/javascript"></script>
		<!--end::Page Resources -->
<script>
    $(document).ready(function () {
        $('#m_table_2').DataTable({
            pageLength: 10,
            paging: true,
            searching: true,
        });
    });
</script>
@endsection

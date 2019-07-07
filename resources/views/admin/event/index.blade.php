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
                Event List
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
											Show All Events
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<li class="m-portlet__nav-item">
											<a href="{{url('admin/event/create')}}" class="btn btn-accent m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
												<span>
													<i class="la la-plus"></i>
													<span>
														New Event
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
								<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_2">
									<thead>
										<tr>
											<th>
												 Title
											</th>
											<th>
												Image
											</th>
											<th>
												Event Duration
											</th>
											<th>
												Online
											</th>
                                            <th>
												Actions
											</th>
										
										</tr>
									</thead>
									<tbody>
                                    @foreach($events as $event)
                                <tr>
									<td> {{$event->en_title}} </td>
									<td>
                                        <a title="Show"
                                           target="_blank"
                                           href="{{asset($event->thumb_image)}}"
										   on-click="window.open({{$event->thumb_image}},'_blank');">
										   <i class="fa fa-eye" style="font-size: 15px !important;"></i>
                                        </a>
									</td>
									<td>
                                        {{date('H:i', strtotime($event->start_at))}} <strong>To</strong> {{date('H:i', strtotime($event->end_at))}}
									</td>
									<td><input class="m-checkbox m-checkbox--state-primary" disabled type="checkbox" {{$event->IsOnline?'checked':''}}/></td>
                                   <td>
                                   <a href="{{url('admin/event/'.$event->id.'/edit')}}" class="text-primary" ><i class="fa fa-pencil-square-o" style="font-size: 15px !important;"></i></a>
                                   <a href="{{url('admin/event', $event['id']) }}" class="text-danger deleteBtn" data-toggle="modal" data-target="#delete{{$event->id}}"><i class="fa fa-trash" style="font-size: 17px !important;"></i></a>
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

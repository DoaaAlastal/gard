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
                Support Tickets
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
												Support Center
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('admin/support')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Spport Tickets
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
											Show All Support Tickets
										</h3>
									</div>
								</div>

							</div>
							<div class="m-portlet__body">
								<!--begin: Datatable -->
								<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_2">
								<thead>
									
										<tr>
											<th>
												Sender
											</th>
											<th>
												Subject
											</th>
											<th>
												Attachment
											</th>
											<th>
												Status
											</th>
											<th>
												Action
											</th>
										</tr>
									</thead>
                                    <tbody>
                                    @foreach($tickets as $ticket)
                                        <tr>
                                            <td> {{$ticket->sender->en_name}} </td>
                                            <td> {{$ticket->subject}} </td>
                                            <td>
                                                <a title="Download "
                                                   class="fa fa-download"
                                                   target="_self"
                                                   href="{{asset($ticket->attachment)}}"
                                                   download="{{asset($ticket->attachment)}}">
                                                </a>
                                                <a title="Show"
                                                   target="_blank"
                                                   class="fa fa-eye"
                                                   href="{{asset($ticket->attachment)}}"
                                                   on-click="window.open({{$ticket->attachment}},'_blank');">

                                                </a>
                                            </td>
                                            <td>
                                                @if($ticket->is_active == 1)
                                                    <span class="m-badge m-badge--success m-badge--wide"> Opened </span>
                                                    <a href="{{url('admin/support/close/'.$ticket->id)}}" class="text-danger fa fa-lock pull-right" ></a>
                                                @else
                                                    <span class="m-badge m-badge--danger m-badge--wide"> Closed </span>
                                                    <a href="{{url('admin/support/open/'.$ticket->id)}}" class="text-primary fa fa-unlock pull-right" ></a>
                                                @endif
                                            </td>

                                            <td>
                                                @if($ticket->is_active == 1)
                                                    <a href="{{url('admin/support/reply/'.$ticket->id)}}" class="text-primary fa fa-reply" ></a>
                                                @endif
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

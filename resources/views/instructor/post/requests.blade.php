@extends('instructor.layout.app')
@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator" style="text-transform: capitalize">
                Articles Requests List
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
                    <a  class="m-nav__link">
											<span class="m-nav__link-text">
												Requests
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('instructor/requests/articles')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Articles Requests
											</span>
                    </a>
                </li>
            </ul>

        </div>
        <div>
        </div>
    </div>
@endsection

@section('css')
  <!--begin::Page Vendors -->
  <link href="/demo/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
@endsection
@section('content')
   
    <!-- BEGIN PAGE Body-->

    <div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text" style="text-transform: capitalize">
											Show My Articles Requests
										</h3>
									</div>
								</div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">
                                            <a href="{{url('instructor/posts/articles/create')}}" class="btn btn-accent m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
												<span>
													<i class="la la-plus"></i>
													<span>
														New Article
													</span>
												</span>
                                            </a>
                                        </li>
                                        <li class="m-portlet__nav-item"></li>
                                    </ul>
                                </div>
                            </div>
							<div class="m-portlet__body">
								<!--begin: Datatable  id="m_table_1"-->
								<table class="table table-striped- table-bordered table-hover table-checkable" >
									<thead>
										<tr>
											<th>
												 Title
											</th>
											<th>
												Author
											</th>
											<th>
												Image
											</th>
                                            <th>
												Actions
											</th>
										
										</tr>
									</thead>
									<tbody>
                                    @foreach($posts as $post)
                                <tr>
									<td> {{$post->en_title}} </td>
									<td> {{$post->en_author}} </td>
									<td>
                                        <a title="Show"
                                           target="_blank"
                                           href="{{asset($post->thumb_image)}}"
										   on-click="window.open({{$post->thumb_image}},'_blank');">
										   <i class="fa fa-eye" style="font-size: 15px !important;"></i>
                                        </a>
									</td>
                                    <td>
                                        <a href="{{url('instructor/posts/'.$post->id.'/edit')}}" class="text-primary" ><i class="fa fa-pencil-square-o" style="font-size: 15px !important;"></i></a>
                                        <a href="{{url('instructor/posts', $post['id']) }}" class="text-danger deleteBtn" data-toggle="modal" data-target="#delete{{$post->id}}"><i class="fa fa-trash" style="font-size: 17px !important;"></i></a>

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
@endsection

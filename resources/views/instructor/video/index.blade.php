@extends('instructor.layout.app')

@section('css')
    <!--begin::Page Vendors -->
    <link href="/demo/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors -->
@endsection


@section('breadcrumb')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Video List
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
												Main Componants
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('instructor/video')}}"  class="m-nav__link">
											<span class="m-nav__link-text">
												Videos
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

    <div class="col-xl-12 col-lg-12">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Show All Videos
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{url('instructor/video/create')}}" class="btn btn-accent m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
												<span>
													<i class="la la-plus"></i>
													<span>
														New Video
													</span>
												</span>
                            </a>
                        </li>

                        <li class="m-portlet__nav-item"></li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show " >
                    <div class="row" style="padding:20px">
								<!--begin: Datatable -->
                                    @if(sizeof($videos) == 0)
                                        <div class=" col-md-12 m-alert m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                            <strong>
                                                Note !
                                            </strong>
                                            No Videos Created .
                                        </div>
                                    @endif
                                    @foreach($videos as $item)
                                    <div class="col-xl-4">
                                        <!--begin:: Widgets/Blog-->
                                        <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                                            <div class="m-portlet__head m-portlet__head--fit">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-action">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-portlet__body">
                                                <div class="m-widget19">
                                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                                                        <img src="{{asset($item->thumb_image)}}" alt="" style="height: 225px;">
                                                        <div class="m-widget19__shadow"></div>
                                                    </div>
                                                    <div class="m-widget19__content" >
                                                        <div class="m-widget19__header">
                                                            <div class="m-widget19__info">
														<span class="m-widget19__username">
															{{$item->en_title}}
														</span>
                                                                <br>
                                                            </div>

                                                        </div>
                                                        <div class="m-widget19__body" >
                                                            {{ str_limit($item->en_description, 150 , '...') }}
                                                        </div>
                                                    </div>
                                                    <div class="m-widget19__action">

                                                        <a role="button" class="btn btn-info btn-sm" href="{{$item->url}}" ><i class="fa fa-eye" style="font-size: 15px !important;"></i> watch</a>
                                                        <a role="button" class="btn btn-primary btn-sm" href="{{url('instructor/video/'.$item->id.'/edit')}}" ><i class="fa fa-pencil-square-o" style="font-size: 15px !important;"></i> Edit</a>
                                                        <a role="button" class="btn btn-danger btn-sm deleteBtn"  href="{{url('instructor/video', $item['id']) }}"  data-toggle="modal" data-target="#delete{{$item->id}}"><i class="fa fa-trash" style="font-size: 17px !important;"></i> Delete</a>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end:: Widgets/Blog-->
                                    </div>
                                    @endforeach

                    </div>
                    <div class="row pull-right" style="padding:20px">
                        <div class="col-sm-offset-9 col-sm-3">
                            {{$videos->links()}}
                        </div>
                    </div>
                </div>


            </div>
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

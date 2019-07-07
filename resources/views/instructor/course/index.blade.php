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
                Course List
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
												System
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('instructor/course')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Course
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
                        My Approved Courses
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{url('instructor/course/create')}}" class="btn btn-accent m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
												<span>
													<i class="la la-plus"></i>
													<span>
														New Course
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
                       Hours
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Is Closed
                    </th>
                    <th>
                        Image
                    </th>

                    <th>
                        Topics
                    </th>
                    <th>
                        Files
                    </th>
                    <th>
                        Students
                    </th>
                    <th>
                        Actions
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td> {{$course->en_title}} </td>
                        <td> {{$course->number_of_hours}} </td>
                        <td> {{$course->currency->sign}} {{$course->price}}  </td>
                        <td>@if($course->IsClosed==1)
                                <span> Closed</span>
                            @else
                                <span> Open</span>
                            @endif
                        </td>

                        <td>
                            <a title="Show"
                               target="_blank"
                               href="{{asset($course->thumb_image)}}"
                               on-click="window.open({{$course->thumb_image}},'_blank');">
                                <i class="fa fa-eye" style="font-size: 15px !important;"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{url('instructor/course-topics/'.$course->id)}}" class="text-primary" ><i class="fa fa-eye" style="font-size: 15px !important;"></i></a>
                        </td>
                        <td>
                            <a class="text-primary" data-toggle="modal" data-target="#files{{$course->id}}"><i class="fa fa-eye" style="cursor:pointer;font-size: 15px !important;"></i></a>
                            <div class="modal fade" id="files{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="text-transform: capitalize">
                                                {{$course->en_title}} Attachments
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($course->attachments) > 0)
                                                    @foreach($course->attachments as $attachment)
                                                        <tr>
                                                            <td> {{$attachment->attachment_name}}</td>
                                                            <td>
                                                                <a title="Show"
                                                                   target="_blank"
                                                                   class="fa fa-eye text-info"
                                                                   href="{{asset($attachment->attachment_path)}}"
                                                                   on-click="window.open({{$attachment->attachment_path}},'_blank');">
                                                                </a>
                                                                <a title="Download "
                                                                   class="fa fa-download"
                                                                   target="_self"
                                                                   href="{{asset($attachment->attachment_path)}}"
                                                                   download="{{$attachment->attachment_name}}">
                                                                </a>

                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                @else
                                                    <tr> <th colspan="2"><center>No Attachments for this course</center></th></tr>

                                                @endif
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{url('instructor/course/course-'.$course->id. '/students') }}"><button type="button" class="btn m-btn--pill    btn-primary btn-sm m-btn m-btn--custom">
                                    show students
                                </button></a>
                        </td>
                        <td>
                            <a href="{{url('instructor/course/'.$course->id.'/edit')}}" class="text-primary" ><i class="fa fa-pencil-square-o" style="font-size: 15px !important;"></i></a>
                            <a href="{{url('instructor/course', $course['id']) }}" class="text-danger deleteBtn" data-toggle="modal" data-target="#delete{{$course->id}}"><i class="fa fa-trash" style="font-size: 17px !important;"></i></a>
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

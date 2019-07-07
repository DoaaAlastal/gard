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
                Role Permissions List
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
												Roles & Permissions
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a  href="{{url('admin/roles')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Roles
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a  href="{{url('admin/admin-role-permissions/'.$role->id)}}" class="m-nav__link">
											<span class="m-nav__link-text">
												 Role Permissions [ <b class="text-danger"> {{$role->name}}</b> ]
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
											Show All Role Permissions  [ <b class="text-danger"> {{$role->name}}</b> ]
										</h3>
									</div>
								</div>
							</div>
                            <form method="POST" action="{{ url('admin/update-admin-role-permissions') }}" class="m-form m-form--fit m-form--label-align-right">
                                {{ csrf_field() }}
                                <input type="hidden" name="role_id" value="{{$role->id}}">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-md-3">
                                            <input type="checkbox" name="all" id="all" >
                                            <label style="font-size: 14px" for="all">تحديد كآفة الصلاحيات</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row"  style="padding-left: 15px;">
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-3">
                                                <input type="checkbox" @if(@$role->hasPermissionTo($permission->name)) checked @endif name="permissions[]" value="{{$permission->name}}" id="{{$permission->name}}">
                                                <label style="font-size: 14px" for="{{$permission->name}}">{{$permission->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions m-form__actions">
                                            <div class="row">
                                                <div class="col-lg-9 ml-lg-auto">
                                                    <button type="submit" class="btn btn-success">
                                                        Save
                                                    </button>
                                                    <a class="btn btn-secondary" href="{{url('/admin/roles')}}">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

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
    <script language="JavaScript">
        $('#all').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
@endsection

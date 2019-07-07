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
                Assign Roles
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
                    <a  href="{{url('/admin/admin-role')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Assign Roles
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
    <div class="row">
        <div class="m-portlet col-md-7 m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Show All Admins-Roles
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
                            Name
                        </th>
                        <th>
                            Role
                        </th>
                        <th>
                            Actions
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td> {{$item->user->en_name}} </td>
                            <td> {{$item->role->name}} </td>
                            <td>
                                <a href="{{url('admin/revoke-role/'.$item->id)}}" class="text-danger" ><i class="fa fa-trash" style="font-size: 15px !important;"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div style="margin-left: 20px;"></div>
        <div class="m-portlet col-md-4 m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Assign Role To Admin
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('admin/assign-admin-role') }}">
                    {{ csrf_field() }}
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <label for="category_id" class="col-form-label col-lg-3 col-sm-12">
                                Admin
                            </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control m-input" id="admin" name="admin">
                                    <option value=""> Select Admin </option>
                                    @foreach($admins as $admin)
                                        <option {{old('admin')==$admin->id?"selected":""}} value='{{$admin->id}}'>{{$admin->en_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <label for="category_id" class="col-form-label col-lg-3 col-sm-12">
                                Role
                            </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control m-input" id="role" name="role">
                                    <option value=""> Select Role </option>
                                    @foreach($roles as $role)
                                        <option {{old('role')==$role->id?"selected":""}} value='{{$role->id}}'>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-9 ml-lg-auto">
                                        <button type="submit" class="btn btn-success">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
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

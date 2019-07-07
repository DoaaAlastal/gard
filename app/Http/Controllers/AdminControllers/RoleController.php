<?php

namespace App\Http\Controllers\AdminControllers;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\ModelHasRole ;



class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        toastr( 'Successful Save ',  'success',  'Roles');
        return redirect('admin/roles');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findById($id);
        return view('admin.role.edit',compact('role'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findById($id);
        $role->update(array(['name' => $request->name]));
        toastr( 'Successful Update ',  'info',  'Roles');
        return redirect('admin/roles');
    }

    public function admin_role()
    {
        $admins = Admin::all();
        $roles = Role::all();
        $items = ModelHasRole::all();
        return view('admin.admin-roles.index',compact('admins','roles','items'));

    }

    public function admin_role_permissions($role)
    {
        $role = Role::find($role);
        $permissions = Permission::all();
        return view('admin.role.role-permissions',compact('permissions','role'));

    }


    public function update_admin_role_permissions(Request $request)
    {
        $role = Role::find($request->input('role_id'));
        $role->syncPermissions($request->input('permissions'));
        toastr( 'Successful Update Role Permissions ',  'info',  'Role Permissions');
        return redirect()->back();

    }

    public function assign_role(Request $request)
    {
        $hasRole= ModelHasRole::where('model_id',$request->admin)->first();
        if($hasRole){
            $hasRole->role_id = $request->role ;
            $hasRole->save();
            toastr( 'Successful Update Admin Role',  'info',  'Roles ');
            return redirect()->back();
        }
        else{
            $store= new ModelHasRole ;
            $store->role_id  = $request->role ;
            $store->model_type  = 'App\Admin' ;
            $store->model_id  = $request->admin ;
            $store->save();
            toastr( 'Successful Assign Role for Admin',  'success',  'Roles ');
            return redirect()->back();
        }

    }

    public function revoke_role($id)
    {
        $item = ModelHasRole::find($id);
        if ($item->delete()){
            toastr( 'Successful Revoke Role From Admin',  'danger',  'Roles ');
            return redirect()->back();
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect()->back();

    }
}

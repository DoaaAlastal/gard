<?php
 
namespace App\Http\Controllers\AdminControllers; 

use App\Admin ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index(){
        $auth = Auth::guard('admin')->user()->id;
        $admins = Admin::where('id','!=',$auth)->whereNull('deleted_at')->get();
        return view('admin.admin.index',compact('admins'));
    }

    public function export()
    {
        return Excel::download(new Admin, 'admins.xlsx');
    }


    public function create(){
        
        return view('admin.admin.add');
    }


    public function store(Request $request){
        $validation = $request->validate(Admin::$save_rules);
        return(Admin::saveAdmin($request->all(), null));
    }

    public function show($id){
        $admin = Admin::where('id',$id)->first();
        return view('admin.admin.index',compact('admin'));
    }


   
    public function edit($id){
        $admin = Admin::where('id',$id)->first();
        return view('admin.admin.edit',compact('admin'));
    }

    
     
    public function update(Request $request){
        $validation = $request->validate(Admin::$update_rules);
        return(Admin::saveAdmin($request->all(),$request->id));
    }

    public function destroy($id)
    {
        $admin = Admin::where('id',$id)->first();
        if ($admin) {
           // unlink($admin->image);
            $admin->delete();
            toastr( 'Successful Delete',  'danger',  'Admin');
            return redirect('admin/admin');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/admin');
    }



    
}

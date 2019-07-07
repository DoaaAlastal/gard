<?php
 
namespace App\Http\Controllers\AdminControllers; 

use App\User ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index(){
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function export()
    {
        return Excel::download(new User, 'students.xlsx');
    }

    public function create(){
        
        return view('admin.user.add');
    }


    public function store(Request $request){
        $validation = $request->validate(User::$save_rules);
        return(User::saveUser($request->all(), null));
    }

    public function show($id){
        $user = User::where('id',$id)->first();
        return view('admin.user.index',compact('user'));
    }


   
    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('admin.user.edit',compact('user'));
    }

    
     
    public function update(Request $request){
        $validation = $request->validate(User::$update_rules);
        return(User::saveUser($request->all(),$request->id));
    }

    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        if ($user) {
           // unlink($admin->image);
            $user->delete(); 
            toastr( 'Successful Delete',  'danger',  'User');
            return redirect('admin/user');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/user');
    }



    
}

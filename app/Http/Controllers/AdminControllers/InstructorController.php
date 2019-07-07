<?php
 
namespace App\Http\Controllers\AdminControllers; 

use App\Instructor ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class InstructorController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index(){
        $instructors = Instructor::all();
        return view('admin.instructor.index',compact('instructors'));
    }

    public function export()
    {
        return Excel::download(new Instructor, 'instructors.xlsx');
    }

    public function create(){
        return view('admin.instructor.add');
    }


    public function store(Request $request){
        $validation = $request->validate(Instructor::$save_rules);
        return(Instructor::saveInstructor($request->all(), null));
    }

    public function show($id){
        $instructor = Instructor::where('id',$id)->first();
        return view('admin.instructor.index',compact('instructor'));
    }


   
    public function edit($id){
        $instructor = Instructor::where('id',$id)->first();
        return view('admin.instructor.edit',compact('instructor'));
    }

    
     
    public function update(Request $request){
        $validation = $request->validate(Instructor::$update_rules);
        return(Instructor::saveInstructor($request->all(),$request->id));
    }

    public function destroy($id)
    {
        $instructor = Instructor::where('id',$id)->first();
        if ($instructor) {
           // unlink($admin->image);
            $instructor->delete();
            toastr( 'Successful Delete',  'danger',  'Instructor');
            return redirect('admin/instructor');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/instructor');
    }



    
}

<?php
 
namespace App\Http\Controllers\AdminControllers; 

use App\Section ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index(){
        $sections = Section::all();
        return view('admin.section.index',compact('sections'));
    }


    public function create(){
        return view('admin.section.add');
    }


    public function store(Request $request){
        $validation = $request->validate(Section::$rules);
        return(Section::saveSection($request->all(), null));
    }

    public function show($id){
        $section = Section::where('id',$id)->first();
        return view('admin.section.index',compact('section'));
    }


   
    public function edit($id){
        $section = Section::where('id',$id)->first();
        return view('admin.section.edit',compact('section'));
    }

    
     
    public function update(Request $request){
        $validation = $request->validate(Section::$rules);
        return(Section::saveSection($request->all(),$request->id));
    }

    public function destroy($id)
    {
        $section = Section::where('id',$id)->first();
        if ($section ) {
            $section ->delete(); 
            toastr( 'Successful Delete',  'danger',  'Section ');
            return redirect('admin/section ');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/section ');
    }



    
}

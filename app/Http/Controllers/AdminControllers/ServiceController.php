<?php
 
namespace App\Http\Controllers\AdminControllers; 

use App\Service ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index(){
        $services = Service::all();
        return view('admin.service.index',compact('services'));
    }


    public function create(){
        return view('admin.service.add');
    }


    public function store(Request $request){
        $validation = $request->validate(Service::$rules);
        return(Service::saveService($request->all(), null));
    }

    public function show($id){
        $service = Service::where('id',$id)->first();
        return view('admin.service.index',compact('service'));
    }


   
    public function edit($id){
        $service = Service::where('id',$id)->first();
        return view('admin.service.edit',compact('service'));
    }

    
     
    public function update(Request $request){
        $validation = $request->validate(Service::$rules);
        return(Service::saveService($request->all(),$request->id));
    }

    public function destroy($id)
    {
        $service = Service::where('id',$id)->first();
        if ($service ) {
            $service ->delete(); 
            toastr( 'Successful Delete',  'danger',  'Service ');
            return redirect('admin/service ');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/service ');
    }



    
}

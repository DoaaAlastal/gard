<?php
 
namespace App\Http\Controllers\AdminControllers;

use App\Country ;
use App\City ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function create($country){
        $country = Country::find($country);
        return view('admin.constant.city.add',compact('country'));
    }

    public function store(Request $request){
        $validation = $request->validate(City::$rules);
        return(City::saveCity($request->all(), null));
    }

    public function edit($country,$city){
        $country = Country::find($country);
        $city = City::find($city);
        return view('admin.constant.city.edit',compact('country','city'));
    }
   
    public function update(Request $request){
        $validation = $request->validate(City::$rules);
        return(City::saveCity($request->all(),$request->id));
    }

    public function destroy($id){  
        $city = City::where('id',$id)->first();
        if ($city) {
            $city->delete();
            return redirect()->back()->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect()->back()->withDanger('An Error Occurred During Execution!');

    }
}

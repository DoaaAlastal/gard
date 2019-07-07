<?php
 
namespace App\Http\Controllers\AdminControllers;

use App\Country ;
use App\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index(){
        $countries = Country::all();
        return view('admin.constant.country.index',compact('countries'));
    }


    public function create(){
        return view('admin.constant.country.add');
    }


    public function store(Request $request){
        $validation = $request->validate(Country::$save_rules);
        return(Country::saveCountry($request->all(), null));
    }

    public function show($id){
        $country = Country::where('id',$id)->first();
        return view('admin.constant.city.index',compact('country'));
    }


   
    public function edit($id){
        $country = Country::where('id',$id)->first();
        return view('admin.constant.country.edit',compact('country'));
    }

    
     
    public function update(Request $request){
        $validation = $request->validate(Country::$update_rules);
        return(Country::saveCountry($request->all(),$request->id));
    }

    public function destroy($id){
        $country = Country::with('cities')->find($id);
        if ($country) {
            $country->cities()->delete();
            $country->delete();
            toastr( 'Successful Delete',  'danger',  'Country');
            return redirect('admin/countries');

        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/countries');
    }



    
}

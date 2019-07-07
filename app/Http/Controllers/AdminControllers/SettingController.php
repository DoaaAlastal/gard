<?php

namespace App\Http\Controllers\AdminControllers;

use App\Setting ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($value='')
    {
        $settings = Setting::all()->pluck('value','name');
        return view('admin.constant.setting.index',compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sitename'=> 'required',
            'description'=> 'required',
            'url'=>'required|url',
            'email'=> 'required|email|max:255',
            'mobile'=>'required|regex:/(009725)[0-9]{8}/',
            'phone'=>'required|regex:/(08)[0-9]{7}/',
            'facebook'=>'required|url',
            'twitter'=>'required|url',
            'linkedin'=>'required|url',
            'instagram'=>'required|url',
            'keywords'=>'required',
            'location'=>'required',
            'ar_location'=>'required',
            'definition_video'=>'required|url',
        ]);
        foreach ($request->except(['_token','submit','logo','signature']) as $key => $value) {
            $site = Setting::where('name',$key)->first();
            $site->value = $value;
            $site->save();
        }

        if (! is_null($request->file('logo'))) {
            $request->validate([
                'logo'=>'mimes:png,jpg,jpeg',
            ]);
            $image = \Request::file('logo');
            $name = time().$image->getClientOriginalName();
            $destinationPath = "uploads/general/";
            $image->move($destinationPath, $name);

            $site = Setting::where('name','logo')->first();
            $site->value = 'uploads/general/'.$name ;
            $site->save();
        }
        if (! is_null($request->file('signature'))) {
            $request->validate([
                'signature'=>'mimes:png,jpg,jpeg',
            ]);
            $image = \Request::file('signature');
            $name = time().$image->getClientOriginalName();
            $destinationPath = "uploads/general/";
            $image->move($destinationPath, $name);

            $site = Setting::where('name','signature')->first();
            $site->value = 'uploads/general/'.$name ;
            $site->save();
        }
        toastr( 'Setting Successful Updated !',  'info',  'Settings');
        return redirect()->back();

    }


}

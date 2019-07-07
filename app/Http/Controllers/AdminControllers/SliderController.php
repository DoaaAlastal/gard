<?php

namespace App\Http\Controllers\AdminControllers;

use App\Slider ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SliderController extends Controller
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
    public function index()
    {
        $slides = Slider::all();
        return view('admin.constant.slider.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.constant.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(Slider::$save_rules);
        return(Slider::saveSlide($request->all(), null));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slider::find($id);
        return view('admin.constant.slider.edit',compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slider::where('id',$id)->first();
        return view('admin.constant.slider.edit',compact('slide'));
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
        $validation = $request->validate(Slider::$update_rules);
        return(Slider::saveSlide($request->all(),$request->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slider::where('id',$id)->first();
        if ($slide) {
           // unlink($slide->image);
            $slide->delete();
            toastr( 'Successful Delete',  'danger',  'Slide');
            return redirect('admin/slider');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/slider');
    }
}

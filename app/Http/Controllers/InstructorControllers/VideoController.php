<?php

namespace App\Http\Controllers\InstructorControllers;

use App\Video;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class VideoController extends Controller
{
    public function __construct() {
        $this->middleware('instructor');
    }

    public function index()
    {
        $auth = \Auth::guard('instructor')->user();
        $videos = $auth->videos()->paginate(15);
        return view('instructor.video.index',compact('videos'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('instructor.video.add',compact('categories'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate(Video::$save_rules);
        return(Video::saveVideo($request->all(), null, 'instructor/video/' ));
    }


    public function edit($id)
    {
        $categories=Category::all();
        $video = Video::where('id',$id)->first();
        return view('instructor.video.edit',compact('video','categories'));
    }



    public function update(Request $request, $id)
    {
        $validation = $request->validate(Video::$update_rules);
        return(Video::saveVideo($request->all(),$request->id , 'instructor/video/'));
    }


    public function destroy($id)
    {
        $video = Video::where('id',$id)->first();
        if ($video) {
            $video->delete();
            toastr( 'Successful Delete',  'danger',  'Videos');
            return redirect()->back();
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect()->back();
    }
}

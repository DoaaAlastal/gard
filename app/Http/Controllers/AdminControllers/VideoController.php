<?php

namespace App\Http\Controllers\AdminControllers;

use App\Tag;
use App\Video;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class VideoController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index()
    {
        $videos = Video::where('status_id',2)->paginate(15);
        return view('admin.video.index',compact('videos'));
    }

    public function requests(){
        $items = Video::where('status_id',1)->get();
        return view('admin.video.requests',compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.video.add',compact('categories','tags'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate(Video::$save_rules);
        return(Video::saveVideo($request->all(), null,'admin/video/'));
    }


    public function edit($id)
    {
        $categories=Category::all();
        $tags = Tag::all();
        $video = Video::where('id',$id)->first();
        return view('admin.video.edit',compact('video','categories','tags'));
    }



    public function update(Request $request, $id)
    {
        $validation = $request->validate(Video::$update_rules);
        return(Video::saveVideo($request->all(),$request->id,'admin/video/'));
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

    public function changeStatus($id,$status){
        $video=Video::where('id',$id)->first();
        $model_type=$video->model_type;
        $status_id=$video->status_id;
        if($video){
            if($model_type != "App\admin" && $status_id==1){
                $video->status_id=$status;
                $video->save();
                if($video->status_id==2){
                    toastr( 'Successful Update ',  'success',  'Accept Video');
                    return redirect()->back();
                }elseif($video->status_id==3){
                    toastr( 'Successful Update ',  'error',  'Reject Video');
                    return redirect()->back();
                }
            }
            toastr()->error('Opps ! An error has occurred.');
            return redirect()->back();

        }

    }

}

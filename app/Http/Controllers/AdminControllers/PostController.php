<?php

namespace App\Http\Controllers\AdminControllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
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
    public function index($type)
    {
        if($type =='news' || $type =='articles'){
            $posts = Post::where('type',$type)->whereIn('status_id',[2,3])->get();
            return view('admin.post.index',compact('posts','type'));
        }
        else{
            return view('admin.error');

        }
    }

    public function requests(){
        $type= 'articles';
        $posts = Post::where('type',$type)->where('status_id',1)->get();
        return view('admin.post.requests',compact('posts','type'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.post.add',compact('categories','tags','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(Post::$save_rules);
        return(Post::savePost($request->all(), null));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $tags= Tag::all();
        $post = Post::where('id',$id)->first();
        return view('admin.post.edit',compact('post','categories','tags'));
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
        $validation = $request->validate(Post::$update_rules);
        return(Post::savePost($request->all(),$request->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id',$id)->first();
        if ($post) {
            $post->delete();
            toastr( 'Successful Delete',  'danger',  'Post');
            return redirect()->back();
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect()->back();
    }

    public function postStatus($id,$newstatus){
        $post=Post::where('id',$id)->first();
        $model_type=$post->model_type;
        $status_id=$post->status_id;
        if($post){
            if($model_type != "App\admin" && $status_id==1){
                $post->status_id=$newstatus;
                $post->save();
                if($post->status_id==2){
                toastr( 'Successful Update ',  'success',  'Accept Post');
                    return redirect()->back();
                }elseif($post->status_id==3){
                    toastr( 'Successful Update ',  'error',  'Reject Post');
                    return redirect()->back();
                }
            }
            toastr()->error('Opps ! An error has occurred.');
            return redirect()->back();
            
        }
        
    }
}

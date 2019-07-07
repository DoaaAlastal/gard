<?php

namespace App\Http\Controllers\InstructorControllers;

use App\Post;
use App\Category;
use App\Tag;
use Auth;
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
        $this->middleware('instructor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $auth = Auth::guard('instructor')->user();
        $posts = $auth->posts()->where('type','articles')->where('status_id',2)->get();
        return view('instructor.post.index',compact('posts'));
    }

    public function requests()
    {
        $auth = Auth::guard('instructor')->user();
        $posts = $auth->posts()->where('type','articles')->where('status_id',1)->get();
        return view('instructor.post.requests',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = 'articles';
        $categories=Category::all();
        $tags=Tag::all();
        return view('instructor.post.add',compact('categories','tags','type'));
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
        return view('instructor.post.edit',compact('post'));
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
        return view('instructor.post.edit',compact('post','categories','tags'));
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

}

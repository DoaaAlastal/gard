<?php

namespace App\Http\Controllers\AdminControllers;


use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index',compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.add');
    }

    public function store(Request $request)
    {
        $validation = $request->validate(Tag::$rules);
        return(Tag::saveTag($request->all(), null));
    }

    public function edit($id)
    {
        $tag = Tag::where('id',$id)->first();
        return view('admin.tag.edit',compact('tag'));

    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate(Tag::$rules);
        return(Tag::saveTag($request->all(),$request->id));
    }

    public function destroy($id)
    {
        $tag = Tag::where('id',$id)->first();
        if ($tag) {
            $tag->delete();
            toastr( 'Successful Delete',  'danger',  'Tag');
            return redirect('admin/tag');

        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/tag');

    }
}

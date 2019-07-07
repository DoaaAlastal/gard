<?php

namespace App\Http\Controllers\AdminControllers;


use App\Topic;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    /*  public function index()
      {
          $topics = Topic::all();
          return view('admin.topic.index',compact('topics'));
      }*/

    public function create($course)
    {
        $course=Course::find($course);
        return view('admin.topic.add',compact('course'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate(Topic::$rules);
        return(Topic::saveTopic($request->all(), null));
    }

    public function edit($course,$topic)
    {
        $course=Course::find($course);
        $topic = Topic::find($topic);
        return view('admin.topic.edit',compact('topic','course'));

    }

    public function update(Request $request)
    {
        $validation = $request->validate(Topic::$rules);
        return(Topic::saveTopic($request->all(),$request->id));
    }

    public function destroy($id)
    {
        $topic = Topic::where('id',$id)->first();
        if ($topic) {
            $topic->delete();
            toastr( 'Successful Delete',  'danger',  'Topic');
            return redirect()->back();

        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect()->back();

    }
}

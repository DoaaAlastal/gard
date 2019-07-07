<?php

namespace App\Http\Controllers\InstructorControllers;

use Auth;
use App\Category;
use App\Course;
use App\CourseAttachments;
use App\Instructor;
use App\Tag;
use App\Currency;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function __construct() {
        $this->middleware('instructor');
    }

    public function index()
    {
        $auth = Auth::guard('instructor')->user();
        $courses = $auth->courses()->where('status_id',2)->get();
        return view('instructor.course.index',compact('courses'));
    }

    public function requests()
    {
        $auth = Auth::guard('instructor')->user();
        $courses = $auth->courses()->where('status_id',1)->get();
        return view('instructor.course.requests',compact('courses'));
    }

    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        $instructors=Instructor::all();
        $currencies=Currency::all();
        $status=Status::all();
        return view('instructor.course.add',compact('categories','tags','instructors','currencies','status'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate(Course::$save_rules);
        return(Course::saveCourse($request->all(), null));
    }

    public function edit($id)
    {
        $categories=Category::all();
        $tags=Tag::all();
        $instructors=Instructor::all();
        $currencies=Currency::all();
        $status=Status::all();
        $course = Course::where('id',$id)->first();
        return view('instructor.course.edit',compact('categories','course','tags','instructors','currencies','status'));

    }

    public function show($id)
    {

        $course = Course::where('id',$id)->first();
        return view('instructor.topic.index',compact('course'));

    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate(Course::$update_rules);
        return(Course::saveCourse($request->all(),$request->id));
    }

    public function destroy($id)
    {
        $course = Course::where('id',$id)->first();
        if ($course) {
            $course->delete();
            toastr( 'Successful Delete',  'danger',  'Course');
            return redirect('instructor/course');

        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('instructor/course');

    }

    public function addAttachment(Request $request)
    {
        $course = Course::where('id',$request->course_id)->first();
        if( \Request::hasFile('course_attachments')){
            foreach (\Request::file('course_attachments') as $file) {
                $originalname = $file->getClientOriginalName();
                $name = time().$file->getClientOriginalName();
                $destinationPath = "uploads/courses/attachments/";
                $file->move($destinationPath, $name);

                $CourseAttachments = new CourseAttachments();
                $CourseAttachments->course_id = $course->id ;
                $CourseAttachments->attachment_name = $originalname;
                $CourseAttachments->attachment_path = "uploads/courses/attachments/".$name;
                $CourseAttachments->created_at =date('Y-m-d H:i:s');
                $CourseAttachments->save();
            }
            toastr( 'Successful Add Attachment',  'success',  'Course Attachment');
            return redirect()->back();
        }


    }

    public function destroyAttachment($id)
    {
        $file = CourseAttachments::where('id',$id)->first();
        if ($file) {
            unlink($file->attachment_path);
            $file->delete();
            toastr( 'Successful Delete',  'danger',  'Course Attachment');
            return redirect()->back();

        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect()->back();

    }


    public function course_students($id){
        $course = Course::where('id',$id)->first();
        $students = $course->users;
        return view('instructor.course.students',compact('course','students'));

    }

}

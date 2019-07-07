<?php

namespace App\Http\Controllers\AdminControllers;


use App\Category;
use App\Course;
use App\CourseAttachments;
use App\Instructor;
use App\Tag;
use App\Currency;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class CourseController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index()
    {
        $courses = Course::whereIn('status_id',[2,3])->get();
        return view('admin.course.index',compact('courses'));
    }

    public function export()
    {
        return Excel::download(new Course, 'courses.xlsx');
    }

    public function requests()
    {
        $courses = Course::where('status_id',1)->where('model_type','App\Instructor')->get();
        return view('admin.course.requests',compact('courses'));
    }

    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        $instructors=Instructor::all();
        $currencies=Currency::all();
        $status=Status::all();
        return view('admin.course.add',compact('categories','tags','instructors','currencies','status'));
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
        return view('admin.course.edit',compact('categories','course','tags','instructors','currencies','status'));

    }

    public function show($id)
    {

        $course = Course::where('id',$id)->first();
        return view('admin.topic.index',compact('course'));

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
            $course->topics()->delete();
            $course->reviews()->delete();
            $course->attachments()->delete();
            $course->delete();
            toastr( 'Successful Delete',  'danger',  'Course');
            return redirect('admin/course');

        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/course');

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

    public function courseStatus($id,$newstatus){
        $course=Course::where('id',$id)->first();
        $model_type=$course->model_type;
        $status_id=$course->status_id;
        if($course){
            if($model_type!="App\admin" && $status_id==1){
                $course->status_id=$newstatus;
                $course->save();
                if($course->status_id==2){
                toastr( 'Successful Update ',  'success',  'Accept Course');
                return redirect('admin/course');
                }elseif($course->status_id==3){
                    toastr( 'Successful Update ',  'error',  'Reject Course');
                    return redirect()->back();
                }
            }
            toastr()->error('Opps ! An error has occurred.');
            return redirect()->back();
            
        }
        
    }
}

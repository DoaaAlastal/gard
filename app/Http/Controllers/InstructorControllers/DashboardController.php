<?php

namespace App\Http\Controllers\InstructorControllers;


use App\Course;
use App\Instructor;
use App\Message;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('instructor');
    }

    public function index(){
        $instructor = Auth::guard('instructor')->user();
        $approved_courses = $instructor->courses()->where('status_id',2)->count();
        $requested_courses = $instructor->courses()->where('status_id',1)->count();
        $approved_posts = $instructor->posts()->where('type','articles')->whereNull('deleted_at')->where('status_id',2)->count();
        $requested_posts = $instructor->posts()->where('type','articles')->whereNull('deleted_at')->where('status_id',1)->count();
        return view('instructor.home',compact('approved_courses','requested_courses','approved_posts','requested_posts'));
    }


    public function profile(){
        return view('instructor.profile.index');
    }


    public function updatePersonalInfo(Request $request)
    {
        $id= Auth::guard('instructor')->user()->id ;
        $request->validate([
            'en_name'=> 'required',
            'ar_name'=> 'required',
            'email'=> 'required|email|max:255|unique:instructors,email,'.$id,
            'mobile'=> 'required|max:10',
            'en_address'=> 'required',
            'ar_address'=> 'required',
            'en_job_title'=> 'required',
            'ar_job_title'=> 'required',
            'en_bio'=> 'required',
            'ar_bio'=> 'required',
        ]);
        return(Instructor::updatePersonalInfo($request->all(), $id));
    }

    public function updateImage(Request $request)
    {
        $id= Auth::guard('instructor')->user()->id ;
        $request->validate([
            'image'=> 'required|image|dimensions:min_width=200,min_height=200',
        ]);
        return(Instructor::updateImage($request->all(), $id));
    }

    public function changePassword(Request $request)
    {
        $id= Auth::guard('instructor')->user()->id ;
        $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required|min:3|confirmed'
        ]);
        return(Instructor::changePassword($request->all(), $id));
    }

    public function messages()
    {
        $instructor = Auth::guard('instructor')->user();
        $inbox = $instructor->inbox;
        $sent = $instructor->sent;
        return view('instructor.profile.messages',compact('inbox','sent'));
    }

    public function chat($id)
    {
        $sms = Message::find($id);
        return view('instructor.profile.chat',compact('sms'));

    }

    public function myCourses()
    {
        $instructor = Auth::guard('instructor')->user();
        $courses = $instructor->courses()->where('status_id',2)->get();
        return view('instructor.profile.my-courses',compact('courses'));
    }

    public function myArticles()
    {

        $instructor = Auth::guard('instructor')->user();
        $articles = $instructor->posts()->where('type','articles')->whereNull('deleted_at')->where('status_id',2)->orderBy('created_at','desc')->get();
        return view('instructor.profile.my-articles',compact('articles'));

    }

    public function myArticleDetails($id)
    {
        $article= Post::where('id',$id)->first();
        return view('instructor.profile.my-article-info',compact('article'));
    }

    public function myCourseDetails($id)
    {
        $course= Course::where('id',$id)->first();
        return view('instructor.profile.course-topics',compact('course'));

    }

    public function sendReply(Request $request)
    {
        $validation = $request->validate(Message::$rules);
        return(Message::saveReply($request->all()));

    }



}

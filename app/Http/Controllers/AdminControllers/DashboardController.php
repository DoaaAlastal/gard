<?php

namespace App\Http\Controllers\AdminControllers;

use App\Message;
use App\User;
use App\Admin;
use App\Course;
use App\Instructor;
use App\Event;
use App\Post;
use App\Notifications\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::count();
        $courses = Course::count();
        $events= Event::count();
        $instructors= Instructor::count();
        return view('admin.home',compact('users','courses','events','instructors'));
        
    }

    public function profile()
    {
        $users = User::count();
        $courses = Course::count();
        $events= Event::count();
        $instructors= Instructor::count();
        return view('admin.profile.index',compact('users','courses','events','instructors'));

    }

    public function updatePersonalInfo(Request $request)
    {
        $id= Auth::guard('admin')->user()->id ;
        $request->validate([
            'en_name'=> 'required',
            'ar_name'=> 'required',
            'email'=> 'required|email|max:255|unique:admins,email,'.$id,
            'phone'=> 'required|max:10',
            'en_address'=> 'required',
            'ar_address'=> 'required',
        ]);
        return(Admin::updatePersonalInfo($request->all(), $id));
    }

    public function updateImage(Request $request)
    {
        $id= Auth::guard('admin')->user()->id ;
        $request->validate([
            'image'=> 'required|image|dimensions:min_width=200,min_height=200',
        ]);
        return(Admin::updateImage($request->all(), $id));
    }

    public function changePassword(Request $request)
    {
        $id= Auth::guard('admin')->user()->id ;
        $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required|min:3|confirmed'
        ]);
        return(Admin::changePassword($request->all(), $id));
    }

    public function messages()
    {
        $admin = Auth::guard('admin')->user();
        $inbox = $admin->inbox;
        $sent = $admin->sent;
        return view('admin.profile.messages',compact('inbox','sent'));
    }

    public function chat($id)
    {
        $sms = Message::find($id);
        return view('admin.profile.chat',compact('sms'));

    }

    public function newMessage(Request $request){
        return(Message::saveMessage($request->all()));
    }

    public function newEmail(Request $request){
        $msg= $request->emailMSG;
        $name= $request->receiver_name;
        if ($request->receiver_type='admin'){
            $receiver = Admin::find($request->receiver_id);
        }
        elseif ($request->receiver_type='instructor'){
            $receiver = Instructor::find($request->receiver_id);
        }
        elseif ($request->receiver_type='user'){
            $receiver = User::find($request->receiver_id);
        }
        $receiver->notify(new SendEmail($name,$msg));
        toastr( 'Email Successful Sent ',  'success',  'Emails');
        return redirect()->back();

    }

    public function sendReply(Request $request)
    {
        $validation = $request->validate(Message::$rules);
        return(Message::saveReply($request->all()));

    }

    public function myCourses()
    {
        $admin = Auth::guard('admin')->user();
        $courses = $admin->courses;
        return view('admin.profile.my-courses',compact('courses'));
    }

    public function myArticles()
    {
        $articles= Post::where('type','articles')
                       ->where('deleted_at',null)
                       ->where('model_type','App\Admin')
                       ->where('model_id',Auth::guard('admin')->user()->id)
                       ->orderBy('created_at','desc')->get();
        return view('admin.profile.my-articles',compact('articles'));

    }

    public function myArticleDetails($id)
    {
        $article= Post::where('id',$id)->first();
        return view('admin.profile.my-article-info',compact('article'));
    }

    public function myCourseDetails($id)
    {
        $course= Course::where('id',$id)->first();
        return view('admin.profile.course-topics',compact('course'));

    }

    public function ban($type ,$id){
        if ($type=='admin'){
            $banned = Admin::find($id);
            $banned->is_active=0;
        }
        elseif ($type=='instructor'){
            $banned = Instructor::find($id);
            $banned->is_active=0;
        }
        elseif ($type=='user'){
            $banned = User::find($id);
            $banned->is_active=0;
        }

        if($banned->save()){
            toastr( 'Successful Banned',  'warning');
            return redirect()->back();
        }

    }

    public function unban($type ,$id){
        if ($type=='admin'){
            $unbanned = Admin::find($id);
            $unbanned->is_active=1;
        }
        elseif ($type=='instructor'){
            $unbanned = Instructor::find($id);
            $unbanned->is_active=1;
        }
        elseif ($type=='user'){
            $unbanned = User::find($id);
            $unbanned->is_active=1;
        }

        if($unbanned->save()){
            toastr( 'Successful Remove Ban!',  'success');
            return redirect()->back();
        }

    }



}

<?php

namespace App\Http\Controllers\UserControllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Course;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }


    public function profile()
    {
        $user= Auth::guard('user')->user() ;
        return view('user.profile.index',compact('user'));

    }

    public function showprofile(){

        $user= Auth::guard('user')->user();
        return view('user.profile.profileUpdate',compact('user'));

    }

    public function show_topic($course_id){

        $course=Course::where('id',$course_id)->first();
        return view('user.profile.showTopics',compact('course'));
    }

    public function updatePersonalInfo(Request $request)
    {
        // var_dump($request);
        $id= Auth::guard('user')->user()->id ;
        $request->validate([
            'en_name'=> 'required',
            'ar_name'=> 'required',
            'en_bio'=> 'required',
            'ar_bio'=> 'required',
            'email'=> 'required|email|max:255|unique:users,email,'.$id,
            'mobile'=> 'required|max:10',
            'en_address'=> 'required',
            'ar_address'=> 'required',
        ]);
        return(User::updatePersonalInfo($request->all(), $id));
    }

    public function updateImage(Request $request)
    {
        $id= Auth::guard('user')->user()->id ;
        $request->validate([
            'image'=> 'required|image|dimensions:min_width=200,min_height=200',
        ]);
        return(User::updateImage($request->all(), $id));
    }

    public function changePassword(Request $request)
    {
        $id= Auth::guard('user')->user()->id ;
        $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required|min:3|confirmed'
        ]);
        return(User::changePassword($request->all(), $id));
    }

    public function messages()
    {
        $user = Auth::guard('user')->user();
        $inbox = $user->inbox;
        $sent = $user->sent;
        return view('user.profile.messages',compact('inbox','sent','user'));
    }

    public function chat($id)
    {
        $user = Auth::guard('user')->user();
        $sms = Message::find($id);
        return view('user.profile.chat',compact('sms','user'));

    }

    public function newMessage(Request $request){
        return(Message::saveMessage($request->all()));
    }

    public function send_reply(Request $request){
        return (Message::saveReply($request->all()));

    }



}

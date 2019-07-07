<?php

namespace App\Http\Controllers\SharedControllers;

use App\Admin;
use App\Http\Helpers ;
use App\Instructor;
use App\Message;
use App\Notifications\SendEmail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MessageController extends Controller
{

    public function admin_new_message(){
        return view('admin.message.internal-message');
    }
    public function admin_email_message(){
        return view('admin.message.email-message');

    }

    public function instructor_new_message(){
        return view('instructor.message.internal-message');
    }
    public function instructor_email_message(){
        return view('instructor.message.email-message');

    }

    public function store(Request $request)
    {
        $receiver = Helpers::getUserByEmail($request->receiver);
        return(Message::saveMessage($request->all()+['receiver_type'=>$receiver['receiver_type'] ,'receiver_id'=>$receiver['receiver_id'] ]));
    }
    public function newMessage(Request $request){
        return(Message::saveMessage($request->all()));
    }
    public function newEmail(Request $request){
        $msg= $request->emailMSG;
        $name= $request->receiver_name;
        if ($request->receiver_type =='admin'){
            $receiver = Admin::find($request->receiver_id);
        }
        elseif ($request->receiver_type =='instructor'){
            $receiver = Instructor::find($request->receiver_id);
        }
        elseif ($request->receiver_type =='user'){
            $receiver = User::find($request->receiver_id);
        }
        $receiver->notify(new SendEmail($name,$msg));
        toastr( 'Email Successful Sent ',  'success',  'Emails');
        return redirect()->back();

    }


    public function new_email(Request $request){
        $msg= $request->emailMSG;
        $receiver= Helpers::getUser($request->email);
        if($receiver){
            $name=$receiver->en_name ;
            $receiver->notify(new SendEmail($name,$msg));
            toastr( 'Email Successful Sent ',  'success',  'Emails');
            return redirect()->back();
        }
        else{
            toastr()->error('Opps ! Check of Receiver Email.');
            return redirect()->back();
        }

    }

}

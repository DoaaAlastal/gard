<?php

namespace App\Http\Controllers\SharedControllers;

use Auth;
use App\Support;
use App\SupportReplies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SupportController extends Controller
{

    public function index()
    {
        $tickets = Support::all();
        return view('admin.support.index',compact('tickets'));
    }

    public function create()
    {
        return view('instructor.support.add');
    }

    public function chaneStatus($action , $id){
        $ticket = Support::find($id);
        if($action == 'open'){
            $ticket->is_active = 1 ;
            $ticket->save();
            toastr( 'Successful Open Ticket',  'success',  'Support');
            return redirect()->back();
        }
        elseif ($action == 'close'){
            $ticket->is_active = 0 ;
            $ticket->save();
            toastr( 'Successful Close Ticket',  'danger',  'Support');
            return redirect()->back();
        }
        elseif ($action == 'reply'){
            return view('admin.support.reply',compact('ticket'));
        }
        else{
            toastr()->error('Opps ! Can not recognize for this action.');
            return redirect()->back();
        }

    }

    public function reply(Request $request){
        $validation = $request->validate(SupportReplies::$rules);
        return(SupportReplies::saveReply($request->all(), null));
    }

    public function ticket(Request $request){
        $validation = $request->validate(Support::$rules);
        return(Support::sendTicket($request->all(), null));
    }

    public function showreply($id){
        $ticket= Support::where('id',$id)->first();
        return view('user.profile.reply',compact('ticket'));
    }


    public function instructor_tickets(){
        $auth = Auth::guard('instructor')->user();
        $tickets = $auth->tickets()->get();
        return view('instructor.support.index',compact('tickets'));
    }

    public function instructor_reply_view($id){
        $ticket= Support::where('id',$id)->first();
        return view('instructor.support.reply',compact('ticket'));
    }



}

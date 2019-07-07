<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\New_;

class Message extends Model
{
    protected $table = 'messages';
    protected $hidden = ['read_at','created_at','updated_at'];
    protected $fillable = ['content'];
    public static $rules =[
        'content'=> 'required|max:150',
    ];

    public function sender()
    {
        return $this->morphTo();
    }

    public function receiver()
    {
        return $this->morphTo();
    }
    public function replies()
    {
        return $this->hasMany($this, 'parent_id');
    }

    public static function saveMessage($attributes){
        $message =new Message();
        $message->sender_type= $attributes['sender_type'];
        $message->sender_id= $attributes['sender_id'];
        $message->receiver_type= $attributes['receiver_type'];
        $message->receiver_id= $attributes['receiver_id'];
        $message->content= $attributes['content'];
        $message->created_at =date('Y-m-d H:i:s');
        if($message->save()){
            toastr( 'Message Successful Sent ',  'success',  'Messages');
            return redirect()->back();
        }
        else{
            toastr()->error('Opps ! An error has occurred.');
            return redirect()->back();

        }
    }



    public static function saveReply($attributes){
        $parent = self::findOrFail($attributes['parent_id']);
        $sender = $parent->sender ;
        $receiver = $parent->receiver ;
        $sms =new Message();
        if(Auth::guard('admin')->check()){
            $auth= Auth::guard('admin')->user();
            $sms->sender_type='App\Admin';
        }
        elseif(Auth::guard('instructor')->check()){
            $auth= Auth::guard('instructor')->user();
            $sms->sender_type='App\Instructor';
        }
        else{
            $auth= Auth::guard('user')->user();
            $sms->sender_type='App\User';
        }
        $sms->sender_id=$auth->id;
        $sms->parent_id=$attributes['parent_id'];
        $sms->content=$attributes['content'];
        $sms->created_at =date('Y-m-d H:i:s');
        if($auth == $sender){
            $sms->receiver_type= $parent->receiver_type;
            $sms->receiver_id= $parent->receiver_id;
        }
        else{
            $sms->receiver_type= $parent->sender_type;
            $sms->receiver_id= $parent->sender_id;
        }

        if($sms->save()){
            toastr( 'Successful Sent',  'success',  'Messages');
            return redirect()->back();
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect()->back();
    }

}

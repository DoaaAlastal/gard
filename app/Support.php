<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'support';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['subject','content','attachment'];
    public static $rules =[
        'subject'=> 'required|max:150',
        'content'=> 'required|max:150',
    ];

    public function sender()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->hasMany('App\SupportReplies');
    }

    public static function sendTicket($attributes){

        if (\Request::hasFile('attachment')) {
            $attachment = \Request::file('attachment');
            $name = time().$attachment->getClientOriginalName();
            $destinationPath = "uploads/support/";
            $attachment->move($destinationPath, $name);
        }

        $ticket = new Support();
        $ticket->sender_type = $attributes['sender_type'];
        $ticket->sender_id = $attributes['sender_id'];
        $ticket->subject = $attributes['subject'];
        $ticket->content = $attributes['content'];
        $ticket->attachment = null ;
        if (\Request::hasFile('attachment')) {
            $ticket->attachment = 'uploads/support/' .$name;
        }
        $ticket->is_active = 1 ;
        $ticket->created_at =date('Y-m-d H:i:s');
        if($attributes['sender_type'] == 'App\Admin'){
            $url = 'admin/support';
        }
        elseif($attributes['sender_type'] == 'App\Instructor'){
            $url = 'instructor/support/instructor-support-ticket';
        }
        elseif($attributes['sender_type'] == 'App\User'){
            $url = 'student/account';
        }
        $ticket->save();
        return redirect($url);

    }
}

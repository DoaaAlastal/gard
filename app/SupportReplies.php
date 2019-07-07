<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportReplies extends Model
{
    protected $table = 'support_replies';
    public static $rules =[
        'content'=> 'required|max:100',
    ];
    public function sender()
    {
        return $this->morphTo();
    }

    public static function saveReply($attributes){
        $reply = new SupportReplies();
        $reply->support_id = $attributes['support_id'];
        $reply->content = $attributes['content'];
        $reply->sender_type = $attributes['sender_type'];
        $reply->sender_id = $attributes['sender_id'];
        $reply->created_at =date('Y-m-d H:i:s');
        $reply->save();
        return redirect()->back();

    }


}

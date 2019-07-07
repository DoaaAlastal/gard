<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseAttachments extends Model
{
    protected $table = 'course_attachments';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['course_id'];

    public function Course(){
        return $this->belongsTo('App\Course');
    } 

    
}

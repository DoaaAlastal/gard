<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersCourses extends Model
{
    protected $table = 'course_user';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['user_id','course_id','enroll_date'];
    public static $rules =[
        'user_id'=> 'required',
        'course_id'=> 'required',
    ]; 

   
    
   
    public static function saveUsersCourses($course,$user){

            $UsersCourses =new UsersCourses();
            $UsersCourses->user_id = $user;
            $UsersCourses->course_id = $course;
            $UsersCourses->enroll_date =date('Y-m-d H:i:s');
            $UsersCourses->created_at =date('Y-m-d H:i:s');
            if($UsersCourses->save()){
                return redirect('student/account');
            }


    }

    
}

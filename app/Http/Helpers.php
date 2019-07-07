<?php

namespace App\Http;


use App\Admin;
use App\Instructor;
use App\User;

class Helpers
{

    public static function getAllUsers() {
        $users=[];
        $admins= Admin::whereNull('deleted_at')->get();
        $instructors = Instructor::whereNull('deleted_at')->get();
        $students = User::whereNull('deleted_at')->get();

        foreach ($admins as $admin){
            $obj =new \stdClass();
            $obj->model_type = 'App\Admin';
            $obj->model_id = $admin->id ;
            $obj->en_name = $admin->en_name ;
            $obj->ar_name = $admin->ar_name ;
            $obj->email = $admin->email ;
            array_push($users,$obj);
        }
        foreach ($instructors as $instructor){
            $obj =new \stdClass();
            $obj->model_type = 'App\Instructor';
            $obj->model_id = $instructor->id ;
            $obj->en_name = $instructor->en_name ;
            $obj->ar_name = $instructor->ar_name ;
            $obj->email = $instructor->email ;
            array_push($users,$obj);
        }
        foreach ($students as $student){
            $obj =new \stdClass();
            $obj->model_type = 'App\User';
            $obj->model_id = $student->id ;
            $obj->en_name = $student->en_name ;
            $obj->ar_name = $student->ar_name ;
            $obj->email = $student->email ;
            array_push($users,$obj);
        }
        return $users;
    }

    public static function getUserByEmail($email){
        $user = [];
        if( $admin= Admin::where('email',$email)->first() ){
            $user['receiver_type']='App\Admin';
            $user['receiver_id']=$admin->id;
        }
        elseif( $instructor= Instructor::where('email',$email)->first() ){
            $user['receiver_type']='App\Instructor';
            $user['receiver_id']=$instructor->id;
        }
        elseif( $student= User::where('email',$email)->first() ){
            $user['receiver_type']='App\User';
            $user['receiver_id']=$student->id;
        }
        return $user;

    }

    public static function getUser($email){

        if( $admin= Admin::where('email',$email)->first() ){
            return $admin ;
        }
        elseif( $instructor= Instructor::where('email',$email)->first() ){
            return $instructor ;
        }
        elseif( $student= User::where('email',$email)->first() ){
            return $student ;
        }


    }

}

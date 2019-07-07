<?php

namespace App\Http\Controllers\SharedControllers;

use App\Post;
use App\Event;
use Auth;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function post_comment(Request $request,Post $post)
    {

        $request->validate([
            'comment' => 'required',
        ]);
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user();
        }
        elseif (Auth::guard('instructor')->check()){
            $user = Auth::guard('instructor')->user();
        }
        elseif (Auth::guard('admin')->check()){
            $user = Auth::guard('admin')->user();
        }
//        dd($user);
        $user->comment($post, $request->input('comment'));

        return redirect()->back();
    }
    public function event_comment(Request $request,Event $event)
    {

        $request->validate([
            'comment' => 'required',
        ]);
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user();
        }
        elseif (Auth::guard('instructor')->check()){
            $user = Auth::guard('instructor')->user();
        }
        elseif (Auth::guard('admin')->check()){
            $user = Auth::guard('admin')->user();
        }
//        dd($user);
        $user->comment($event, $request->input('comment'));

        return redirect()->back();
    }
    public function course_comment(Request $request,Course $course)
    {

        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user();
        }
        elseif (Auth::guard('instructor')->check()){
            $user = Auth::guard('instructor')->user();
        }
        elseif (Auth::guard('admin')->check()){
            $user = Auth::guard('admin')->user();
        }


        $request->validate([
            'comment' => 'required',
        ]);
        $user->comment($course, $request->input('comment'));
        return redirect()->back();

    }


}

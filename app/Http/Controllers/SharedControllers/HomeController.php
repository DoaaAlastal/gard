<?php

namespace App\Http\Controllers\SharedControllers;

use App\Review;
use App\Course;
use App\Event;
use App\Instructor;
use App\Page;
use App\Post;
use App\Slider ;
use App\Section;
use App\Service;
use App\Http\Controllers\Controller;
use App\User;
use App\Tag;
use App\Video;
use Auth;
use App\UsersCourses;
use App\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $slides = Slider::all();
        $sections = Section::all();
        $courses = Course::where('status_id',2)->take(9)->get();
        $instructors = Instructor::OrderBy('created_at')->take(4)->get();
        $stdcount =  User::count();
        $inscount = Instructor::count();
        $corcount = Course::where('status_id',2)->count();
        $evecount = Event::count();
        $videos = Video::OrderBy('created_at')->take(15)->get();
        $categories= Category::all();
        $news  = Post::orderBy('created_at','desc')->where('type','news')->whereNull('deleted_at')->take(6)->get();
        $services = Service::all();
        $index=0;
        $arindex=0;
        return view('index',compact('index','arindex','categories','videos','sections','courses','slides','instructors','stdcount','inscount','corcount','evecount','news','services'));
    }

    public function page($name){
        $page = Page::where('en_name',$name)->first();
        return view('general.page',compact('page'));
    }

    public function videos(){
        $videos=Video::all();
        $categories= Category::all();
        return view('general.videos.all',compact('videos','categories'));
    }
    public function courses($category=''){
        if (! is_null($category)){
            $courses = Course::where('is_closed',0)->paginate(6);
        }
        else{
            $courses = Course::where('is_closed',0)->paginate(6);
        }

        return view('general.courses.all',compact('courses'));
    }

    public function course_details($id){
        $latest = Course::where('is_closed',0)->take(5)->get();
        $course = Course::find($id);
        return view('general.courses.show',compact('course','latest'));
    }
    
     public function course_enroll($id){
        if(Auth::guard('user')->check()){
            return UsersCourses::saveUsersCourses($id , Auth::guard('user')->user()->id);
        }
        else{
            return redirect('student/login');
        }
    }

    public function review_course(Request $request){
        if(Auth::guard('user')->check()){
            return Review::saveReview($request->all() +['user' => Auth::guard('user')->user()->id]);
        }
        else{
            return redirect('student/login');
        }
    }


    public function online_events()
    {
        $onlineEvents = Event::where('IsOnline','!=',0)->paginate(6);
        return view('general.events.OnlineEvents',compact('onlineEvents'));
    }

    public function offline_events()
    {
        $offlineEvents = Event::where('IsOnline','!=',1)->paginate(6);
        return view('general.events.OfflineEvents',compact('offlineEvents'));
    }

    public function event_details($id){

        $event = Event::where('id',$id)->first();
        return view('general.events.show',compact('event'));

    }

    public function articals(){

        $tag=Tag::all();
        $category=Category::all();
        $articals = Post::where('type','articles')->whereIn('status_id',[2])->paginate(8);
        return view('general.posts.artical',compact('articals','tag','category'));

    }

    public function news(){

        $tag=Tag::all();
        $category=Category::all();
        $news = Post::where('type','news')->whereIn('status_id',[2])->paginate(8);
        return view('general.posts.news',compact('news','tag','category'));

    }

    public function post_details($id){

        $category=Category::all();
        $post = Post::where('id',$id)->first();
        return view('general.posts.show',compact('post','category'));

    }


}

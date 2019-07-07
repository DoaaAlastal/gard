<?php

namespace App;

use Auth;
use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Course extends Model implements FromCollection,WithHeadings, Commentable
{
    use HasComments;


    protected $table = 'courses';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['category_id','en_title','ar_title','en_description','ar_description','big_image','thumb_image','tags','number_of_hours','number_of_videos','price','discount','currency_id','is_closed'];
    public static $save_rules =[
        'en_title'=> 'required|max:150',
        'ar_title'=> 'required|max:150',
        'en_description'=> 'required',
        'ar_description'=> 'required',
        'big_image'=>'required',
        'thumb_image'=>'required',
    ]; 

    public static $update_rules =[
        'en_title'=> 'required|max:150',
        'ar_title'=> 'required|max:150',
        'en_description'=> 'required',
        'ar_description'=> 'required',
    ];



    public function model()
    {
        return $this->morphTo();
    }

    public function users(){
        return  $this->belongsToMany('App\User');
    }
    public function tags(){
        return  $this->hasMany('App\Tag');
    }
    public function topics(){
        return  $this->hasMany('App\Topic');
    }
    public function status(){
        return  $this->belongsTo('App\Status');
    }

    public function currency(){
        return  $this->belongsTo('App\Currency');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function attachments(){
        return  $this->hasMany('App\CourseAttachments');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function stars($i)
    {
        return $this->reviews()->where('rate',$i)->count();
    }


    public static function saveCourse($attributes,$id){
        if (\Request::hasFile('big_image')) {
            $big_image = \Request::file('big_image');
            $name = time().$big_image->getClientOriginalName();
            $destinationPath = "uploads/courses/big/";
            $big_image->move($destinationPath, $name);
        }
        if (\Request::hasFile('thumb_image')) {
            $thumb_image = \Request::file('thumb_image');
            $tname = time().$thumb_image->getClientOriginalName();
            $destinationPath = "uploads/courses/thumb/";
            $thumb_image->move($destinationPath, $tname);
        }
        if(is_null($id)){
            $Course =new Course();
            $Course->model_type= $attributes['model_type'];
            $Course->model_id= $attributes['model_id'];
            $Course->created_at =date('Y-m-d H:i:s');
        }else{
            $Course = self::findOrFail($id);
            $Course->model_type= $attributes['model_type'];
            $Course->model_id= $attributes['model_id'];
            $Course->updated_at =date('Y-m-d H:i:s');
        }
        if($attributes['model_type'] == 'App\Admin'){
            $Course->status_id=2;
            $url = 'admin/course/';
        }
        else{
            $Course->status_id=1;
            $url = 'instructor/requests/courses';
        }

        $inputs =  ['category_id','en_title','ar_title','en_description','ar_description','big_image','thumb_image','tags',
        'number_of_hours','number_of_videos','price','discount','currency_id','is_closed'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Course->$key=$value;
                }
                if($key =="big_image"){
                    $Course->big_image='uploads/courses/big/'.$name ;
                }
                if($key =="thumb_image"){
                    $Course->thumb_image='uploads/courses/thumb/'.$tname ;
                }
                if($key=="tags"){
                    $Course->tags = implode(',',(array)$value);
                }

            }
        }

        if($Course->save()){
            if( is_null($id) ){
                if( \Request::hasFile('course_attachments')){
                    foreach (\Request::file('course_attachments') as $file) {
                        $originalname = $file->getClientOriginalName();
                        $name = time().$file->getClientOriginalName();
                        $destinationPath = "uploads/courses/attachments/";
                        $file->move($destinationPath, $name);

                        $CourseAttachments = new CourseAttachments();
                        $CourseAttachments->course_id = $Course->id ;
                        $CourseAttachments->attachment_name = $originalname;
                        $CourseAttachments->attachment_path = "uploads/courses/attachments/".$name;
                        $CourseAttachments->created_at =date('Y-m-d H:i:s');
                        $CourseAttachments->save();
                    }
                }


                toastr( 'Successful Saving',  'success',  'Course');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Course');
            }

            return redirect($url);
        }
        return redirect()->back();
    }

    public function collection()
    {
        return Course::select('en_title','number_of_hours','price')->get();
    }


    public function headings(): array
    {
        return [
            'Title',
            'No. Hours',
            'Price',
        ];
    }

    
}

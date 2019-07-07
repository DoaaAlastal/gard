<?php

namespace App;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Status;

class Post extends Model implements Commentable
{
    use SoftDeletes,HasComments;


    protected $table = 'posts';
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['en_author','ar_author','category_id','en_title','ar_title','en_content','ar_content','big_image','thumb_image','tags',
    'video','type'];
    public static $save_rules =[
        'en_title'=> 'required|max:150',
        'ar_title'=> 'required|max:150',
        'big_image'=>'required',
        'thumb_image'=>'required',
        'category_id'=>'required',
        'type'=>'required',
    ];

    public static $update_rules =[
        'en_title'=> 'required|max:150',
        'ar_title'=> 'required|max:150',
        'category_id'=>'required',
        'type'=>'required',
    ];

    public function Status(){
        return  $this->belongsTo(Status::class);
    }
    public function Category(){
        return  $this->belongsTo(Category::class);
    }

    public function model()
    {
        return $this->morphTo();
    }


    public static function savePost($attributes,$id){
        if($attributes['type']=='news'){
            $title='News';
        }
        elseif ($attributes['type']=='articles'){
            $title='Articles';
        }
        if (\Request::hasFile('big_image')) {
            $big_image = \Request::file('big_image');
            $name = time().$big_image->getClientOriginalName();
            $destinationPath = "uploads/posts/big/";
            $big_image->move($destinationPath, $name);
        }
        if (\Request::hasFile('thumb_image')) {
            $thumb_image = \Request::file('thumb_image');
            $tname = time().$thumb_image->getClientOriginalName();
            $destinationPath = "uploads/posts/thumb/";
            $thumb_image->move($destinationPath, $tname);
        }
        if(is_null($id)){
            $Post =new Post();
            $Post->model_type= $attributes['model_type'];
            $Post->model_id= $attributes['model_id'];
            $Post->created_at =date('Y-m-d H:i:s');
        }else{
            $Post = self::findOrFail($id);
            $Post->updated_at =date('Y-m-d H:i:s');
        }

        if($attributes['model_type'] == 'App\Admin'){
            $Post->status_id=2;
            $url = 'admin/posts/'.$attributes['type'];
        }
        else{
            $Post->status_id=1;
            $url = 'instructor/requests/'.$attributes['type'];
        }

        $inputs =  ['en_author','ar_author','category_id','en_title','ar_title','en_content','ar_content','big_image','thumb_image','tags',
        'video','type'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Post->$key=$value;
                }
                if($key =="big_image"){
                    $Post->big_image='uploads/posts/big/'.$name ;
                    
                }
                if($key =="thumb_image"){
                    $Post->thumb_image='uploads/posts/thumb/'.$tname ;
                }
                if($key=="tags"){
                   $Post->tags = implode(',',(array)$value);
                }

            }
        }

        if($Post->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  $title);
            }
            else{
                toastr( 'Successful Updating',  'info',  $title);
            }

            return redirect($url);
        }
        return redirect()->back();
    }
}

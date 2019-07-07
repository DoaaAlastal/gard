<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['en_title','ar_title','en_description','ar_description','category_id','thumb_image','url','tags','status_id'];
    public static $save_rules =[
        'en_title'=> 'required|max:100',
        'ar_title'=> 'required|max:100',
        'en_description'=> 'required',
        'ar_description'=> 'required',
        'category_id'=>'required',
        'thumb_image'=>'required',
        'url'=>'required'
    ];
    public static $update_rules =[
        'en_title'=> 'required|max:100',
        'ar_title'=> 'required|max:100',
        'en_description'=> 'required',
        'ar_description'=> 'required',
        'category_id'=>'required',
        'url'=>'required'
    ];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function model()
    {
        return $this->morphTo();
    }

    public static function saveVideo($attributes,$id ,$url){
        if (\Request::hasFile('thumb_image')) {
            $image = \Request::file('thumb_image');
            $name = time().$image->getClientOriginalName();
            $destinationPath = "uploads/videos/thumbs/";
            $image->move($destinationPath, $name);
        }
        if(is_null($id)){
            $video =new Video();
            $video->created_at =date('Y-m-d H:i:s');
            $video->model_type =$attributes['model_type'];
            $video->model_id =$attributes['model_id'];
            $video->created_at =date('Y-m-d H:i:s');
        }else{
            $video = self::findOrFail($id);
            $video->model_type =$attributes['model_type'];
            $video->model_id =$attributes['model_id'];
            $video->updated_at =date('Y-m-d H:i:s');
        }

        if($attributes['model_type'] == 'App\Admin'){
            $video->status_id=2;
        }
        else{
            $video->status_id=1;
        }

        $inputs =  ['en_title','ar_title','en_description','ar_description','category_id','thumb_image','url','tags'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $video->$key=$value;
                }
                if($key =="thumb_image"){
                    $video->thumb_image='uploads/videos/thumbs/'.$name ;
                }
                if($key=="tags"){
                    $video->tags = implode(',',(array)$value);
                }
            }
        }


        if($video->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Video');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Video');
            }
            return redirect($url);
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect($url);
    }
}

<?php

namespace App;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use Illuminate\Database\Eloquent\Model;

class Event extends Model implements Commentable
{
    use HasComments;


    protected $table = 'events';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['en_title','ar_title','en_description','ar_description','big_image','thumb_image','tags','en_location','ar_location','IsOnline','start_at','end_at','video'];
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

    public function Tag(){
        return $this->belongsTo(Tag::class);
    }

    public static function saveEvent($attributes,$id){
        if (\Request::hasFile('big_image')) {
            $big_image = \Request::file('big_image');
            $name = time().$big_image->getClientOriginalName();
            $destinationPath = "uploads/event/big/";
            $big_image->move($destinationPath, $name);
        }
        if (\Request::hasFile('thumb_image')) {
            $thumb_image = \Request::file('thumb_image');
            $tname = time().$thumb_image->getClientOriginalName();
            $destinationPath = "uploads/event/thumb/";
            $thumb_image->move($destinationPath, $tname);
        }
           if(is_null($id)){
                $Event =new Event();
                $Event->created_at =date('Y-m-d H:i:s');
            }else{
                $Event = self::findOrFail($id);
                $Event->updated_at =date('Y-m-d H:i:s');
            }

        $inputs =  ['en_title','ar_title','en_description','ar_description','big_image','thumb_image','tags','en_location','ar_location','IsOnline','start_at','end_at','video'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Event->$key=$value;
                }
                if($key =="big_image"){
                    $Event->big_image='uploads/event/big/'.$name ;
                    
                }
                if($key =="thumb_image"){
                    $Event->thumb_image='uploads/event/thumb/'.$tname ;
                    
                }
                if($key=="tags"){
                    $Event->tags = implode(',',(array)$value);
                }

            }
        }

        if($Event->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Event');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Event');
            }

            return redirect('admin/event/');
        }
        return redirect('admin/event/');
    }
}

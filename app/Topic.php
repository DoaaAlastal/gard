<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['course_id','en_title','ar_title','en_description','ar_description','video'];
    public static $rules =[
        'en_title'=> 'required|max:150',
        'ar_title'=> 'required|max:150',
        'course_id'=> 'required',
    ];

    public function course(){
        return  $this->belongsTo('App\Course');
    }

    public static function saveTopic($attributes,$id){
        if(is_null($id)){
            $Topic =new Topic();
            $Topic->created_at =date('Y-m-d H:i:s');
        }else{
            $Topic = self::findOrFail($id);
            $Topic->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['course_id','en_title','ar_title','en_description','ar_description','video'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Topic->$key=$value;
                }

            }
        }

        if($Topic->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Topic');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Topic');
            }

            return redirect()->back();
        }
        return redirect()->back();
    }
}

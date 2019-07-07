<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['en_title','ar_title','en_description','ar_description','icon_class','color'];
    public static $rules =[
        'en_title'=> 'required|max:100',
        'ar_title'=> 'required|max:100',
        'en_description'=> 'required',
        'ar_description'=> 'required',
    ];

    public static function saveSection($attributes,$id){

        if(is_null($id)){
            $Section =new Section();
            $Section->created_at =date('Y-m-d H:i:s');
        }else{
            $Section = self::findOrFail($id);
            $Section->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['en_title','ar_title','en_description','ar_description','icon_class','color'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Section->$key=$value;
                }
            }
        }


        if($Section->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Section');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Section');
            }
            return redirect('admin/section/');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/section/');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['en_name','ar_name'];
    public static $rules =[
        'en_name'=> 'required|max:100',
        'ar_name'=> 'required|max:100',
    ];

    public function course(){
        return  $this->belongsTo('App\Course');
    }

    public static function saveTag($attributes,$id){
        if(is_null($id)){
            $Tag =new Tag();
            $Tag->created_at =date('Y-m-d H:i:s');
        }else{
            $Tag = self::findOrFail($id);
            $Tag->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['en_name','ar_name'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Tag->$key=$value;
                }
            }
        }


        if($Tag->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Tag');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Tag');
            }

            return redirect('admin/tag/');
        }
        return redirect('admin/tag/');
    }
}

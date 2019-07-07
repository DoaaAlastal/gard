<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['en_name','ar_name','en_title','ar_title','en_content','ar_content'];
    public static $rules =[
        'en_name'=> 'required|max:150',
        'ar_name'=> 'required|max:150',
        'en_title'=> 'required|max:150',
        'ar_title'=> 'required|max:150',
        'en_content'=> 'required',
        'ar_content'=> 'required',
    ];

    public static function savePage($attributes,$id){
        if(is_null($id)){
            $Page =new Page();
            $Page->created_at =date('Y-m-d H:i:s');
        }else{
            $Page = self::findOrFail($id);
            $Page->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['en_name','ar_name','en_title','ar_title','en_content','ar_content'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Page->$key=$value;
                }

            }
        }

        if($Page->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Page');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Page');
            }

            return redirect('admin/page/');
        }
        return redirect('admin/page/');
    }


    public static function getPage($name){
        return self::where('en_name',$name)->first();
    }


}

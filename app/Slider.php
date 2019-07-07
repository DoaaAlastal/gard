<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['en_title','ar_title','en_description','ar_description','image'];
    public static $save_rules =[
        'en_title'=> 'required|max:100',
        'ar_title'=> 'required|max:100',
        'en_description'=> 'required',
        'ar_description'=> 'required',
        'image'=>'required',
    ];
    public static $update_rules =[
        'en_title'=> 'required|max:100',
        'ar_title'=> 'required|max:100',
        'en_description'=> 'required',
        'ar_description'=> 'required',
    ];

    public static function saveSlide($attributes,$id){
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = time().$image->getClientOriginalName();
            $destinationPath = "uploads/slider/";
            $image->move($destinationPath, $name);
        }
        if(is_null($id)){
            $Slide =new Slider();
            $Slide->created_at =date('Y-m-d H:i:s');
        }else{
            $Slide = self::findOrFail($id);
            $Slide->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['en_title','ar_title','en_description','ar_description','image'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Slide->$key=$value;
                }
                if($key =="image"){
                    $Slide->image='uploads/slider/'.$name ;
                    
                }
            }
        }

        if($Slide->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Slider');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Slider');
            }
            return redirect('admin/slider/');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/slider/');
    }

}

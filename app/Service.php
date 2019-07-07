<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['en_name','ar_name','en_description','ar_description','icon_class'];
    public static $rules =[
        'en_name'=> 'required|max:100',
        'ar_name'=> 'required|max:100',
        'en_description'=> 'required',
        'ar_description'=> 'required',
    ];

    public static function saveService($attributes,$id){

        if(is_null($id)){
            $Service =new Service();
            $Service->created_at =date('Y-m-d H:i:s');
        }else{
            $Service = self::findOrFail($id);
            $Service->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['en_name','ar_name','en_description','ar_description','icon_class'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Service->$key=$value;
                }
            }
        }


        if($Service->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Service');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Service');
            }
            return redirect('admin/service/');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/service/');
    }
}

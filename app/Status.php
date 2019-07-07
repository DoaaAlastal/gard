<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = ['en_name','ar_name'];
    public static $rules =[
        'en_name'=> 'required',
        'ar_name'=> 'required',
    ];

    public static function saveStatus($attributes,$id){
        if(is_null($id)){
            $Status =new Status();
            $Status->created_at =date('Y-m-d H:i:s');
        }else{
            $Status = self::findOrFail($id);
            $Status->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['en_name','ar_name'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Status->$key=$value;
                }
            }
        }


        if($Status->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Status');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Status');
            }
            return redirect('admin/status/');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/status/');

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency';
    protected $fillable = ['en_name','ar_name','sign'];
    public static $rules =[
        'en_name'=> 'required|max:100',
        'ar_name'=> 'required|max:100',
        'sign'=>'required|max:3',
    ];


    public function country(){
        return  $this->hasOne('App\Country');
    }

    public static function saveCurrency($attributes,$id){
        if(is_null($id)){
            $Currency =new Currency();
            $Currency->created_at =date('Y-m-d H:i:s');
        }else{
            $Currency = self::findOrFail($id);
            $Currency->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['en_name','ar_name','sign'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Currency->$key=$value;
                }
            }
        }


        if($Currency->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Currency');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Currency');
            }

            return redirect('admin/currencies/');
        }
        return redirect('admin/currencies/');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = ['en_name','ar_name','country_id'];
    public static $rules =[
        'en_name'=> 'required|max:100',
        'ar_name'=> 'required|max:100',
        'country_id'=> 'required',
    ];


    public function country(){
        return  $this->belongsTo('App\Country');
    }

    public static function saveCity($attributes,$id){
        if(is_null($id)){
            $city =new City();
            $city->created_at =date('Y-m-d H:i:s');
        }else{
            $city = self::findOrFail($id);
            $city->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['en_name','ar_name','country_id'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $city->$key=$value;
                }
            }
        }



        if($city->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'City');
            }
            else{
                toastr( 'Successful Updating',  'info',  'City');
            }
            return redirect('admin/country-cities/'.$attributes['country_id']);
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/country-cities/'.$attributes['country_id']);


    }
}

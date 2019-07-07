<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    protected $fillable = ['en_name','ar_name'];
    public static $save_rules =[
        'en_name'=> 'required|max:100',
        'ar_name'=> 'required|max:100',
    ];
    public static $update_rules =[
        'en_name'=> 'required|max:100',
        'ar_name'=> 'required|max:100',
    ];

    public function cities(){
        return  $this->hasMany('App\City');
    }

    public static function saveCountry($attributes,$id){
        
        if(is_null($id)){
            $Country =new Country();
            $Country->created_at =date('Y-m-d H:i:s');
        }else{
            $Country = self::findOrFail($id);
            $Country->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['en_name','ar_name'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Country->$key=$value;
                }
            }
        }

        if($Country->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Countries');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Countries');
            }

            return redirect('admin/countries/');
        }
        return redirect('admin/countries/');

    }

}

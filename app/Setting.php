<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $hidden = ['created_at','updated_at'];

    public static function getValue($name){
       return self::where('name',$name)->first();
    }
}

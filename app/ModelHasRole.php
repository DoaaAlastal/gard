<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasRole extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\Admin','model_id');
    }

    public function role(){
        return $this->belongsTo('App\Role','role_id');
    }
}


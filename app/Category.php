<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['en_name','ar_name','parent_id','en_description','ar_description','image','icon'];
    public static $rules =[
        'en_name'=> 'required|max:100',
        'ar_name'=> 'required|max:100',
        'en_description'=> 'required',
        'ar_description'=> 'required',
        'image'=>'required',
        'icon'=>'required' 
    ];

    public function subs()
    {
        return $this->hasMany($this, 'parent_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public static function saveCategory($attributes,$id){
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = time().$image->getClientOriginalName();
            $destinationPath = "uploads/categories/images/";
            $image->move($destinationPath, $name);
        }
        if (\Request::hasFile('icon')) {
            $icon = \Request::file('icon');
            $iname = time().$image->getClientOriginalName();
            $destinationPath = "uploads/categories/icons";
            $icon->move($destinationPath, $iname);
        }
        if(is_null($id)){
            $Category =new Category();
            $Category->created_at =date('Y-m-d H:i:s');
        }else{
            $Category = self::findOrFail($id);
            $Category->updated_at =date('Y-m-d H:i:s');
        }

        $inputs =  ['en_name','ar_name','parent_id','en_description','ar_description','image','icon'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Category->$key=$value;
                }
                if($key =="image"){
                    $Category->image='uploads/categories/images/'.$name ;
                    
                }
                if($key =="icon"){
                    $Category->icon='uploads/categories/icons/'.$iname ;
                    
                }
            }
        }


        if($Category->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Category');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Category');
            }
            return redirect('admin/category/');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/category/');
    }
}

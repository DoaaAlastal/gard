<?php

namespace App;

use App\Notifications\SendEmail;
use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Actuallymab\LaravelComment\CanComment;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Admin extends Authenticatable implements FromCollection,WithHeadings
{
    use HasRoles,Notifiable,SoftDeletes,CanComment;
    protected $guard_name = 'web'; // or whatever guard you want to use
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admins';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'en_name','ar_name', 'email', 'password','phone','en_address','ar_address','image','en_job_title',
        'ar_job_title','en_bio','ar_bio','facebook','twitter'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at','updated_at'
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }

    public function SystemSendEmail($msg)
    {
        $this->notify(new SendEmail($msg));
    }
    public static $save_rules =[
        'en_name'=> 'required|max:100',
        'ar_name'=> 'required|max:100',
        'email' => 'required|email|max:255|unique:admins',
        'password' => 'required|confirmed',
        'image'=>'required',
    ];

    public static $update_rules =[ 
        'email' => 'required|string|email|max:255',
    ];

    public function courses()
    {
        return $this->morphMany('App\Course', 'model');
    }

    public function posts()
    {
        return $this->morphMany('App\Post', 'model');
    }

    public function inbox()
    {
        return $this->morphMany('App\Message', 'receiver')->whereNull('parent_id');
    }

    public function sent()
    {
        return $this->morphMany('App\Message', 'sender')->whereNull('parent_id');
    }

    public function ticket()
    {
        return $this->morphMany('App\Support', 'sender');
    }

    public function videos()
    {
        return $this->morphMany('App\Video', 'model');
    }


    public static function saveAdmin($attributes,$id){
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = time().$image->getClientOriginalName();
            $destinationPath = "uploads/admins/";
            $image->move($destinationPath, $name);
        }
        if(is_null($id)){
            $Admin =new Admin();
            $Admin->password=Hash::make($attributes['password']);
            $Admin->created_at =date('Y-m-d H:i:s');
        }else{
            $Admin = self::findOrFail($id);
            $Admin->updated_at =date('Y-m-d H:i:s');
        }

        $inputs =  [ 'en_name','ar_name', 'email', 'password','phone','en_address','ar_address','image','en_job_title',
            'ar_job_title','en_bio','ar_bio','facebook','twitter'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Admin->$key=$value;
                }
                if($key =="image"){
                    $Admin->image='uploads/admins/'.$name ;
                    
                }
                
            }
        }


        if($Admin->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Admin');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Admin');
            }
            return redirect('admin/admin/');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/admin/');
    }

    public static function updatePersonalInfo($attributes,$id){
        $admin = self::findOrFail($id);
        $admin->updated_at =date('Y-m-d H:i:s');
        $inputs = ['en_name','ar_name', 'email','phone','en_address','ar_address'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $admin->$key=$value;
                }
            }
        }
        if($admin->save()){
            toastr( 'Successful Updating',  'info',  'Admin');
            return redirect()->back();
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect()->back();
    }

    public static function updateImage($attributes,$id){
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = time().$image->getClientOriginalName();
            $destinationPath = "uploads/admins";
            $image->move($destinationPath, $name);
        }
        $user = self::findOrFail($id);
        $user->updated_at =date('Y-m-d H:i:s');
        $inputs = ['image'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if($key =="image"){
                    $user->image='uploads/admins/'.$name ;
                }
            }
        }
        if($user->save()){
            toastr( 'Successful Updating',  'info',  'Admin');
            return redirect()->back();
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect()->back();

    }

    public static function changePassword($attributes,$id){
        $user = self::findOrFail($id);
        $user->updated_at =date('Y-m-d H:i:s');
        if(Hash::check($attributes['oldpassword'], $user->password)){
            $user->password = Hash::make($attributes['newpassword']);
            $user->save();
            toastr( 'Successful Updating',  'info',  'Admin');
            return redirect()->back();
        }
        else{
            toastr()->error('Opps ! An error has occurred.');
            return redirect()->back();
        }

    }

    public function collection()
    {
        return Admin::select('en_name','email','en_job_title','en_address','phone')->get();
    }


    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Job Title',
            'Address',
            'Mobile'
        ];
    }




}

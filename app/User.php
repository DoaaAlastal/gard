<?php

namespace App;

use Hash;
use App\Notifications\SendEmail;
use App\Notifications\UserResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Actuallymab\LaravelComment\CanComment;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class User extends Authenticatable implements FromCollection,WithHeadings
{
    use Notifiable, SoftDeletes,CanComment;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'en_name', 'email', 'password','ar_name','en_bio','ar_bio','en_address','ar_address'
        ,'mobile','image','city_id','country_id','facebook','twitter'
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
        $this->notify(new UserResetPassword($token));
    }

    public function SystemSendEmail($msg)
    {
        $this->notify(new SendEmail($msg));
    }

    public static $save_rules =[
        'en_name'=> 'required|max:100',
        'ar_name'=> 'required|max:100',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed',
        'image'=>'required',
    ];
    public static $update_rules =[ 
        'email' => 'required|string|email|max:255',
    ];

    public function inbox()
    {
        return $this->morphMany('App\Message', 'receiver');
    }

    public function sent()
    {
        return $this->morphMany('App\Message', 'sender');
    }

    public function tickets()
    {
        return $this->morphMany('App\Support', 'sender');
    }


    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public static function saveUser($attributes,$id){
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = time().$image->getClientOriginalName();
            $destinationPath = "uploads/users/";
            $image->move($destinationPath, $name);
        }
        if(is_null($id)){
            $User =new User();
            $User->password=Hash::make($attributes['password']);
            $User->created_at =date('Y-m-d H:i:s');
        }else{
            $User = self::findOrFail($id);
            $User->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['en_name', 'email','ar_name','en_bio','ar_bio','en_address','ar_address','mobile','image','city_id','country_id'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $User->$key=$value;
                }
                if($key =="image"){
                    $User->image='public/app-images/user/'.$name ;
                    
                }
                
            }
        }


        if($User->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'User');
            }
            else{
                toastr( 'Successful Updating',  'info',  'User');
            }
            return redirect('admin/user/');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/user/');
    }

    public static function updatePersonalInfo($attributes,$id){
        $user = self::findOrFail($id);
        $user->updated_at =date('Y-m-d H:i:s');
        $inputs = ['en_name','ar_name', 'email','mobile','en_address','ar_address','en_bio','ar_bio','facebook','twitter'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $user->$key=$value;
                }
            }
        }
        if($user->save()){
            toastr( 'Successful Updating',  'info',  'User');
            return redirect()->back();
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect()->back();
    }

    public static function updateImage($attributes,$id){
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = time().$image->getClientOriginalName();
            $destinationPath = "uploads/users";
            $image->move($destinationPath, $name);
        }
        $user = self::findOrFail($id);
        $user->updated_at =date('Y-m-d H:i:s');
        $inputs = ['image'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if($key =="image"){
                    $user->image='uploads/users/'.$name ;
                }
            }
        }
        if($user->save()){
            toastr( 'Successful Updating',  'info',  'User');
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
            toastr( 'Successful Updating',  'info',  'User');
            return redirect()->back();
        }
        else{
            toastr()->error('Opps ! An error has occurred.');
            return redirect()->back();
        }

    }

    public static function hasCourse($id){
        $user = self::findOrFail(Auth::guard('user')->user()->id);
        $exists = $user->courses->contains($id);
        return $exists ;
    }

    public static function reviewCourse($id){
        $user = self::findOrFail(Auth::guard('user')->user()->id);
        $exists = $user->reviews->where('course_id',$id)->count();
        return $exists ;
    }


    public function collection()
    {
        // return User::all();
        return User::select('en_name','email','en_address','mobile')->get();
    }


    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Address',
            'Mobile'
        ];
    }


}

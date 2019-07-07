<?php

namespace App;


use Hash;
use User;
use App\Notifications\SendEmail;
use App\Notifications\InstructorResetPassword;
use Illuminate\Notifications\Notifiable;
use Actuallymab\LaravelComment\CanComment;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class Instructor extends Authenticatable implements FromCollection,WithHeadings
{
    use Notifiable,SoftDeletes,CanComment;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'instructors';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'en_name','ar_name','en_bio','ar_bio', 'email', 'password','image','mobile','en_job_title',
        'ar_job_title','en_address','ar_address','facebook','twitter'
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
        $this->notify(new InstructorResetPassword($token));
    }

    public function SystemSendEmail($msg)
    {
        $this->notify(new SendEmail($msg));
    }

    public static $save_rules =[
        'en_name'=> 'required|max:100',
        'email' => 'required|email|max:255|unique:instructors',
        'password' => 'required|confirmed',
    ];
    public static $update_rules =[ 
        'email' => 'required|string|email|max:255',
    ];

    public function course(){
        return  $this->belongsTo('App\Course');
    }

    public function courses()
    {
        return $this->morphMany('App\Course', 'model');
    }

    public function posts()
    {
        return $this->morphMany('App\Post', 'model');
    }

    public function videos()
    {
        return $this->morphMany('App\Video', 'model');
    }

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

    public static function saveInstructor($attributes,$id){
        if(is_null($id)){
            $Instructor =new Instructor();
            $Instructor->password=Hash::make($attributes['password']);
            $Instructor->created_at =date('Y-m-d H:i:s');
        }else{
            $Instructor = self::findOrFail($id);
            $Instructor->updated_at =date('Y-m-d H:i:s');
        }

        $inputs =  ['en_name', 'email'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Instructor->$key=$value;
                }
            }
        }


        if($Instructor->save()){
            if( is_null($id) ){
                toastr( 'Successful Saving',  'success',  'Instructor');
            }
            else{
                toastr( 'Successful Updating',  'info',  'Instructor');
            }
            return redirect('admin/instructor/');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/instructor/');
    }


    public static function updatePersonalInfo($attributes,$id){
        $instructor = self::findOrFail($id);
        $instructor->updated_at =date('Y-m-d H:i:s');
        $inputs = ['en_name','ar_name', 'email','mobile','en_address','ar_address','en_job_title'
        ,'ar_job_title','en_bio','ar_bio','facebook','twitter'];

        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $instructor->$key=$value;
                }
            }
        }
        if($instructor->save()){
            toastr( 'Successful Updating',  'info',  'Instructor');
            return redirect()->back();
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect()->back();
    }

    public static function updateImage($attributes,$id){
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = time().$image->getClientOriginalName();
            $destinationPath = "uploads/instructors";
            $image->move($destinationPath, $name);
        }
        $user = self::findOrFail($id);
        $user->updated_at =date('Y-m-d H:i:s');
        $inputs = ['image'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if($key =="image"){
                    $user->image='uploads/instructors/'.$name ;
                }
            }
        }
        if($user->save()){
            toastr( 'Successful Updating',  'info',  'Instructor');
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
            toastr( 'Successful Updating',  'info',  'Instructor');
            return redirect()->back();
        }
        else{
            toastr()->error('Opps ! An error has occurred.');
            return redirect()->back();
        }

    }

    public function collection()
    {
        return Instructor::select('en_name','email','en_job_title','en_address','mobile')->get();
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

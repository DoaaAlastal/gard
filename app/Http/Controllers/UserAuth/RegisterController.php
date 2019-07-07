<?php

namespace App\Http\Controllers\UserAuth;

use App\User;
use App\Country;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'en_name' => 'required|max:255',
            'ar_name'=> 'required|max:100',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'en_name' => $data['en_name'],
            'ar_name' => $data['ar_name'],
            'password' => bcrypt($data['password']),
            'en_bio' => $data['en_bio'],
            'ar_bio'=>  $data['ar_bio'],
            'en_address'=>  $data['en_address'],
            'ar_address'=>  $data['ar_address'],
            'mobile'=>$data['mobile'],
            'country_id'=>$data['country_id'],
            'city_id'=>$data['city_id'],
        ]);

    }
    public function store(Request $request){
        $validation = $request->validate(User::$save_rules);
        return(User::saveUser($request->all(), null));
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $country=Country::all();
        return view('user.auth.register',compact('country'));
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}

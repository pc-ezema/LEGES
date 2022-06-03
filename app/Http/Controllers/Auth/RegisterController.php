<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewUser;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_name' => ['required', 'string', 'unique:users', 'alpha_dash', 'min:3', 'max:30'],
            'agreement' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(request()->account_type == 'Lawyer') {
            $this->validate(request(), array(
                'bar' => ['required', 'string', 'max:255'],
                'location_practice' => ['required', 'string', 'max:255'],
                // 'area_practice' => ['required', 'string', 'max:255'],
                // 'documents' => ['required', 'string', 'max:255'],
            ));

            $user = User::create([
                'account_type' => $data['account_type'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'user_name' => $data['user_name'],
                'password' => Hash::make($data['password']),
                'agreement' => $data['agreement'],
                'bar' => $data['bar'],
                'location_practice' => $data['location_practice'],
                // 'area_practice' => $data['area_practice'],
                // 'documents' => $data['documents'],
                'progress_value' => 15,
            ]);

            $admin = User::where('account_type', 'Administrator')->first();
            if ($admin) {
                $admin->notify(new NewUser($user));
            }

            return $user;
            
        } else {
            $this->validate(request(), array(
                'gender' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'numeric'],
            ));
            $user = User::create([
                'account_type' => $data['account_type'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'user_name' => $data['user_name'],
                'password' => Hash::make($data['password']),
                'gender' => $data['gender'],
                'agreement' => $data['agreement'],
                'phone_number' => $data['phone_number'],
                'status' => 'Approved',
                'approved_at' => now()
            ]);

            $admin = User::where('account_type', 'Administrator')->first();
            if ($admin) {
                $admin->notify(new NewUser($user));
            }

            return $user;
        }
    }
}

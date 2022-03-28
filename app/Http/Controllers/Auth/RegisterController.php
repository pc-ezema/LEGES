<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'gender' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'numeric'],
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
            return Validator::make($data, [
                'bar' => ['required', 'string', 'max:255'],
                'location_practice' => ['required', 'string', 'max:255'],
                'area_practice' => ['required', 'string', 'max:255'],
                'documents' => ['required', 'string', 'max:255'],
                'council_legal_education_certificate' => 'required|mimes:jpeg,png,jpg,txt|max:2048',
                'call_bar_certificate' => 'required|mimes:jpeg,png,jpg,txt|max:2048',
                'receipt_payment_practice_fee' => 'required|mimes:jpeg,png,jpg,txt|max:2048',
                'cv' => 'required|mimes:pdf,doc,xt|max:2048',
            ]);
            if (request()->hasFile('council_legal_education_certificate', 'call_bar_certificate', 'receipt_payment_practice_fee', 'cv')) {
                $certificateCLE = request()->council_legal_education_certificate->getClientOriginalName();
                $certificateCB = request()->call_bar_certificate->getClientOriginalName();
                $receiptPPF = request()->receipt_payment_practice_fee->getClientOriginalName();
                $curriculumVitae = request()->cv->getClientOriginalName();

                request()->council_legal_education_certificate->storeAs('council_legal_education_certificates', $certificateCLE, 'public');
                request()->call_bar_certificate->storeAs('call_bar_certificates', $certificateCB, 'public');
                request()->receipt_payment_practice_fee->storeAs('receipts_payment_practice_fee', $receiptPPF, 'public');
                request()->cv->storeAs('cv_documents', $curriculumVitae, 'public');

                return User::create([
                    'account_type' => $data['account_type'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'user_name' => $data['user_name'],
                    'password' => Hash::make($data['password']),
                    'gender' => $data['gender'],
                    'phone_number' => $data['phone_number'],
                    'bar' => $data['bar'],
                    'location_practice' => $data['location_practice'],
                    'area_practice' => $data['area_practice'],
                    'documents' => $data['documents'],
                    'council_legal_education_certificate' => $certificateCLE,
                    'call_bar_certificate' => $certificateCB,
                    'receipt_payment_practice_fee' => $receiptPPF,
                    'cv' => $curriculumVitae,
                ]);
            } 
        } else {
            return User::create([
                'account_type' => $data['account_type'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'user_name' => $data['user_name'],
                'password' => Hash::make($data['password']),
                'gender' => $data['gender'],
                'phone_number' => $data['phone_number'],
            ]);
        }
    }
}

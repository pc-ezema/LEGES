<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\User;
use Paystack;
use App\Payment;
use App\UserCase;
use Illuminate\Support\Facades\Auth;
use Redirect;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view('client.profile');
    }

    public function profile_picture($id, Request $request) {
        //Validate Request
        $this->validate($request, [
            'avatar' => 'required|mimes:jpeg,png,jpg',
        ]);

        //Find User
        $userFinder = Crypt::decrypt($id);

        //Profile
        $profile = User::find($userFinder);

        //Validate User
        if (request()->hasFile('avatar')) {
            $filename = request()->avatar->getClientOriginalName();
            if($profile->avatar) {
                Storage::delete('/public/avatars/'. $profile->avatar);
            }
            request()->avatar->storeAs('avatars', $filename, 'public');
            $profile->avatar = $filename;
            $profile->save();
            
            return back()->with([
                'type' => 'success',
                'message' => 'Profile Picture Update Successfully!'
            ]);
        } else {
            return back()->with([
                'type' => 'danger',
                'message' => 'Access denied!',
            ]);
        }
    }

    public function password($id, Request $request) {
        //Validate Request
        $this->validate($request, [
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        //Find User
        $userFinder = Crypt::decrypt($id);

        //Profile
        $profile = User::find($userFinder);

        //Validate User
        if ($profile) {
            $profile->password = Hash::make(request()->new_password);
            $profile->save();

            return back()->with([
                'type' => 'success',
                'message' => 'Password Updated Successfully!'
            ]);

        } else {
            return back()->with([
                'type' => 'danger',
                'message' => 'Access denied!',
            ]);
        }
    }

    public function personal_data($id, Request $request) {
        //Validate Request
        $this->validate($request, [
            'first_name' => ['required','string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required','numeric'],
            'user_name' => ['required', 'string', 'alpha_dash', 'min:3', 'max:30'],
            'gender' => ['required','string', 'max:255']
        ]);

        //Find User
        $userFinder = Crypt::decrypt($id);

        //Profile
        $profile = User::find($userFinder);

        //Validate User
        if ($profile) {
            $profile->first_name = request()->first_name;
            $profile->last_name = request()->last_name;
            $profile->phone_number = request()->phone_number;
            $profile->user_name = request()->user_name;
            $profile->gender = request()->gender;
            $profile->bio = request()->bio;
            $profile->save();
            
            return back()->with([
                'type' => 'success',
                'message' => 'Personal Data Updated Successfully!'
            ]);        
        } else {
            return back()->with([
                'type' => 'success',
                'message' => 'Access denied!'
            ]);
        }
    }

    public function messages()
    {
        return view('client.messages');
    }

    public function services()
    {
        return view('client.services');
    }

    public function services_create_case()
    {

        return view('client.service_create_case');
    }

     /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'type_of_case' => ['required','string', ''],
            'time_limit' => ['required', 'numeric'],
            'amount' => ['required','numeric'],
            'description' => ['required','string']
        ]);
        
        $user_case = UserCase::create([
            'user_id' => Auth::user()->id,
            'first_name' => Auth::user()->first_name,
            'last_name' => Auth::user()->last_name,
            'email' => request()->email,
            'case_id' => 'LEGES-'.$this->id_no(5),
            'type_of_case' => request()->type_of_case,
            'time_limit' => request()->time_limit,
            'amount' => request()->amount,
            'description' => request()->description,
        ]);

        if ($user_case) {
           try{
                return Paystack::getAuthorizationUrl()->redirectNow();
            }   catch(\Exception $e) {
                return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
            }          
        } else {
            return back()->with([
                'type' => 'success',
                'message' => 'Case failed to Submit, Please try again!'
            ]);
        }     
    }

    function id_no($input, $strength = 5) {
        $input = '0123456789';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
    
        return $random_string;
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
        
        // dd($paymentDetails);

        Payment::create([
            'user_id' => Auth::user()->id,
            'email' => $paymentDetails['data']['customer']['email'],
            'amount' => $paymentDetails['data']['amount'],
            'transaction_id' => $paymentDetails['data']['id'],
            'ref_id' => $paymentDetails['data']['reference'],
            'paid_at' => $paymentDetails['data']['paid_at'],
            'channel' => $paymentDetails['data']['channel'],
            'ip_address' => $paymentDetails['data']['ip_address'],
            'status' => $paymentDetails['data']['status'],
        ]);

        return redirect()->route('client.services')->with([
            'type' => 'success',
            'message' => 'Case Submit Successfully!'
        ]);
    }
}

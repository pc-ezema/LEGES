<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\User;
use Paystack;
use App\Payment;
use App\UserCase;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\CaseRequest;
use App\Message;
use App\Service;
// use Mail;

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
        $notifications = Notification::latest()->where('to', Auth::user()->email)
                                            ->where('status', 'Unread')->get();

        return view('client.profile',[
            'notifications' => $notifications
        ]);
    }

    public function profile_picture($id, Request $request) 
    {
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
                Storage::delete('/public/users-avatar/'. $profile->avatar);
            }
            request()->avatar->storeAs('users-avatar', $filename, 'public');
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

    public function password($id, Request $request) 
    {
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

    public function personal_data($id, Request $request) 
    {
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

    public function services()
    {
        $notifications = Notification::latest()->where('to', Auth::user()->email)
                                            ->where('status', 'Unread')->get();

        $services = Service::latest()->get();

        return view('client.services',[
            'services' => $services,
            'notifications' => $notifications
        ]);
    }

    public function services_create_case($id)
    {
        $notifications = Notification::latest()->where('to', Auth::user()->email)
                                            ->where('status', 'Unread')->get();

        $id = Crypt::decrypt($id);

        $service = Service::findOrFail($id);

        return view('client.service_create_case',[
            'service' => $service,
            'notifications' => $notifications
        ]);
    }

    public function case_save(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'description' => ['required','string']
        ]);
        
        $leges_commission = $request->amount/10;
        $amount_payout = $request->amount - $leges_commission;

        $user_case = UserCase::create([
            'user_id' => Auth::user()->id,
            'first_name' => Auth::user()->first_name,
            'last_name' => Auth::user()->last_name,
            'email' => Auth::user()->email,
            'case_id' => 'LEGES-'.$this->id_no(5),
            'type_of_case' => request()->type_of_case,
            'amount' => request()->amount,
            'leges_commission' => $leges_commission,
            'amount_payout' => $amount_payout,
            'description' => request()->description,
        ]);

        if ($user_case) {
            return redirect()->route('client.confirm.case', Crypt::encrypt($user_case->id))->with([
                'type' => 'success',
                'message' => 'Case Added, Please kindly make payment!'
            ]);          
        } else {
            return back()->with([
                'type' => 'danger',
                'message' => 'Case failed to Submit, Please try again!'
            ]);
        }     
    }

    function id_no($input, $strength = 5) 
    {
        $input = '0123456789';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
    
        return $random_string;
    }

    public function case_confirm(Request $request, $id) 
    {
        //Find case 
        $caseFinder = Crypt::decrypt($id);

        //Case
        $user_case = UserCase::findorfail($caseFinder);

        $notifications = Notification::latest()->where('to', Auth::user()->email)
                                            ->where('status', 'Unread')->get();

        return view ('client.payment', [
            'user_case' => $user_case,
            'notifications' => $notifications
        ]);
    }

    public function redirectToGateway($id, Request $request) 
    {
        //Find case 
        $caseFinder = Crypt::decrypt($id);

        //Case
        $user_case = UserCase::findorfail($caseFinder);

        $SECRET_KEY = config('app.paystack_secret_key');;

        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => Auth::user()->email,
            'amount' => $request->amount * 100,
            'callback_url' => url('client/dashboard/payment/callback'),
            'metadata' => [
                'user_id' => Auth::user()->id,
                'users_case_id' => $user_case->id
            ]
        ];

        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $SECRET_KEY",
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $paystack_result = curl_exec($ch);
        
        $result = json_decode($paystack_result);

        //  return $result;
        $authorization_url = $result->data->authorization_url;
        $paystack_status = $result->status;

        // return dd($result->status);

        if ($paystack_status == true) {
            return redirect()->to($authorization_url);
        } else {
            return back()->with([
                'type' => 'danger',
                'icon' => 'mdi-block-helper',
                'message' => 'Payment failed. Try again.'
            ]); 
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $SECRET_KEY = config('app.paystack_secret_key');
        
        $curl = curl_init();

        $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
            if(!$reference){
            die('No reference supplied');
        }
  
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $SECRET_KEY",
                "Cache-Control: no-cache",
            ),
        ));
        
        $paystack_response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
            
        $result = json_decode($paystack_response);
        
        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        } else {
            // dd($result);            
            $user_case = UserCase::findorfail($result->data->metadata->users_case_id);

            Payment::create([
                'user_id' => $result->data->metadata->user_id,
                'case_id' => $result->data->metadata->users_case_id,
                'email' => $result->data->customer->email,
                'amount' => ($result->data->amount / 100),
                'transaction_id' => $result->data->id,
                'ref_id' => $result->data->reference,
                'paid_at' => $result->data->paid_at,
                'channel' => $result->data->channel,
                'ip_address' => $result->data->ip_address,
                'status' => $result->data->status,
            ]);
    
            $user_case->payment = true;
            $user_case->save();
    
            return redirect()->route('client.case.details')->with([
                'type' => 'success',
                'message' => 'Case Submit Successfully!'
            ]);
        }
    }

    public function case_details() 
    {
        $cases = UserCase::latest()->where('user_id', Auth::user()->id)->get();
        $notifications = Notification::latest()->where('to', Auth::user()->email)
                                            ->where('status', 'Unread')->get();

        return view('client.case_details', [
            'cases' => $cases,
            'notifications' => $notifications
        ]);
    }

    public function case_delete($id) 
    {
        //Find case
        $caseFinder = Crypt::decrypt($id);

        //Case
        $user_case = UserCase::findorfail($caseFinder)->delete();

        // Payment::where('case_id', $user_case->case_id)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Case Deleted Successfully!',
        ]);
    }

    public function case_request($id) 
    {
        $caseid = Crypt::decrypt($id);

        $caseRequests = CaseRequest::latest()->where('case_id', $caseid)->get();
        $case = UserCase::latest()->where('id', $caseid)->first();
        $notifications = Notification::latest()->where('to', Auth::user()->email)
                                            ->where('status', 'Unread')->get();

        return view('client.case_request', [
            'caseRequests' => $caseRequests,
            'case' => $case,
            'notifications' => $notifications
        ]);
    }

    public function case_lawyer_accept($id) 
    {
        $caseid = Crypt::decrypt($id);
        
        $caseRequests = CaseRequest::findorfail($caseid);
        $case = UserCase::findorfail($caseRequests->case_id);

        $user = User::findorfail($caseRequests->user_id);

        $case->lawyer_id = $caseRequests->user_id;
        $case->status = 'Assigned';
        $case->save();

        $caseRequests->status = 'Assigned';
        $caseRequests->save();

        /** Store information to include in mail in $data as an array */
        $data = array(
            'client_name' => $case->first_name. ' ' . $case->last_name,
            'case_id' => $case->case_id,
            'type_of_case' => $case->type_of_case,
            'lawyer' => $caseRequests->email,
        );
        
        /** Send message to the user */
        Mail::send('emails.accept', $data, function ($m) use ($data) {
            $m->to($data['lawyer'])->subject('Leges Case');
        });

        return back()->with([
            'type' => 'success',
            'message' => 'Case assigned to '.$user->first_name. ' ' .$user->last_name
        ]);
    }

    public function case_lawyer($id)
    {
        $user_id = Crypt::decrypt($id);

        $user = User::findorfail($user_id);

        $lawyerCompletedCases = UserCase::latest()->where('lawyer_id', $user->id)
                                    ->where('status', 'Completed')->get();
        $notifications = Notification::latest()->where('to', Auth::user()->email)
                                    ->where('status', 'Unread')->get();

        return view('client.view_lawyer', [
            'user' => $user,
            'lawyerCompletedCases' => $lawyerCompletedCases,
            'notifications' => $notifications
        ]);
    }

    public function pay_lawyer($id)
    {
        $case_id = Crypt::decrypt($id);

        $usercase = UserCase::findorfail($case_id);
        
        $caserequests = CaseRequest::where('case_id', $usercase->id)
                                    ->where('status', 'Pending')->get();

        if(!$caserequests == null)
        {
            foreach($caserequests as $caserequest)
            {
                $caserequest->delete();
            }
        }

        $usercase->status = 'Completed';
        $usercase->save();

        $admin = User::where('account_type', 'Administrator')->first();

        $message = new Notification();
        $message->from = Auth::user()->first_name. ' ' .Auth::user()->last_name;
        $message->to = $admin->account_type;
        $message->subject = $usercase->case_id.' Completed';
        $message->message = $usercase->case_id.' Completed, please initiate payment to the lawyer. Thank you.';
        $message->save();

        $admin->notification = $usercase->case_id.' Completed';
        $admin->save();

        /** Store information to include in mail in $data as an array */
        $data = array(
            'name' => $admin->first_name,
            'email' => $admin->email,
            'account_type' => $admin->account_type
        );
        
        /** Send message to the user */
        Mail::send('emails.notification', $data, function ($m) use ($data) {
            $m->to($data['email'])->subject('Leges Client');
        });

        return back()->with([
            'type' => 'success',
            'message' => 'Case Completed and Payment Initiated'
        ]);

    }

    public function transactions() 
    {
        $transactions = Payment::latest()->where('email', Auth::user()->email)->get();
        $notifications = Notification::latest()->where('to', Auth::user()->email)
                                            ->where('status', 'Unread')->get();

        return view('client.transactions', [
            'transactions' => $transactions,
            'notifications' => $notifications
        ]);
    }

    public function notifications() 
    {
        $allnotifications = Notification::latest()->where('to', Auth::user()->email)->get();
        $notifications = Notification::latest()->where('to', Auth::user()->email)
                                            ->where('status', 'Unread')->get();

        return view('client.notifications', [
            'allnotifications' => $allnotifications,
            'notifications' => $notifications
        ]);
    }

    public function read_notification($id)
    {
        $Finder = Crypt::decrypt($id);

        $notification = Notification::findorfail($Finder);

        $notification->status = 'Read';
        $notification->save();

        return back();

    }
}
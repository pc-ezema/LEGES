<?php

namespace App\Http\Controllers;

use App\CaseRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\Notification;
use App\Service;
use App\UserCase;
use Mail;
use Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index() 
    {
        $clients = User::latest()->where('account_type', 'Client')->get();
        $lawyers = User::latest()->where('account_type', 'Lawyer')->get();
        $completedcases = UserCase::latest()->where('status', 'Completed')->get();
        $assignedcases = UserCase::latest()->where('status', 'Assigned')->get();
        $pendingcases = UserCase::latest()->where('status', 'Pending')->get();

        $recentclients = User::latest()->where('account_type', 'Client')->take(5)->get();
        $recentlawyers = User::latest()->where('account_type', 'Lawyer')->take(5)->get();

        return view('admin.dashboard',[
            'clients' => $clients,
            'lawyers' => $lawyers,
            'completedcases' => $completedcases,
            'assignedcases' => $assignedcases,
            'pendingcases' => $pendingcases,
            'recentclients' => $recentclients,
            'recentlawyers' => $recentlawyers
        ]);
    }

    public function profile() {
        $admins = User::latest()->where('account_type', 'Administrator')
                                ->where('first_name', '!=', 'Admin')
                                ->where('last_name', '!=', 'Admin')->get();

        return view('admin.profile',[
            'admins' => $admins
        ]);
    }

    public function update_profile_picture($id, Request $request) 
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

    public function update_password($id, Request $request) 
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

    public function add_admin(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_name' => ['required', 'string', 'unique:users', 'alpha_dash', 'min:3', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->account_type = 'Administrator';
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->status = 'Approved';
        $user->approved_at = now();
        $user->save();

        return back()->with([
            'type' => 'success',
            'message' => 'Account Created Successfully!'
        ]);

    }

    public function delete_admin($id)
    {
        //Find User
        $userFinder = Crypt::decrypt($id);

        //Profile
        $profile = User::find($userFinder);

        if($profile->avatar) {
            Storage::delete('/public/users-avatar/'. $profile->avatar);
        }

        $profile->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Account Deleted Successfully!'
        ]);
    }

    public function clients() 
    {
        $clients = User::latest()->where('account_type', 'Client')->get();

        return view('admin.clients', [
            'clients' => $clients
        ]);
    }

    public function view_client($id)
    {
        $user_id = Crypt::decrypt($id);

        $client = User::findOrFail($user_id);

        return view('admin.view_client', [
            'client' => $client
        ]);
    }

    public function client_profile_picture($id, Request $request) 
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

    public function client_password($id, Request $request) 
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

    public function delete_client($id)
    {
        //Find User
        $userFinder = Crypt::decrypt($id);

        //Profile
        $profile = User::find($userFinder);

        if($profile->avatar) {
            Storage::delete('/public/users-avatar/'. $profile->avatar);
        }

        $profile->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Account Deleted Successfully!'
        ]);
    }

    public function lawyers() 
    {
        $lawyers = User::latest()->where('account_type', 'Lawyer')->get();

        return view('admin.lawyers', [
            'lawyers' => $lawyers
        ]);
    }

    public function view_lawyer($id)
    {
        $user_id = Crypt::decrypt($id);

        $lawyer = User::findOrFail($user_id);

        return view('admin.view_lawyer', [
            'lawyer' => $lawyer
        ]);
    }

    public function lawyer_profile_picture($id, Request $request) 
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

    public function lawyer_password($id, Request $request) 
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

    public function delete_lawyer($id)
    {
        //Find User
        $userFinder = Crypt::decrypt($id);

        //Profile
        $profile = User::find($userFinder);

        if($profile->avatar) {
            Storage::delete('/public/users-avatar/'. $profile->avatar);
        }

        $profile->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Account Deleted Successfully!'
        ]);
    }

    public function approve($user_id)
    {
        $id = Crypt::decrypt($user_id);

        $user = User::findOrFail($id);
       
        $user->update([
            'approved_at' => now(),
        ]);

        $user->status = 'Approved';
        $user->notification = 'Account successfully approved.';
        $user->save();

        return back()->with([
            'type' => 'success',
            'message' => $user->first_name. ' account approved successfully!',
        ]);
    }

    public function disapprove($user_id)
    {
        $id = Crypt::decrypt($user_id);

        $user = User::findOrFail($id);
       
        $user->update([
            'approved_at' => null,
        ]);

        $user->status = 'Disapprove';
        $user->notification = 'Your account is freezed, contact administrator.';
        $user->save();

        return back()->with([
            'type' => 'success',
            'message' => $user->first_name. ' account disapproved successfully!',
        ]);
    }

    public function message($user_id) 
    {
        $id = Crypt::decrypt($user_id);

        $user = User::findOrFail($id);

        return view ('admin.message', [
            'user' => $user
        ]);
    }

    public function send_message($user_id, Request $request) 
    {
        //Validate Request
        $this->validate($request, [
            'subject' => ['required','string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $id = Crypt::decrypt($user_id);

        $user = User::where('email', request()->to)->first();

        $message = new Notification();
        $message->from = 'Admin';
        $message->to = request()->to;
        $message->subject = request()->subject;
        $message->message = request()->message;
        $message->save();

        $user->notification = request()->subject;
        $user->save();

        /** Store information to include in mail in $data as an array */
        $data = array(
            'name' => $user->first_name,
            'email' => $user->email,
            'account_type' => $user->account_type
        );
        
        /** Send message to the user */
        Mail::send('emails.notification', $data, function ($m) use ($data) {
            $m->to($data['email'])->subject('Leges');
        });

        return back()->with([
            'type' => 'success',
            'message' =>  'Message sent successfully to '.$user->first_name,
        ]);
    }

    public function services() 
    {
        $services = Service::latest()->get();

        return view('admin.services',[
            'services' => $services
        ]);
    }

    public function add_service(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'name' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);

        //Validate User
        if (request()->hasFile('image')) {
            $filename = request()->image->getClientOriginalName();

            request()->image->storeAs('services-image', $filename, 'public');

            Service::create([
                'name' => $request->name,
                'amount' => $request->amount,
                'image' => '/storage/services-image/'.$filename
            ]);
            
            return back()->with([
                'type' => 'success',
                'message' => 'Service Added Successfully!'
            ]);
        } else {
            return back()->with([
                'type' => 'danger',
                'message' => 'Please add an image and try again!',
            ]);
        }
    }

    public function update_service($id, Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'name' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
            'image' => 'mimes:jpeg,png,jpg',
        ]);

        $id = Crypt::decrypt($id);

        $service = Service::findOrFail($id);

        if (request()->hasFile('image')) {
            $filename = request()->image->getClientOriginalName();
            if($service->image) {
                Storage::delete('/public/services-image/'. $service->image);
            }
            request()->image->storeAs('services-image', $filename, 'public');

            $service->update([
                'name' => $request->name,
                'amount' => $request->amount,
                'image' => '/storage/services-image/'.$filename
            ]);
            
            return back()->with([
                'type' => 'success',
                'message' => 'Service Updated Successfully!'
            ]);
        } else {
            $service->update([
                'name' => $request->name,
                'amount' => $request->amount
            ]);
            
            return back()->with([
                'type' => 'success',
                'message' => 'Service Updated Successfully!'
            ]);
        }
    }

    public function delete_service($id, Request $request)
    {
        $id = Crypt::decrypt($id);

        $service = Service::findOrFail($id);
        Storage::delete('/public/services-image/'. $service->image);
        Service::findOrFail($id)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Service Deleted Successfully!'
        ]);
    }

    public function transactions()
    {
        $transactions = Payment::latest()->get();

        return view('admin.transactions',[
            'transactions' => $transactions
        ]);
    }

    public function notifications()
    {
        $notifications = Notification::latest()->get();

        return view('admin.notifications',[
            'notifications' => $notifications
        ]);
    }

    public function cases() 
    {
        $cases = UserCase::latest()->get();

        return view('admin.cases',[
            'cases' => $cases
        ]);
    }

    public function update_case($id, Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'status' => ['required'],
            'description' => ['required', 'string'],
        ]);

        $id = Crypt::decrypt($id);

        $case = UserCase::findOrFail($id);

        if($request->status == 'Pending') {
            $caserequest = CaseRequest::where('user_id', $case->lawyer_id)->first();
            $caserequest->status = 'Pending';
            $caserequest->save();
        }

        $case->status = $request->status;
        $case->description = $request->description;
        $case->lawyer_id = null;
        $case->save();

        
        return back()->with([
            'type' => 'success',
            'message' => 'Case Updated Successfully!'
        ]);
    }

    public function delete_case($id, Request $request)
    {
        $id = Crypt::decrypt($id);

        $case = UserCase::findOrFail($id);
        Payment::findOrFail('case_id', $case->id)->first()->delete();
        UserCase::findOrFail($id)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Case Deleted Successfully!'
        ]);
    }
}
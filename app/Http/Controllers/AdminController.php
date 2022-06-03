<?php

namespace App\Http\Controllers;

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
        return view('admin.dashboard');
    }

    public function clients() {
        $clients = User::latest()->where('account_type', 'Client')->get();

        return view('admin.clients', [
            'clients' => $clients
        ]);
    }

    public function lawyers() 
    {
        $lawyers = User::latest()->where('account_type', 'Lawyer')->get();

        return view('admin.lawyers', [
            'lawyers' => $lawyers
        ]);
    }

    public function profile() {
        return view('admin.profile');
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
        );
        
        /** Send message to the user */
        Mail::send('emails.notification', $data, function ($m) use ($data) {
            $m->to($data['email'])->subject('Prime Parkland');
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

        $case->status = $request->status;
        $case->description = $request->description;
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
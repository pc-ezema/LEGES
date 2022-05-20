<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Notifications\LegesLawyer;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\UserCase;
use App\CaseRequest;

class LawyerController extends Controller
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
    public function profile($id)
    {
        $active_tab = $id;

        if($active_tab == 'settings') {
            return view ('lawyer.profile', compact('active_tab'));
        } elseif($active_tab == 'personalData') {
            return view ('lawyer.profile', compact('active_tab'));
        } elseif($active_tab == 'documents') {
            return view ('lawyer.profile', compact('active_tab'));
        }
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
            'gender' => ['required','string', 'max:255'],
            'bar' => ['required','string', 'max:255'],
            'location_practice' => ['required', 'string', 'max:255'],
            'area_practice' => ['required', 'string', 'max:255'],
            'documents' => ['required', 'string', 'max:255']
        ]);

        //Find User
        $userFinder = Crypt::decrypt($id);

        //Profile
        $profile = User::find($userFinder);

        //Validate User
        if ($profile) {
            if ($profile->progress_value == 15) {
                $profile->first_name = request()->first_name;
                $profile->last_name = request()->last_name;
                $profile->phone_number = request()->phone_number;
                $profile->user_name = request()->user_name;
                $profile->gender = request()->gender;
                $profile->bio = request()->bio;
                $profile->bar = request()->bar;
                $profile->location_practice = request()->location_practice;
                $profile->area_practice = request()->area_practice;
                $profile->documents = request()->documents;
                $profile->progress_value += 35;
                $profile->save();

                return redirect()->route('lawyer.profile', 'documents')->with([
                    'type' => 'success',
                    'message' => 'Personal Data Updated Successfully!'
                ]);   
            }             
        } else {
            return redirect()->route('lawyer.profile', 'personalData')->with([
                'type' => 'danger',
                'message' => 'Access denied!',
            ]);
        }
    }

    public function personal_data_update($id, Request $request) {
        //Validate Request
        $this->validate($request, [
            'first_name' => ['required','string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required','numeric'],
            'user_name' => ['required', 'string', 'alpha_dash', 'min:3', 'max:30'],
            'gender' => ['required','string', 'max:255'],
            'bar' => ['required','string', 'max:255'],
            'location_practice' => ['required', 'string', 'max:255'],
            'area_practice' => ['required', 'string', 'max:255'],
            'documents' => ['required', 'string', 'max:255']
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
            $profile->bar = request()->bar;
            $profile->location_practice = request()->location_practice;
            $profile->area_practice = request()->area_practice;
            $profile->documents = request()->documents;
            $profile->save();

            return redirect()->route('lawyer.profile', 'documents')->with([
                'type' => 'success',
                'message' => 'Personal Data Updated Successfully!'
            ]);      
        } else {
            return redirect()->route('lawyer.profile', 'personalData')->with([
                'type' => 'danger',
                'message' => 'Access denied!',
            ]);
        }
    }

    public function documents($id, Request $request) {
        //Validate Request
        $this->validate($request, [
            'documents.*' => 'required|mimes:jpeg,png,jpg,docx,pdf',
        ]);

        //Find user
        $userFinder = Crypt::decrypt($id);

        $profile = User::findorfail($userFinder);

        // Making counting of uploaded images
        $file_count = count($request->documents);

        if($profile->progress_value == 50) {
            // start count how many uploaded
            if ($file_count <= 10) {
                //Validate User
                if (request()->hasFile('documents')) {

                    foreach ($request->documents as $document) {
                        $filename = $document->getClientOriginalName();
                        $document->storeAs('documents', $filename, 'public');
                        $images[]=$filename;
                    }
                    $profile->documents_attached = implode(",",$images);
                    $profile->notification = 'Your account is waiting for our administrator to review and approve.';
                    $profile->progress_value += 50 ;
                    $profile->save();

                    $admin = User::where('account_type', 'Administrator')->first();
                    if ($admin) {
                        $admin->notify(new LegesLawyer($profile));
                    }

                    return redirect()->route('lawyer.profile', 'settings')->with([
                        'type' => 'success',
                        'message' => 'Documents Saved Successfully!'
                    ]);
                }
            } elseif ($file_count > 11) {
                return back()->with([
                    'type' => 'danger',
                    'message' => 'Upload should not be more than 5!',
                ]); 
            } else {
                return back()->with([
                    'type' => 'danger',
                    'message' => 'Upload should not be more than 5!',
                ]);
            }
        } else {
            return redirect()->route('lawyer.profile', 'personalData')->with([
                'type' => 'danger',
                'message' => 'Personal Data Form must be completed to proceed!'
            ]);
        }
    }

    public function documents_update($id, Request $request){
        //Validate Request
        $this->validate($request, [
            'documents.*' => 'required|mimes:jpeg,png,jpg,docx,pdf',
        ]);

        //Find user
        $userFinder = Crypt::decrypt($id);

        $profile = User::findorfail($userFinder);

        // Making counting of uploaded images
        $file_count = count($request->documents);

        if($profile->progress_value == 100) {
            // start count how many uploaded
            if ($file_count <= 10) {
                //Validate User
                if (request()->hasFile('documents')) {

                    foreach ($request->documents as $document) {
                        $filename = $document->getClientOriginalName();
                        $image_views = explode(",",$profile->documents_attached);
                        if(!$image_views == null) {
                            foreach ($image_views as $image) {
                                Storage::delete('/public/documents/'.$image);
                            }
                        }
                        $document->storeAs('documents', $filename, 'public');
                        $images[]=$filename;
                    }
                    $profile->documents_attached = implode(",",$images);
                    $profile->save();

                    return redirect()->route('lawyer.profile', 'settings')->with([
                        'type' => 'success',
                        'message' => 'Documents Updated Successfully!'
                    ]);
                }
            } elseif ($file_count > 11) {
                return back()->with([
                    'type' => 'danger',
                    'message' => 'Upload should not be more than 5!',
                ]); 
            } else {
                return back()->with([
                    'type' => 'danger',
                    'message' => 'Upload should not be more than 5!',
                ]);
            }
        } else {
            return redirect()->route('lawyer.profile', 'personalData')->with([
                'type' => 'danger',
                'message' => 'Personal Data Form must be completed to proceed!'
            ]);
        }
    }

    public function cases()
    {
        $user = User::latest()->where('id', Auth::user()->id)->first();

        $cases = UserCase::latest()->where('type_of_case', $user->area_practice)
                                    ->where('payment', true)
                                    ->where('status', 'Pending')->get();

        return view('lawyer.cases', [
            'cases' => $cases
        ]);
    }

    public function case_details()
    {
        $user = User::latest()->where('id', Auth::user()->id)->first();

        $cases = UserCase::latest()->where('type_of_case', $user->area_practice)
                                    ->where('lawyer_id', $user->id)
                                    ->where('payment', true)
                                    ->where('status', '!=', 'Pending')->get();

        return view('lawyer.case_details', [
            'cases' => $cases
        ]);
    }

    public function messages()
    {
        return view('lawyer.messages');
    }

    public function services()
    {
        return view('dashboard.services');
    }

    public function case_request($id) {
        $caseid = Crypt::decrypt($id);

        $caseRequest = CaseRequest::latest()->get();

        if ($caseRequest->isEmpty()) {
            CaseRequest::create([
                'user_id' => Auth::user()->id,
                'first_name' => Auth::user()->first_name,
                'last_name' => Auth::user()->last_name,
                'email' => Auth::user()->email,
                'case_id' => $caseid
            ]);

            return back()->with([
                'type' => 'success',
                'message' => 'Request sent successfully!'
            ]);
        } else {
            $case_request = CaseRequest::latest()->where('user_id', Auth::user()->id)
                                    ->where('case_id', $caseid)->first();

            if($case_request) {
                return back()->with([
                    'type' => 'danger',
                    'message' => 'Request has been sent before!'
                ]);
            } else {
                CaseRequest::create([
                    'user_id' => Auth::user()->id,
                    'first_name' => Auth::user()->first_name,
                    'last_name' => Auth::user()->last_name,
                    'email' => Auth::user()->email,
                    'case_id' => $caseid
                ]);

                return back()->with([
                    'type' => 'success',
                    'message' => 'Request sent successfully!'
                ]);

            }
        }
    }
}

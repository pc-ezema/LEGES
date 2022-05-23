<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserCase;
use App\Payment;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    public function index()
    {
        $pendingCases = UserCase::latest()->where('user_id', Auth::user()->id)
                                        ->where('status', 'Pending')->get();
        
        $completedCases = UserCase::latest()->where('user_id', Auth::user()->id)
                                        ->where('status', 'Completed')->get();
        
        $assignedCases = UserCase::latest()->where('user_id', Auth::user()->id)
                                        ->where('status', 'Assigned')->get();
        
        $transactions = Payment::latest()->where('email', Auth::user()->email)->sum('amount');;

        $users = User::latest()->take(5)->where('account_type', 'Lawyer')->get();
        
        $cases = UserCase::latest()->where('type_of_case', Auth::user()->area_practice)
                                    ->where('payment', true)
                                    ->where('status', 'Pending')
                                    ->take(5)->get();

        $lawyerCompletedCases = UserCase::latest()->where('lawyer_id', Auth::user()->id)
                                    ->where('status', 'Completed')->get();

        $lawyerAssignedCases = UserCase::latest()->where('lawyer_id', Auth::user()->id)
                                    ->where('status', 'Assigned')->get();

        $lawyerPendingCases = UserCase::latest()->where('lawyer_id', Auth::user()->id)
                                    ->where('status', 'Pending')->get();

        $totalcases = UserCase::latest()->where('lawyer_id', Auth::user()->id)->get();

        return view('dashboard.index', [
            'pendingCases' => $pendingCases,
            'completedCases' => $completedCases,
            'assignedCases' => $assignedCases,
            'transactions' => $transactions,
            'users' => $users,
            'cases' => $cases,
            'lawyerCompletedCases' => $lawyerCompletedCases,
            'lawyerAssignedCases' => $lawyerAssignedCases,
            'lawyerPendingCases' => $lawyerPendingCases,
            'totalcases' => $totalcases
        ]);
    }
}

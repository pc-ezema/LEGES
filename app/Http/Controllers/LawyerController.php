<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function profile()
    {
        return view('lawyer.profile');
    }

    public function cases()
    {
        return view('lawyer.cases');
    }

    public function case_details()
    {
        return view('lawyer.case_details');
    }

    public function messages()
    {
        return view('lawyer.messages');
    }

    public function services()
    {
        return view('dashboard.services');
    }
}

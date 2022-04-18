<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function case_create()
    {
        return view('client.create_case');
    }

    public function messages()
    {
        return view('client.messages');
    }

    public function services()
    {
        return view('client.services');
    }
}

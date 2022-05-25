<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function index() {
        return view ('welcome');
    }

    //
    public function about() {
        return view ('about');
    }

    //
    public function contact() {
        return view ('contact');
    }

    //
    public function faqs() {
        return view ('faqs');
    }

    //
    public function terms_conditions() {
        return view ('terms_conditions');
    }

    //
    public function privacy_policy() {
        return view ('privacy_policy');
    }

    //
    public function app() {
        return view ('app');
    }

    //
    public function lawyer_registration() {
        return view ('auth.lawyer_register');
    }

    // 
    public function client_registration() {
        return view ('auth.client_register');
    }

    //
    public function admin_login() {
        return view ('auth.admin_login');
    }

}

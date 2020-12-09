<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['about', 'services']);
    }

    public function dashboard() {
        return view('dashboard');
    }


    public function about() {
        return view('pages.about');
    }

    public function services() {
        return view('pages.services');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin:administrator']);
    }

    public function index()
    {
        return "I AM AN ADMINISTRATOR";
    }
}

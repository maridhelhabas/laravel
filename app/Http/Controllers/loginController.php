<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }
        
    public function login()
    {
        return redirect()->route('habas');

    }
}

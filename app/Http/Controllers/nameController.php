<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nameController extends Controller
{
    public function Name(Request $request){
        $name = $request->input('InputName');
        return view('inputName', compact('name'));
    }
}

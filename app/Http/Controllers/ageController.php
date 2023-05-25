<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ageController extends Controller
{
    public function showAge(Request $request){
        $age = $request->input('InputAge');
        return view('ageVerifier', compact('age'));
    }
}

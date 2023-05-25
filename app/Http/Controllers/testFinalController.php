<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testFinalController extends Controller
{
     public function testFunction()
    {
        $name = "John Wick";
        return view('testing', array("name"=>$name));
    }
}

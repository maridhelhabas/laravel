<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{
    public function testFunction()
    {
        $name = "John Wick";
        return view('test.test', array("name"=>$name));
    }
}

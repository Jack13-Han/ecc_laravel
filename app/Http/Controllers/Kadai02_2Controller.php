<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kadai02_2Controller extends Controller
{
    public function index()
    {


        $message = "コントローラから渡した値です。";
        return view('kadai02_2', compact('message'));
    }
}

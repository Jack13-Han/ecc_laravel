<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kadai02_3Controller extends Controller
{
    public function index()
    {


        $comment= "";
        // $comment ="  課題２－３コントローラで格納した値です。";
        return view('kadai02_3', ["comment" => $comment]);
    }
}

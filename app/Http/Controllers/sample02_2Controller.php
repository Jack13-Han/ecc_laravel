<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sample02_2Controller extends Controller
{
    public function index()
    {

        $num = 1;
        return view('sample02_2', compact('num'));
    }
}

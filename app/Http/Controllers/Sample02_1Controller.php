<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Sample02_1Controller extends Controller
{
    public function index()
    {

        $data2 = "コントローラから渡した２つめの値です。";
        $data3 = "コントローラから渡した３つ目の値です。";
        $data = "コントローラから渡した値です。";
        return view('sample02_1', compact('data', 'data2', 'data3'));
    }
}

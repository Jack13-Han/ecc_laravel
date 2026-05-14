<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Kadai03Controller extends Controller
{
    public function index(){
        return view('articleList');
    }
    public function create(){
        return view('articleRegistration');
    }

    public function show(){
        return view('articleDetail');
    }

    public function edit(){
        return view('articleEditing');
    }
}

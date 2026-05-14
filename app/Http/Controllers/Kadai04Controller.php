<?php

namespace App\Http\Controllers;

use App\Http\Requests\Kadai04Request;

class Kadai04Controller extends Controller
{
    public function index()
    {
        return view('kadai04_1');
    }



    public function post(Kadai04Request $request)
    {


        $inputs = $request->all();
        $request->session()->regenerateToken();


        return view('kadai04_2',compact('inputs'))->with('success', 'お問い合わせが送信されました。');
    }

    public function confirm(Kadai04Request $request){
        if($request->has('back')){
            return redirect()->route('kadai04.index')->withInput();
        }

        if($request->has('action')){
            return view('kadai04_3');
        }
    }



     public function clear()
    {
        session()->forget(['name', 'email', 'course', 'title', 'note']);

        return redirect()->route('kadai04.index');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kadai02_4Contrller extends Controller
{
    public function index()
    {

        $data = [
            [
                "id" => 1,
                "name" => "ユーザー 太郎",
                "comment" => "同窓会で懐かしい友⼈達に再会しました。"
            ],
            [
                "id" => 2,
                "name" => "ほげ ほげ次郎",
                "comment" => "春休みには旅⾏に⾏きました！"
            ]
        ];

        return view('kadai02_4', compact('data'));
    }
}

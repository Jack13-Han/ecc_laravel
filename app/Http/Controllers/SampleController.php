<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $list_data = Sample::all();
        $list_data = Sample::paginate(5);
        return view('sample06List', compact('list_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // トークン再生成（二重送信の防止）
        $request->session()->regenerateToken();
        // モデルクラスのインスタンス化
        $sampleDao = new Sample();
        //バリデーションチェック
        $request->validate($sampleDao::$rules, $sampleDao::$messages);
        if ($request->has("image")) {
            $file = $request->file("image");
            $image = Storage::disk("public")->put("images", $file);
            $sampleDao->img_path = basename($image);
        }
        // リクエストデータの取得
        $sampleDao->title = $request->title;
        $sampleDao->body = $request->body;
        // DB にデータの保存
        // 手動トランザクション
        DB::transaction(function () use ($sampleDao) {
            $sampleDao->save();
        });
        // 一覧画面にリダイレクト
        return redirect()->route("sample06.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sample_data = Sample::find($id);
        return view('sample06Detail', compact('sample_data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

@extends('layouts.kadai')

@section('pageTitle', 'sample02_3')
@section('title', 'Blade テンプレート')

@section('content')
    <div>
        <h3 class="text-3xl font-bold py-5 mb-5 border-b-2 border-black">ペ
            ージビューで指定の h3 タグ</h3>
        <div class="p-5">
            <h4 class="text-xl font-bold text-pink-600 mb-2">
                ページビューで指定の h4 タグ
            </h4>
        </div>
    </div>
@endsection

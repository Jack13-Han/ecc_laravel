@extends('layouts.kadai')

@section('pageTitle', 'kadai02_3')
@section('title', 'Blade テンプレート')

@section('content')
    <div>
        <h3 class="text-3xl font-bold py-5 mb-5 border-b-2 border-black">ifによる条件分岐</h3>
        <div class="p-5">
            @if ($comment)
                <h4 class="text-xl font-bold text-pink-600 mb-2">

                    {{ $comment }}

                </h4>
            @else
                <h4 class="text-xl font-bold text-cyan-600 mb-2">
                    変数に値が格納されていません。
                </h4>
            @endif
        </div>
    </div>

@endsection

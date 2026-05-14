@extends('layouts.kadai')
@section('pageTitle', 'kadai04_1')
@section('title', 'お問い合わせ⼊⼒')
@section('content')

    <section>
        <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">お問い合わせフォーム</h3>
        <form action="{{ route('kadai04.post') }}" method="post">
            @csrf
            <div class="flex justify-between flex-col lg:flex-row items-stretch mb-5">

                <div class="flex flex-col w-full lg:w-6/12 mr-5">
                    <!-- ▼▼問い合わせ種別▼▼ -->
                    <div class="flex flex-col w-full mb-5">
                        <label class="text-gray-400 text-sm">種別</label>
                        <select name="course" class="w-full h-10 px-3 border-2 border-gray-200 rounded-md outline-none">
                            <option value="1" @selected(old('course', session('course')) == '1')>質問</option>
                            <option value="2" @selected(old('course', session('course')) == '2')>要望</option>
                            <option value="3" @selected(old('course', session('course')) == '3')>その他</option>
                        </select>
                    </div>
                    <!-- ▲▲種別▲▲ -->
                    <!-- ▼▼氏名▼▼ -->
                    <div class="flex flex-col w-full mb-5">
                        <label class="text-gray-400 text-sm">氏名<em class="text-pink-600">※</em></label>
                        <!-- TODO:oldヘルパー -->
                        <input type="text" name="name" value="{{ old('name') ?? session('name') }}"
                            class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">

                            @error('name')
                                <p class="text-sm text-pink-600 mt-1">{{ $message }}</p>

                            @enderror
                        <!-- TODO:エラーメッセージ(errorヘルパー) -->
                    </div>
                    <!-- ▲▲氏名▲▲ -->
                    <!-- ▼▼メールアドレス▼▼ -->
                    <div class="flex flex-col w-full mb-5">
                        <label class="text-gray-400 text-sm">メールアドレス<em class="text-xs text-pink-600">※</em></label>
                        <!-- TODO:oldヘルパー -->
                        <input type="text" name="email" value="{{ old('email') ?? session('email') }}"
                            class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">

                            @error('email')
                                <p class="text-sm text-pink-600 mt-1">{{ $message }}</p>
                            @enderror
                        <!-- TODO:エラーメッセージ(errorヘルパー) -->
                    </div>
                    <!-- ▲▲メールアドレス▲▲ -->

                </div>

                <div class="flex flex-col items-stretch flex-grow">

                    <!-- ▼▼件名▼▼ -->
                    <div class="flex flex-col w-full mb-5">
                        <label class="text-gray-400 text-sm">件名</label>
                        <!-- TODO:oldヘルパー -->
                        <input type="text" name="title" value="{{ old('title') ?? session('title') }}"
                            class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">
                    </div>
                    <!-- ▲▲件名▲▲ -->

                    <!-- ▼▼内容▼▼ -->
                    <div class="flex flex-col items-stretch flex-grow">
                        <label class="text-gray-400 text-sm">内容<em class="text-xs text-pink-600">※</em></label>
                        <textarea name="note" class="w-full h-40 lg:h-full text-lg px-2 py-2 border-2 border-gray-200 rounded-md">{{ old('note') ?? session('note') }}</textarea>
                        @error('note')
                            <p class="text-sm text-pink-600 mt-1">{{ $message }}</p>
                        @enderror
                        <!-- TODO:エラーメッセージ(errorヘルパー) -->
                    </div>
                    <!-- ▲▲内容▲▲ -->
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md">確認</button>
            </div>
        </form>

    </section>

@endsection

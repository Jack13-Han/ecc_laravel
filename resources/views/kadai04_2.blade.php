@extends('layouts.kadai')
@section('pageTitle', 'kadai04_2')
@section('title', 'お問い合わせ確認画⾯')
@section('content')

    <section>
        <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">お問い合わせ確認画面</h3>



        <div class="flex justify-between flex-col lg:flex-row items-stretch mb-5">

            <div class="flex flex-col w-full lg:w-6/12 mr-5">
                <!-- ▼▼問い合わせ種別▼▼ -->
                <div class="flex flex-col w-full mb-5">
                    <label class="text-gray-400 text-sm">種別</label>
                    <p class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">
                        @switch($inputs['course'])
                            @case('1')
                                質問
                                @break
                            @case('2')
                                要望
                                @break
                            @case('3')
                                その他
                                @break
                            @default
                                {{ $inputs['course'] }}
                        @endswitch
                    </p>
                </div>
                <!-- ▲▲種別▲▲ -->
                <!-- ▼▼氏名▼▼ -->
                <div class="flex flex-col w-full mb-5">
                    <label class="text-gray-400 text-sm">氏名</label>
                    <p class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">
                        {{ $inputs['name'] }} </p>
                </div>
                <!-- ▲▲氏名▲▲ -->
                <!-- ▼▼メールアドレス▼▼ -->
                <div class="flex flex-col w-full mb-5">
                    <label class="text-gray-400 text-sm">メールアドレス</label>
                    <p class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">
                        {{ $inputs['email'] }} </p>
                </div>
                <!-- ▲▲メールアドレス▲▲ -->

            </div>

            <div class="flex flex-col items-stretch flex-grow">

                <!-- ▼▼件名▼▼ -->
                <div class="flex flex-col w-full mb-5">
                    <label class="text-gray-400 text-sm">件名</label>
                    <p class="w-full h-10 px-3 text-lg border-2 border-gray-200 rounded-md outline-none">
                        {{ $inputs['title'] }} </p>
                </div>
                <!-- ▲▲件名▲▲ -->

                <!-- ▼▼内容▼▼ -->
                <div class="flex flex-col items-stretch flex-grow">
                    <label class="text-gray-400 text-sm">内容</label>
                    <div class="w-full h-40 lg:h-full text-lg px-2 py-2 border-2 border-gray-200 rounded-md whitespace-pre-wrap ">
                        {{ $inputs['note'] }}
                    </div>
                </div>
                <!-- ▲▲内容▲▲ -->
            </div>
        </div>
        <div class="flex justify-end">
            <form action="{{ route('kadai04.confirm') }}" method="POST">
                @csrf
                <input type="hidden" name="course" value="{{ $inputs['course'] }}">
                <input type="hidden" name="name" value="{{ $inputs['name'] }}">
                <input type="hidden" name="email" value="{{ $inputs['email'] }}">
                <input type="hidden" name="title" value="{{ $inputs['title'] }}">
                <input type="hidden" name="note" value="{{ $inputs['note'] }}">

                <button type="submit" name="back" value="1"
                    class="text-white text-center leading-10 bg-gray-500 px-10 mr-10 hover:bg-gray-400 rounded-md">戻る
                </button>

                <button type="submit" name="action" value="1"
                    class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md">送信
                </button>
            </form>


        </div>



    </section>
@endsection

@extends('layouts.kadai')
@section('pageTitle', 'sample06List')
@section('title', 'Sample06 一覧画面')
@section('content')


@php
    dd($list_data);
@endphp

    <section class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-10">
        @foreach ($list_data as $data)
            <!-- ▼▼記事 1 件分の表示▼▼ -->
            <article
                class="row-span-2 bg-white hover:bg-white rounded-md shadow-md
hover:shadow-lg transition-shadow overflow-hidden">
                <a href="" class="block w-full h-full">
                    {{-- <figure class="h-48 overflow-hidden">
<img src="" class="w-full h-full object-cover objecttop">
（※ここに画像が入る）
</figure> --}}
                    <h3 class="font-bold mt-5 mb-2 px-2">
                        {{ $data->title }}</h3>
                    <p class="text-gray-400 text-xs mb-5 px-2"><time datetime="">{{ $data->created_at }}</time></p>
                </a>
            </article>
            <!-- ▲▲記事 1 件分の表示▲▲ -->
        @endforeach
    </section>
{{ $list_data->links() }}

@endsection

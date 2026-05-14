@extends('layouts.kadai')

@section('pageTitle', 'kadai02_4')
@section('title', 'Blade テンプレート')

@section('content')
    <section>
        <h3 class="text-3xl font-bold py-5 mb-5 border-b-2 borderblack">foreach による繰り返し</h3>
        <div class="mb-5">

            @foreach ($data as $item)


            <label>id:</label>
            <span class="mr-2">{{$item['id']}}</span>
            <label class="ml-5">名前：</label>
            <span>{{$item['name']}}</span>
            <h4 class="text-xl font-bold text-cyan-600 mb-2">
                {{$item['comment']}}
            </h4>

            @endforeach
        </div>
    </section>

@endsection

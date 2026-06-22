@extends('layouts.kadai')
@section('pageTitle', 'articleEditing')
@section('title', '記事編集')

@section('content')
    <section>



        <form action="{{ route('articles.update', $article_data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
                <div class="my-5 px-5 py-2 border-b">
                    <label class="block text-gray-500 text-sm uppercase" for="title">title</label>
                    <input type="text" name="title" id="title"
                        class="w-full text-2xl font-bold leading-10 border border-gray-300 rounded-md"
                        value="{{old('title', $article_data->title) }}">

                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex justify-between py-3">
                    <div class="w-4/12 mr-5">
                        <label class="block text-gray-500 text-sm uppercase" for="">image file</label>
                        <!-- ▼▼画像がある場合▼▼ -->
                        <figure class="flex flex-col">
                            <!—TODO:画像 -->
                                <img src="{{ $article_data->img_path ?? 'https://via.placeholder.com/400x300' }}"
                                    class="w-full">

                        </figure>
                        <!-- ▲▲画像がある場合▲▲ -->

                        <!-- ▼▼画像がない場合▼▼ -->
                        <input type="file" name="img_path" id="image"
                            class="w-full h-80 text-xs px-3 py-2 border border-gray-300 rounded-md"
                            value="{{ $article_data->img_path ?? 'https://via.placeholder.com/400x300' }}">

                        @error('img_path')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <!-- ▲▲画像がない場合▲▲ -->
                    </div>


                    <div class="grow">
                        <label class="block text-gray-500 text-sm uppercase" for="body">body</label>
                        <textarea name="body" class="w-full h-80 text-lg px-3 py-2 border border-gray-300 rounded-md resize-none">
                            {{ old('body', $article_data->body) }}</textarea>


                        @error('body')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('articles.show', $article_data->id) }}"
                    class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>
                <button type="submit"
                    class="block w-20 text-white text-center bg-green-600 hover:bg-green-500 px-3 py-2 rounded-md">更新</button>
            </div>
        </form>
    </section>
@endsection

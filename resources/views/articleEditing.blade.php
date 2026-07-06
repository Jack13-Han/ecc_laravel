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
                        value="{{ old('title', $article_data->title) }}">

                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex justify-between py-3">
                    <div class="w-4/12 mr-5">
                        <label class="block text-gray-500 text-sm uppercase" for="">image file</label>
                        @php
                            $imgValue = $article_data->img_path ?? '';
                            $imagePath =
                                $imgValue &&
                                (str_starts_with($imgValue, 'http://') ||
                                    str_starts_with($imgValue, 'https://') ||
                                    str_starts_with($imgValue, '/'))
                                    ? $imgValue
                                    : ($imgValue
                                        ? (str_starts_with($imgValue, 'storage/')
                                            ? $imgValue
                                            : 'kadai_images/' . ltrim($imgValue, '/'))
                                        : '');
                        @endphp

                        <figure class="flex flex-col">
                            @if ($imagePath)
                                <img id="image-preview" src="{{ asset($imagePath) }}" alt="No image" class="w-full">
                            @else
                                <div id="image-preview"
                                    class="w-full h-80 border-2 border-dashed border-gray-300 rounded-md flex items-center justify-center text-gray-400 text-sm">
                                    No image
                                </div>
                            @endif
                        </figure>

                        <input type="file" name="img_path" id="image"
                            class="w-full h-80 text-xs px-3 py-2 border border-gray-300 rounded-md mt-3">

                        {{-- <img src="{{ asset($imagePath) }}" alt="Preview" class="w-full mt-3" id="image-preview">
                        <!-- ▼▼画像がない場合▼▼ --> --}}

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const preview = document.getElementById('image-preview');

            if (!imageInput || !preview) {
                return;
            }

            imageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (!file) {
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(e) {
                    if (preview.tagName === 'IMG') {
                        preview.src = e.target.result;
                        preview.alt = 'Preview';
                    } else {
                        const img = document.createElement('img');
                        img.id = 'image-preview';
                        img.src = e.target.result;
                        img.alt = 'Preview';
                        img.className = 'w-full';
                        preview.replaceWith(img);
                    }
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection

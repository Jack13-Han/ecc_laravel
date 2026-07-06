<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sample extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'samples';

    public static $rules = [
        'image' => 'image',
        // 'body' => 'required|string',
    ];

    public static $messages = [
        "title.required" => "タイトルが入力されていません",
        "body.required" => "本文が入力されていません",
        "image.image" => "画像をアップロードしてください"
    ];
}

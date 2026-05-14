<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Kadai04Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'note' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '名前が⼊⼒されていません',
            'name.string' => '名前は文字列でなければなりません。',
            'name.max' => '名前は255文字以内でなければなりません。',
            'email.required' => 'メールアドレスが⼊⼒されていません ',
            'email.email' => 'メールアドレスの形式が間違っています。',
            'email.max' => 'メールアドレスは255文字以内でなければなりません。',
            'note.required' => '内容が⼊⼒されていません',
            'note.string' => '内容は文字列でなければなりません。',
        ];
    }
}

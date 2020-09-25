<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // バリデーションルール
    public function rules()
    {
        return [
            'title' => 'required|max:20',
            'body' => 'required|max:200',
            'tags' => 'json|regex:/^(?!.*\s).+$/u|regex:/^(?!.*\/).*$/u',
            
        ];
    }
    // バリデーションエラーメッセージの項目名
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body' => '本文',
            'tags' => 'タグ',
        ];
    }

    //フォームリクエストのバリデーションが成功した後に自動的に呼ばれるメソッド
    public function passedValidation()
    {
        $this->tags = collect(json_decode($this->tags))
            ->slice(0, 3)
            ->map(function ($requestTag) {
                return $requestTag->text;
            });
    }
}

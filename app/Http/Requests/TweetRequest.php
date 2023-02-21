<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
{
    return [
        'text' => 'required|unique:tweets|max:255',
        'img' => 'nullable|image|max:2048',
    ];
}
}

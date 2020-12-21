<?php

namespace App\Http\Requests\news;

use App\Models\News;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NewsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        'title' => ['required', 'string', 'max:255', 'unique:news'],
        'content' => ['required', 'string'],
        'notice_date' => ['required', 'after:today'],

        ];

    }
}

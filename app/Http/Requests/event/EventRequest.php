<?php

namespace App\Http\Requests\event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:events'],
            'content' => ['required', 'string'],
            'start_date' => ['required', 'after:today'],
            'end_date' => ['required', 'after:start_date'],
        ];
    }
}

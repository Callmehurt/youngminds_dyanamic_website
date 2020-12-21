<?php

namespace App\Http\Requests\NavbarMenuTypes;

use Illuminate\Foundation\Http\FormRequest;

class NavbarMenuTypeRequest extends FormRequest
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
            'menu_type_name' => ['required','unique:navbar_menu_types'],
        ];
    }
}

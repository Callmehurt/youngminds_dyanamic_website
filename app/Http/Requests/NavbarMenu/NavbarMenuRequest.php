<?php

namespace App\Http\Requests\NavbarMenu;

use Illuminate\Foundation\Http\FormRequest;

class NavbarMenuRequest extends FormRequest
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
            'parent_id' => '',
            'menu_name' => 'required',
            'menu_type_id' => '',
            'site_url' => '',
            'module_url' => '',
            'status' => 'required',
            'page_slug' => '',
            'display_order' => 'required',
        ];
    }
}

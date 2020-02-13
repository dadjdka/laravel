<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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


    public function rules()
    {

        return [
            'name' => 'sometimes|required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => '标签不能为空',
        ];
    }

}

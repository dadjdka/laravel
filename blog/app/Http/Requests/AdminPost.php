<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class AdminPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
        // return true;
    }

    /**
     * 添加验证规则
     */
    public function addValidator()
    {
        //验证密码是否一致
        Validator::extend('check_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, Auth::guard('admin')->user()->password);
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->addValidator();
        return [
            'password' => 'sometimes|required|confirmed',
            'password_confirmation' => 'sometimes|required',
            'original_password' => 'sometimes|required|check_password',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => '密码不能为空',
            'password_confirmation.required' => '两次密码不一致',
            'password.confirmed' => '确认密码不能为空',
            'original_password.required' => '原密码不能为空',
            'original_password.check_password' => '原密码输入错误',

        ];
    }
}

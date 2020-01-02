<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;
use Request;
class TestController extends BaseController {
    public function index() {
        $data =Request::all();
        $rules = [
            'captcha' => 'required|captcha',//required表示必填 captcha表示进行验证码验证
        ];
        // 自定义消息
        $messages = [
            'captcha.required' => '请输入验证码',
            'captcha.captcha' => '请输入正确验证码',
        ];
        //对验证码字段进行验证
        $validator = \Validator::make($data, $rules, $messages);
        if($validator->passes()){
            //验证通过
        }else{
            //验证失败
            //$validator->errors() 获取错误信息
            //返回上个页面并将错误信息返回到页面上
            return back()->withErrors($validator);
        }
    }
}
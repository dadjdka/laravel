<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cookie;
use Request;
class TestController extends BaseController {

    public function index() {
    
        $value = Cookie::get('key');
        
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
            return $value;
        }else{
            //验证失败
            //$validator->errors() 获取错误信息
            //返回上个页面并将错误信息返回到页面上
            return back()->withErrors($validator);
        }
    }

    public function captchaShow(){
      
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder();
        // $builder = new CaptchaBuilder();
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        //可以设置图片宽高及字体
        $builder->build($width = 250, $height = 70, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        session(['phrase'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    public function checkCapt(Request $request)
    {
        $data =Request::all();
        if (session('phrase') == $data['captcha']) {
            //用户输入验证码正确
            //清除session
            session()->forget('phrase');
            return '验证码正确';
        } else {
            //用户输入验证码错误
            return '验证码输入错误';
        }
    }


    public function updateSysConfig(Request $request) {
        $rules = [
            'config_name' => 'required',
        ];
    
        // Cookie::queue(Cookie::forget('refreshToken'));

        // $this->validate($request, $rules);
        // $redis = Redis::connection
       
        // $redis->get("123");
        // $id = request('id');
        // $data = SysConfig::find($id);
    
        // $update_result = $data->update(request()->all());
        // if ($update_result) {
            
        //     $redis = Redis::connection();
        //     $redis_key = 'xxx:' . $data->config_key;
        //     $redis->set($redis_key, request('config_value'));
        // } else {
        //     return back()->withErrors('服务器内部错误，更新失败！');
        // }
        // return "545";
    }

    public function text() {
        return '11';
    }
   
}
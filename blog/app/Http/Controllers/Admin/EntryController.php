<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;

class EntryController extends Controller
{

    public function __construct()
    {
        // ->验证器->排除验证
        $this->middleware('admin.auth')->except(['loginForm','login','code']);

    }

    public function index()
    {
        
        return view('admin.index');

    }

   

    //登录视图
    public function loginForm(){

        $code = $this->code();
        return view('admin.login',compact('code'));
    }

    public function code()
    {
        $builder = new CaptchaBuilder;
        $builder->build();
        $code = $builder->inline();  //获取图形验证码的url
        session()->put('piccode', $builder->getPhrase());  //将图形验证码的值写入到session中
     
        return $code;
    }

    //登录处理
    public function login(Request $request)
    {
        //查询相应配置项

        //验证码验证处理
        $code = Session::get('piccode');
       
        if (strtoupper($code) != strtoupper($request->input('code'))) 
        {
          
            return redirect('/admin/login')->with('error',"验证码错误");

        }
        

        $status = Auth::guard('admin')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')]);

        if ($status) 
        {
            return redirect('/admin/index');
        }

        //分配
        return redirect('/admin/login')->with('error',"用户密码或账号错误");
    }
    //退出登录
    public function logout(){
        //去模型中查找自定义
        Auth::guard('admin')->logout();

        //跳转首页
        return redirect('/admin/login');
    }
}

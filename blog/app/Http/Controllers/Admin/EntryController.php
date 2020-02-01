<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EntryController extends Controller
{

    public function __construct()
    {
        // ->验证器->排除验证
        $this->middleware('admin.auth')->except(['loginForm','login']);
    }

    public function index()
    {
        return view('admin.index');
    }

    //登录视图
    public function loginForm(){
        return view('admin.login');
    }

    //登录处理
    public function login(Request $request)
    {
        //查询相应配置项

        $status = Auth::guard('admin')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')]);

        if ($status) {
            return redirect('/admin/index');
        }

        //分配
        return redirect('/admin/login')->with('error',"用户密码或账号错误");
    }

}

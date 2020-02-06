<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MyController extends Controller
{
    public function posswordForm()
    {
        return view('admin.my.posswordForm');
    }
    public function changPassword(AdminPost $request)
    {
        $modal = Auth::guard('admin')->user();
        // dd($modal);
        $modal->password = bcrypt($request['password']);
        $modal->save();
        flash('密码修改成功')->overlay();
        //返回上一页面
        return redirect()->back();
    }
}

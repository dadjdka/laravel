<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPost;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function posswordForm()
    {
        return view('admin.my.posswordForm');
    }
    public function changPassword(AdminPost $request)
    {
        return '55';
    }
}

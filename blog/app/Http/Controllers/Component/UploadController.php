<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploader(Request $request)
    {


        $upload = $request->file('preview');


        // dd($upload);
        if($upload->isValid()){
            $path = $upload->store(date('ym'),'attachment');
            return ['vaild' => 1,'message' => asset('attachment/'.$path)];
        }

        return ['vaild' => 0,'message' => '上次图片不能超过2MB'];
    }

    public function fileslists(){

        return ['data' => [], 'page' => ''];

    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Tag;
use Illuminate\Http\Request;

class ContentController extends CommonController
{
    public function tags(){
        return $this->response(Tag::get());
    }
}

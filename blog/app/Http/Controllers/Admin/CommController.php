<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class CommController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    protected function success($message)
    {
        return response()->json(['message' => $message, 'valid' => '1']);
    }

    protected function error($message)
    {
        return response()->json(['message' => $message, 'valid' => '0']);
    }
}

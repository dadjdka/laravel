<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OssController extends Controller
{
   public function sign(Request $request)
   {

       $vid = $request->file('vid');
        // dd($vid->getClientOriginalExtension());
        // dd($vid->getRealPath());
       $id = 'LTAI4FgLj2Cfe75q61BEeAbW';
       $key = 'bGpvpAcHuu0QzpG2k6xHm1CiRU7Swg';
       $host = 'http://laravel6-video.oss-cn-beijing.aliyuncs.com';

       $dir = $_GET['dir'];


       function gmt_iso8601($time)
       {
            $dtStr = date("c",$time);
            $mydatetime = new \DateTime($dtStr);
            $expiration = $mydatetime->format(\DateTime::ISO8601);
            $pos = strpos($expiration, '+');
            $expiration = substr($expiration,0,$pos);

            return $expiration."z";
       }

       $now = time();
       $expire = 30; //policy 超时时间
       $end = $now + $expire;
       $expiration = gmt_iso8601($end);

       //最大文件大小
       $condition = [0 => 'content-length-range', 1 => '$key', 2 => $dir];
       $condition[] = $condition;

       //表示用户上传的数量，必须是以dir开始，不然上传会失败（不是必须项）
    //    $start = [0 => 'starts-with', 1 => '$key', 2 => $dir];
    //    $condition [] = $condition;

       $arr = ['expiration' => $expiration, 'condition' => $condition];
       $policy = json_encode($arr);

       $base64_policy = \base64_encode($policy);
       $string_to_sign = $base64_policy;
       $signature = \base64_encode(hash_hmac('sha512',$string_to_sign,$key,true));

       $response = [];
       $response['accessid'] = $id;
       $response['host'] = $host;
       $response['policy'] = $base64_policy;
       $response['signature'] = $signature;
       $response['expire'] = $end;
       $response['dir'] = $dir;
    //    dd($response);
       return json_encode($response);


   }
}

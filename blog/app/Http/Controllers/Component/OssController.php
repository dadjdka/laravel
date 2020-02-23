<?php

namespace App\Http\Controllers\Component;
if (is_file(__DIR__ . '/../autoload.php')) {
    require_once __DIR__ . '/../autoload.php';
}
if (is_file(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
}
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OSS\Core\OssException as CoreOssException;
// use App\Services\OSS;
// use Aliyun\OSS\OSSClient;
use OSS\OssClient;

use OSS\Core\OSSException;


class OssController extends Controller
{
   public function sign(Request $request)
   {

       $vid = $request->file('vid');
        // dd($vid->getClientOriginalExtension());
        // dd($vid->getRealPath());
    //    $id = 'LTAI4FgLj2Cfe75q61BEeAbW';
    //    $key = 'bGpvpAcHuu0QzpG2k6xHm1CiRU7Swg';
    //    $host = 'http://laravel6-video.oss-cn-beijing.aliyuncs.com';

       $dir = "video";

    // dd($vid->getRealPath());

        // 阿里云主账号AccessKey拥有所有API的访问权限，风险很高。强烈建议您创建并使用RAM账号进行API访问或日常运维，请登录 https://ram.console.aliyun.com 创建RAM账号。
        $accessKeyId = "LTAI4FgLj2Cfe75q61BEeAbW";
        $accessKeySecret = "bGpvpAcHuu0QzpG2k6xHm1CiRU7Swg";
        // Endpoint以杭州为例，其它Region请按实际情况填写。
        $endpoint = "http://oss-cn-beijing.aliyuncs.com";
        // 存储空间名称
        $bucket= "laravel6-video";
        // 文件名称
        $object = 'Cache__1dc5f74ff74f589..jpg';
        // <yourLocalFile>由本地文件路径加文件名包括后缀组成，例如/users/local/myfile.txt
        $filePath = "/Users/25470/Pictures/".$object;

        // $config = array($accessKeyId,$accessKeySecret,$endpoint);

        try{
            $ossClient = new OssClient($accessKeyId,$accessKeySecret,$endpoint);
            $ossClient->uploadFile($bucket, $object, $vid->getRealPath());
        } catch(OssException $e) {
            printf(__FUNCTION__ . ": FAILED\n");
            printf($e->getMessage() . "\n");
            return;
        }
        print(__FUNCTION__ . ": OK" . "\n");












    //    function gmt_iso8601($time)
    //    {
    //         $dtStr = date("c",$time);
    //         $mydatetime = new \DateTime($dtStr);
    //         $expiration = $mydatetime->format(\DateTime::ISO8601);
    //         $pos = strpos($expiration, '+');
    //         $expiration = substr($expiration,0,$pos);

    //         return $expiration."z";
    //    }

    //    $now = time();
    //    $expire = 30; //policy 超时时间
    //    $end = $now + $expire;
    //    $expiration = gmt_iso8601($end);

    //    //最大文件大小
    //    $condition = [0 => 'content-length-range', 1 => '$key', 2 => $dir];
    //    $condition[] = $condition;

    //    //表示用户上传的数量，必须是以dir开始，不然上传会失败（不是必须项）
    // //    $start = [0 => 'starts-with', 1 => '$key', 2 => $dir];
    // //    $condition [] = $condition;

    //    $arr = ['expiration' => $expiration, 'condition' => $condition];
    //    $policy = json_encode($arr);

    //    $base64_policy = \base64_encode($policy);
    //    $string_to_sign = $base64_policy;
    //    $signature = \base64_encode(hash_hmac('sha512',$string_to_sign,$key,true));

    //    $response = [];
    //    $response['accessid'] = $id;
    //    $response['host'] = $host;
    //    $response['policy'] = $base64_policy;
    //    $response['signature'] = $signature;
    //    $response['expire'] = $end;
    //    $response['dir'] = $dir;
    // //    dd($response);
    //    return json_encode($response);


   }
}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
       
    </head>
    <body>
    <form name="form" action="./check" method="post">
        <div class="flex-center position-ref full-height">
          

            <div class="content">
                <div class="title m-b-md">
                <?=$name?>
                
                </div>
            
                <div class="links">
                
                <img src="{{captcha_src('flat')}}" onclick="this.src='{{url()->full()}}/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                <input type="text" name="captcha">
                {{csrf_field()}}
                @if($errors->has('captcha'))
                    <span>{{$errors->first('captcha')}}</span>
                @endif
                <input type="submit" value="验证"/>
                </div>
            </div>
        </div>
    </form>


    <form name="form" action="./captchaShow" method="post">
        <div class="flex-center position-ref full-height">
          

            <div class="content">
                <div class="title m-b-md">
                <?=$name?>
                
                </div>
            
                <div class="links">
                
                <img src="{{captcha_src('flat')}}" onclick="this.src='{{url()->full()}}/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                <input type="text" name="captcha">
                {{csrf_field()}}
                @if($errors->has('captcha'))
                    <span>{{$errors->first('captcha')}}</span>
                @endif
                <input type="submit" value="验证二"/>
                </div>
            </div>
        </div>
    </form>
    </body>
</html>




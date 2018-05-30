<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <link href="/bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <link href="/css/login-register.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <script src="/jquery/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="/bootstrap3/js/bootstrap.js" type="text/javascript"></script>
    <script src="/js/login-register.js" type="text/javascript"></script>
    <script src="/js/common.js" type="text/javascript"></script>

    <style>
        html, body{
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .bcontainer{
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #000000;
        }
    </style>

</head>
<body>

<div id="mainBody">
    <div id="cloud1" class="cloud"></div>
    <div id="cloud2" class="cloud"></div>
</div>

<div id="weather">
    <img src="images/cloud.png" width="300">
</div>
<div class="form loginBox" style="width:300px;height:180px;position:absolute;left:40%;top:50%;margin-top:-190px;padding: 10px;z-index: 999;" >
    <form method="post" action="{{url('/post_login')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <h3 style="text-align: center;">登录</h3>
        </div>
        <div class="form-group">
            <label for="username"></label>
            <input type="text" class="form-control" id="username" placeholder="请输入账号" name="username">
        </div>
        <div class="form-group">
            <label for="password"></label>
            <input type="password" class="form-control" id="password" placeholder="请输入密码" name="password">
        </div>
        <div class="form-group">
            <input type="text" class="" placeholder="验证码" id="yzm" name="yzm" style="width: 50%;height: 40px;padding: 6px 12px;font-size: 14px;border: 1px solid #cccccc;border-radius: 4px;">
            <a onclick="javascript:re_captcha();" ><img src="{{url('code?tmp=1')}}"  alt="验证码" title="刷新图片" width="120" height="40" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a>
        </div>

        <button type="submit" class="btn btn-default" style="margin-left: 100px;">登录</button>
        <a href="/reg" style="margin-left: 20px;color: #080808;padding-top: 5px;">注册账号</a>
    </form>
</div>
<script>
    var err="{{$err}}";

    if(err){
        alert(err);
    }


    function re_captcha() {
        $url = "{{ URL('code')}}";
        $url = $url + "?tmp=" + Math.random();
        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
    }

    function checkForm() {
        var username = $('#username');
        var password = $('#password');
        var yzm = $('#yzm');

        if(username.val() ==''){//pro_user
            username.focus();
            alert('用户名不能为空!');

            return false;
        }
        if(password.val() ==''){//pro_user
            password.focus();
            alert('密码不能为空!');

            return false;
        }
        if(yzm.val()==''){
            yzm.focus();
            alert('验证码不能为空!');
            return false;
        }
        return true;
    }
</script>
</body>
</html>

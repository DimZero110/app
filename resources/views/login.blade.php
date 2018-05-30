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
    <form>
        <div class="form-group">
            <h3 style="text-align: center;">登录</h3>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"></label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入账号" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"></label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入密码">
        </div>

        <button type="submit" class="btn btn-default" style="margin-left: 100px;">登录</button>
        <a href="/reg" style="margin-left: 20px;color: #080808;padding-top: 5px;">注册账号</a>
    </form>
</div>

</body>
</html>

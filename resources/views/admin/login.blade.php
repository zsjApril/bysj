<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>体检问卷后台管理</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,body{
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .login_bg{
            position: relative;
            height: 100%;
            /*background-color:#0ba360;*/
            background: linear-gradient(to right, #0ba360 0%, #3cba92 100%);
        }
        .login_box{
            position: absolute;
            width: 600px;
            height: 320px;
            background-color:rgba(60,186,146,0.5) ;
            color: #ffffff;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-80%);
            border-radius: 5px;
        }
        .form-horizontal{
            padding-left: 11%;
            padding-top: 7%;
        }
        .link-top {
            width: 475px;
            border-top: solid #ffffff 2px;
            margin-left: 11%;
        }
    </style>
</head>
<body>
<div class="login_bg">
    {{--登录界面--}}
    <div class="login_box">
        {{--登录标题--}}
        <h2>体检问卷后台管理</h2>
        <div class="link-top" ></div>
        {{--表单--}}

        <form class="form-horizontal" method="post" action="/login">
            <div class="form-group">
                <label for="inputUsername" class="col-sm-2 control-label">管理员</label>
                <div class="col-sm-8">
                    <input type="username" class="form-control" id="inputUsername3" name="name" placeholder="用户名为手机号">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">密　码</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword3" name="password">
                </div>
            </div>
            <div class="form-group">
                @if (count($errors) > 0)
                    <div class="col-sm-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="list-style:none">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @if (session('info'))
                        <div class="col-sm-6 col-sm-offset-1">
                            {{session('info')}}
                        </div>
                    @endif
                <div class="col-sm-offset-6 col-sm-6">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-default" style="width: 65px">登录</button>
                </div>
            </div>
        </form>

    </div>
</div>

</body>
</html>
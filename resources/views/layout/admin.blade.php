<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/layer.css')}}" rel="stylesheet">
    <script src="{{ asset('js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{ asset('js/layer.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>

    @Section('style')
        <style>
            /*html,body{*/
                /*height: 100%;*/
                /*margin: 0;*/
                /*padding: 0;*/
            /*}*/
            .page_top{
                position: absolute;
                margin-top: 0;
                width: 100%;
                height: 80px;
                background: linear-gradient(to left, #0ba360 0%, #3cba92 100%);
                display: flex;
            }
            .page_top_btn{

                padding-top: 25px;
            }
            .page_content{
                padding-top: 80px;
                display: flex;
            }
            .page_title{
                color: #ffffff;
                padding-left: 110px;
                padding-top: 5px;
            }
            .menu-list{
                padding-top: 50px;

                width: 350px;
                height: 100vh;
                background: linear-gradient(to top, #0ba360 0%, #3cba92 100%);
                font-size:22px;
            }
            .container{
                margin-left:30px;
                margin-top:30px;
            }

            .menu-list ul{
                list-style: none;
                padding-left: 30px;
                /*padding:0;*/
                margin:0 auto;
            }
            .second-menu{
                padding-left: 10px;
            }
            /*.menu-list ul li{*/
                /*text-align:center;*/
            /*}*/
            .menu-list ul li.first-menu{
                overflow: hidden;
            }
            .menu-list ul li:HOVER>a{
                color: #0ba360;/*鼠标放上去的颜色*/
            }
            .menu-list ul li a{
                display:block;
                padding:16px 0;
                color: #ffffff;
                text-decoration:none;
            }
            .menu-list ul li.first-menu>a{
                padding-left: 15px;
            }
            .menu-list ul li.first-menu.active>a{
                color: #ffffff;/*展开子菜单后，主菜单字体颜色*/
                vertical-align: middle;
            }
            .menu-list ul li.first-menu.active ul li.second-menu.current a{
                background-color: #0ba360;/*子菜单点后击背景*/
                font-size: 18px;
            }
            .menu-list ul li.first-menu ul{
                display:none;
            }
            .menu-list ul li.first-menu ul li.second-menu a{
                padding: 12px 0 12px 31px;
                font-size:16px;
                color: #ffffff;
            }
            span{
                padding-left: 20px;
            }
        </style>

    @show
<title>@yield('title')</title>

</head>
<body>
<div class="page_dashboard">
    <div class="page_top">
        <div class="page_top_title col-sm-12">
            <h1 class="page_title">体检问卷后台管理</h1>
        </div>
        {{--退出登陆--}}
        <div class="page_top_btn  col-sm-2 col-md-offset-4">
            <a class="btn btn-default" style="width: 65px;" href="/logout">退出</a>
        </div>
    </div>

    <div class="page_content">
        <div class="menu-list">
            <ul>
                <li class="first-menu">
                    <a href="/dashboard">
                        <i class="glyphicon glyphicon-home" style="color: #FFFFFF"></i>
                        <span>首页</span>
                    </a>
                </li>
                <li class="first-menu">
                    <a>
                        <i class="glyphicon glyphicon-pencil" style="color: #FFFFFF"></i>
                        <span>体检问卷管理</span>
                    </a>
                    <ul>
                        <li class="second-menu">
                            <a href="{{url('/pe_questionnaire/index')}}">题目列表</a>
                        </li>
                        <li class="second-menu">
                            <a href="{{url('/pe_questionnaire/add')}}">添加题目</a>
                        </li>
                    </ul>
                </li>
                <li class="first-menu">
                    <a>
                        <i class="glyphicon glyphicon-th-list" style="color: #FFFFFF"></i>
                        <span>体检项目管理</span>
                    </a>
                    <ul>
                        <li class="second-menu">
                            <a href="{{url('/pe_items/index')}}">项目列表</a>
                        </li>
                        <li class="second-menu">
                            <a href="{{url('/pe_items/add')}}">添加项目</a>
                        </li>
                    </ul>
                </li>
                <li class="first-menu">
                    <a>
                        <i class="glyphicon glyphicon-file" style="color: #FFFFFF"></i>
                        <span>体检套餐管理</span>
                    </a>
                    <ul>
                        <li class="second-menu">
                            <a href="{{url('/pe_package/index')}}">套餐列表</a>
                        </li>
                        <li class="second-menu">
                            <a href="{{url('/pe_package/add')}}">添加套餐</a>
                        </li>
                    </ul>
                </li>
                <li class="first-menu">
                    <a>
                        <i class="glyphicon glyphicon-cog" style="color: #FFFFFF"></i>
                        <span>系统管理</span>
                    </a>
                    <ul>
                        <li class="second-menu">
                            <a href="{{url('/user/index')}}">管理员列表</a>
                        </li>
                        <li class="second-menu">
                            <a href="{{url('/user/add')}}">增加管理员</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        {{--主体部分--}}

        <div class="container">
            @if (session('info'))
                <div class="alert alert-success">
                    {{session('info')}}
                </div>
            @endif
            @section('content')
            @show
        </div>
    </div>
</div>

</body>
@Section('script')
<script>
    $(".menu-list .first-menu").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
        $(this).find("ul").slideToggle(500);
        $(this).siblings().find("ul").hide();
    });

    $(".menu-list .second-menu").click(function(){
        var $this = $(this);
        $(".second-menu").each(function () {
            if($(this).hasClass("current")){
                $(this).removeClass("current");
            }
        });
        $this.addClass("current").siblings().removeClass("current");
    });

    //阻止事件冒泡
    $(".menu-list .first-menu ul").bind("click",function(event){
        event.stopPropagation();
    });
</script>
@show
</html>
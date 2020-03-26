<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
测试提交页面

<div>
    向你推荐：<span style="color: red">{{$recommend}}</span>
</div>
<div>
    推荐度为:
    @foreach($packages as $package)
        <div>
            {{$package['name']}}: <span style="color: blue">{{$package['count']}}分</span>
        </div>
    @endforeach
</div>
</body>
</html>
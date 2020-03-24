
{{--Created by PhpStorm.--}}
{{--User: root--}}
{{--Date: 20-2-5--}}
{{--Time: 下午3:55--}}
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
        @media only screen and (max-width: 1200px) {
            body {
                background-color: #7AC1BA;
            }
        }
        #questionnaire{

            color: #ffffff;
            text-align: center;
            margin-top: 35%;
            flex-direction:column;
        }
        #sta_btn{
            width: 160px;
            height: 50px;
            border-radius: 25px;
            border: 2px solid #888a85;
            background-color: white;
            font-size: 30px;
            color:#7AC1BA;
        }
    </style>
    <title>体检问卷</title>
</head>
<body>
<div>
    <div id="questionnaire">
        <p style="font-size: 55px;">体检问卷</p>
        <p style="font-size: 20px;color: #ffffff;">请根据性别选择问卷！</p>
        <p style="font-size: 20px;color: #ffffff">(我们将会根据问卷结果推荐合适的体检套餐给您!)</p>
        <div style="margin-top: 50px">
            <a href="/api/wechat/single"><button id="sta_btn" style="float: left;margin-left: 20px">男</button></a>
            <a href="/api/wechat/multiple"><button id="sta_btn">女</button></a>
        </div>
    </div>
</div>

</body>
</html>
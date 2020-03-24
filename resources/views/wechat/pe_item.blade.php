<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>体检项目</title>
    <style>
        li{
            list-style: none;
        }
    </style>
</head>
<body>
<div>
    <form>
        <ul>
            @foreach($pe_item as $k )
                <li>
                    <input type="checkbox">{{$k -> name}}
                </li>
            @endforeach
        </ul>
    </form>
</div>
</body>
</html>
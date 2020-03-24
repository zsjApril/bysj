<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/layer.css')}}" rel="stylesheet">
    <script src="{{ asset('js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{ asset('js/layer.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <title>套餐列表</title>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
</head>
<body>
    <div>
        <table class="table table-hover">
            <thead>
            <!-- On rows -->
            <tr class="active">
                <th>套餐名称</th>
                <th>价格</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <!-- On cells (`td` or `th`) -->
            @foreach($pe_package as $k )
                <tr class="info">
                    <td>{{$k->name}}</td>
                    <td>{{$k->price}}</td>
                    <td><button class="btn btn-warning">预约</button></td>
                    <td>
                        {{--<a tabindex="0" class="btn btn-info" role="button" data-toggle="popover"--}}
                           {{--data-placement="left" data-trigger="focus" title="{{$k->name}}"--}}
                           {{--data-content="{{$k->content}}">详情</a>--}}
                        <button class="btn btn-success" onclick="showContent('{{$k->content}}')" >详情</button>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
{{--详情弹窗--}}
<script>
    function showContent(content){
        layer.alert(content);
    }
</script>
</html>
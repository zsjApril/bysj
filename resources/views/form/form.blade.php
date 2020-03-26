<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>测试表单</title>
    {{--    这里引入bootstrap,免得再写表单样式--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        .p-3 {
            padding: 15px;
        }

        .fz-20 {
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="p-3">
    <div class="text-center">
        <h2>测试问卷</h2>
    </div>
    <form class="form" action="/form" method="post">
        @foreach($questions as $q)
            <div class="form-group">
                {{-- 问题题目--}}
                <label class="fz-20">{{$loop->index + 1}}.{{$q['label']}}</label>
                {{--单选题--}}
                @if ($q['type'] == 'select')
                    <div>
                        @foreach($q['options'] as $option)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios{{$loop->parent->index}}"
                                           value="{{$option['recommend_id']}}">
                                    {{$option['name']}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    {{--多选题--}}
                @elseif ($q['type'] == 'm-select')
                    <div>
                        @foreach($q['options'] as $option)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="optionsCheckbox{{$loop->parent->index}}[]"
                                           value="{{$option['recommend_id']}}">
                                    {{$option['name']}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
        {{csrf_field()}}
        <button type="submit" class="btn btn-default">确认表单</button>
    </form>
</div>
</body>
</html>
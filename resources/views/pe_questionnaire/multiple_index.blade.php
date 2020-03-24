@extends('layout.admin')

@section('title','多选题目列表')

@section('style')
    @parent
    <style>
        #panel-heading{
            background-color:#0ba360;
        }
        #panel-title{
            font-size:25px;
            color:#ffffff;
        }
        label{
            font-size:20px;
        }

        /*分页控件显示在右边*/
        #pagination{
            text-align: right;
        }
        th,td{
            text-align: center;
        }
    </style>

@endsection


@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-info">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading" id="panel-heading">
            <h2 class="panel-title" id="panel-title">多选题目列表</h2>
        </div>
        <div>
            <div style="float: right">
                <form class="navbar-form navbar-left" action="/pe_questionnaire/index">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="搜索题目名称关键字" name="keyword">
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                    <button type="submit" class="btn btn-default">返回</button>
                </form>
            </div>
        </div>
        <div>
            <table class="table table-hover" >
                <thead>
                <!-- On rows -->
                <tr class="active">
                    <th>ID</th>
                    <th>名称</th>
                    <th>价格</th>
                    <th>操作</th>
                </tr>
                </thead>
                {{--<tbody>--}}
                {{--<!-- On cells (`td` or `th`) -->--}}
                {{--@foreach($pe_items as $k => $v)--}}
                    {{--<tr>--}}
                        {{--<td class="success">{{$v->id}}</td>--}}
                        {{--<td class="warning">{{$v->name}}</td>--}}
                        {{--<td class="danger">{{$v->price}}</td>--}}
                        {{--<td class="info">--}}
                            {{--<a href="/pe_items/edit/{{$v->id}}" class="btn btn-info">修改</a>--}}
                            {{--<a href="/pe_items/delete/{{$v->id}}" class="btn btn-danger">删除</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            </table>
            {{--<div id="pagination">--}}
                {{--{{ $pe_ques->appends($request->only(['keyword']))->links() }}--}}
            {{--</div>--}}
        </div>
    </div>
@endsection

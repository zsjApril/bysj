@extends('layout.admin')

@section('title','管理员列表')

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
            padding-right: 15px;
        }
        th,td{
            text-align: center;
        }
    </style>

@endsection



@section('content')
    <div class="panel panel-default">
        <div class="panel-heading" id="panel-heading">
            <h2 class="panel-title" id="panel-title">管理员列表</h2>
         </div>
        <div style="float: right">
            <form class="navbar-form navbar-left" action="/user/index">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索管理员名称关键字" name="keyword">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
                <button type="submit" class="btn btn-default">返回</button>
            </form>
        </div>
        <div>
            <table class="table table-hover">
                <thead>
                    <!-- On rows -->
                    <tr class="active">
                        <th>ID</th>
                        <th>管理员</th>
                        <th>邮箱</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- On cells (`td` or `th`) -->
                    @foreach($users as $k => $v)
                        <tr>
                            <td class="success">{{$v->id}}</td>
                            <td class="warning">{{$v->name}}</td>
                            <td class="danger">{{$v->email}}</td>
                            <td class="info">
                                <a href="/user/delete/{{$v->id}}" class="btn btn-danger">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="pagination">
                {{ $users->appends($request->only(['keyword']))->links() }}
            </div>
        </div>

    </div>
@endsection

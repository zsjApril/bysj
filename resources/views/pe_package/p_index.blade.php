@extends('layout.admin')

@section('title','体检套餐列表')

@section('style')
    @parent
    <style>
        #panel-heading {
            background-color: #0ba360;
        }

        #panel-title {
            font-size: 25px;
            color: #ffffff;
        }

        label {
            font-size: 20px;
        }

        #import_btn {
            float: left;
            /*margin-top: 20px;*/
            margin-left: 15px;
        }

        /*分页控件显示在右边*/
        #pagination {
            text-align: right;
        }

        th, td {
            text-align: center;
        }
    </style>

@endsection



@section('content')
    <div class="panel panel-default">
        <div class="panel-heading" id="panel-heading">
            <h2 class="panel-title" id="panel-title">体检套餐列表</h2>
        </div>
        <div style="float: right">
            <form class="navbar-form navbar-left" action="/pe_package/index">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索套餐内容关键字" name="keyword">
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
                    <th>套餐名称</th>
                    <th>套餐内容</th>
                    <th>价格</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <!-- On cells (`td` or `th`) -->
                @foreach($pe_packages as $k => $v)
                    <tr>
                        <td class="success">{{$v->id}}</td>
                        <td class="warning">{{$v->name}}</td>
                        <td class="danger">
                            @foreach($v->items as $item) {{$item->name}} @endforeach
                        </td>
                        <td class="info">{{$v->price}}</td>
                        <td class="active">
                            <a href="/pe_package/edit/{{$v->id}}" class="btn btn-info">修改</a>
                            <a href="/pe_package/delete/{{$v->id}}" class="btn btn-danger">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <div>
                <form id="import_btn" action="/pe_package/import" method='post' enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input id="fileId1" type="file" name="file" value=""/>
                    <input type="submit" class="btn btn-success" style="margin-top: 10px" value="上传并导入">
                </form>
            </div>
            <div id="pagination">
                {{ $pe_packages->appends($request->only(['keyword']))->links() }}
            </div>
        </div>

    </div>
@endsection

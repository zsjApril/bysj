@extends('layout.admin')

@section('title','修改项目内容')

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
        .form-horizontal{
            padding-top: 50px;
        }
        .form-group{
            margin-bottom: 40px;
            padding-left: 100px;
            padding-right: 40px;

        }
    </style>

@endsection



@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading" id="panel-heading">
            <h2 class="panel-title" id="panel-title">修改项目信息</h2>
        </div>
        <form class="form-horizontal" action="{{url('/pe_items/update')}}" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">项目名称</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="{{$pe_items->name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">项目内容</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" rows="15" name="content">{{$pe_items->content}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">价格</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="{{$pe_items->price}}">
                </div>
            </div>

            <div class="form-group">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$pe_items->id}}">
                <button type="reset" class="btn btn-default" style="float:right;width: 80px">重置</button>
                <button type="submit" class="btn btn-default" style="float:right;width: 80px">更新</button>
            </div>

        </form>
    </div>
    </div>

@endsection


@extends('layout.admin')

@section('title','修改体检套餐')

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
            <h2 class="panel-title" id="panel-title">修改套餐信息</h2>
        </div>
        <form class="form-horizontal" action="{{url('/pe_package/update')}}" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">套餐名称</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="{{$pe_packages->name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">套餐内容</label>
                <div class="col-sm-6">
                    <textarea type="text" rows="15" cols="" class="form-control"  name="content">{{$pe_packages->content}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">价格</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="{{$pe_packages->price}}">
                </div>
            </div>

            <div class="form-group">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$pe_packages->id}}">
                <button type="reset" class="btn btn-default" style="float:right;width: 80px">重置</button>
                <button type="submit" class="btn btn-default" style="float:right;width: 80px">更新</button>
            </div>

        </form>
    </div>
    </div>

@endsection


@extends('layout.admin')

@section('title','添加管理员')

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
            <h2 class="panel-title" id="panel-title">添加管理员</h2>
        </div>
            <form class="form-horizontal" action="{{url('/user/insert')}}" method="post">
                <div class="form-group">
                    <label for="exampleInputUsername" class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="col-sm-2 control-label">邮　箱</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control"  name="email" value="{{old('email')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="col-sm-2 control-label">密　码</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="repassword">
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="exampleInputFile" class="col-sm-2 control-label">File input</label>--}}
                    {{--<input type="file" id="exampleInputFile">--}}
                    {{--<p class="help-block">Example block-level help text here.</p>--}}
                {{--</div>--}}
                <div class="form-group">
                    {{csrf_field()}}
                    <button type="reset" class="btn btn-default" style="float:right;width: 80px">重置</button>
                    <button type="submit" class="btn btn-default" style="float:right;width: 80px">提交</button>
                </div>

            </form>
        </div>
    </div>

@endsection


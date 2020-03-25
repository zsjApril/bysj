@extends('layout.admin')

@section('title','修改题目内容')

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
            <h2 class="panel-title" id="panel-title">添加题目</h2>
        </div>
        <form class="form-horizontal" action="{{url('/pe_questionnaire/insert')}}" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">题干</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="label" value="{{old('label')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">类型</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="type" value="{{old('type')}}">
                </div>
                <div class="col-sm-6">
                    <p>(类型：单选：select；多选：m-select)</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">适用性别</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="male" value="{{old('male')}}">
                </div>
                <div class="col-sm-6">
                    <p>(适用性别：0：通用；1：男；2：女)</p>
                </div>
            </div>

            <div class="form-group">
                {{csrf_field()}}
                <button type="reset" class="btn btn-default" style="float:right;width: 80px">重置</button>
                <button type="submit" class="btn btn-default" style="float:right;width: 80px">添加</button>
            </div>

        </form>
    </div>
    </div>

@endsection
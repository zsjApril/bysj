@extends('layout.admin')

@section('title','修改题目内容')

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

        .form-horizontal {
            padding-top: 50px;
        }

        .form-group {
            margin-bottom: 40px;
            padding-left: 100px;
            padding-right: 40px;

        }

        .pt-3 {
            padding-top: 3px;
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
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox1" name="type"
                               @if (old('type')=='select') checked @endif
                               value="select"> 单选
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox2" name="type"
                               @if (old('type')=='m-select') checked @endif
                               value="m-select"> 多选
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">适用性别</label>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox0" name="male"
                               @if (old('male')==0) checked @endif
                               value="0"> 通用
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox1" name="male"
                               @if (old('male')==1) checked @endif
                               value="1"> 男
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox2" name="male"
                               @if (old('male')==2) checked @endif
                               value="2"> 女
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">选项</label>
                <div class="col-md-6">
                    <ul class="list-group" id="options">
                        <li class="list-group-item" style="cursor: pointer" id="addOptions">
                            <strong>+</strong> 添加选项
                        </li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                {{csrf_field()}}
                <button type="reset" class="btn btn-default" style="float:right;width: 80px">重置</button>
                <button type="submit" class="btn btn-default" style="float:right;width: 80px">添加</button>
            </div>

        </form>
    </div>
@endsection
@section('script')

    <script type="text/javascript">
        var items = '';
        @foreach($items as $item)
            items += '<option value={{$item->id}}>{{$item->name}}</option>';
        @endforeach

        document.getElementById("addOptions").addEventListener("click", function (ev) {
            addItem();
        });

        function addItem() {
            var html = '<li class="list-group-item" style="padding: 12px 0 0 0" id="options">';
            html += '<div class="pt-3">选项:</div>';
            html += '<input type="text" class="form-control" name="options[]">';
            html += '<div class="pt-3">推荐项目:</div>';
            html += '<select  class="form-control"  name="option_items[]">';
            html += items;
            html += '</select>';
            html += '</li>';
            $("#options").append(html);
        }
    </script>
@endsection
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
            <h2 class="panel-title" id="panel-title">修改题目内容</h2>
        </div>
        <form class="form-horizontal" action="{{url('/pe_questionnaire/update')}}" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">题干</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="label" value="{{$pe_questionnaires->label}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">类型</label>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox1" name="type"
                               @if ($pe_questionnaires->type=='select') checked @endif
                               value="select"> 单选
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox2" name="type"
                               @if ($pe_questionnaires->type=='m-select') checked @endif
                               value="m-select"> 多选
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">适用性别</label>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox0" name="male"
                               @if ($pe_questionnaires->male==0) checked @endif
                               value="0"> 通用
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox1" name="male"
                               @if ($pe_questionnaires->male==1) checked @endif
                               value="1"> 男
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox2" name="male"
                               @if ($pe_questionnaires->male==2) checked @endif
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
                <input type="hidden" name="id" value="{{$pe_questionnaires->id}}">
                <button type="reset" class="btn btn-default" style="float:right;width: 80px">重置</button>
                <button type="submit" class="btn btn-default" style="float:right;width: 80px">更新</button>
            </div>

        </form>
    </div>
    </div>

@endsection
@section('script')

    <script type="text/javascript">
        @foreach ($pOptions as $pO)
            var name = '{{$pO->name}}';
            var itemId = '{{$pO->item_id}}';
            addItem(name, itemId);
        @endforeach

        document.getElementById("addOptions").addEventListener("click", function (ev) {
            addItem();
        });

        function addItem(name, op) {
            var items = '';
            @foreach($items as $item)
                items += '<option value="{{$item->id}}" selected="{{$item->id==1}}">{{$item->name}}</option>';
                    @endforeach

            var html = '<li class="list-group-item" style="padding: 12px 0 0 0" id="options">';
            html += '<div class="pt-3">选项:</div>';
            html += '<input type="text" class="form-control" name="options[]" value="' + name + '">';
            html += '<div class="pt-3">推荐项目:</div>';
            html += '<select  class="form-control"  name="option_items[]">';
            html += items;
            html += '</select>';
            html += '</li>';
            $("#options").append(html);
        }
    </script>
@endsection
@extends('layout.admin')


@section('title','体检问卷后台管理系统')


@section('style')
    @parent
    <style>
        .box{
            width: 100%;
        }
        .panel{
            height: 300px;
        }
        .panel-heading{
            height: 100px;
        }
        .panel-title{
            font-size: 30px;
            padding-top: 25px;
            padding-left: 20px;
        }


    </style>

@endsection


@section('content')
        <table class="box">
            <tr>
                <td>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">体检问卷</h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                暂无相关信息!
                            </p>
                            <div style="float: right">
                                <a href="/pe_package/index">
                                    <button class="btn btn-info">点我跳转问卷列表！</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">体检项目</h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                暂无相关信息!
                            </p>
                            <div style="float: right">
                                <a href="/pe_items/index">
                                    <button class="btn btn-danger">点我跳转项目列表！</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">体检套餐</h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                暂无相关信息!
                            </p>
                            <div style="float: right">
                                <a href="/pe_package/index">
                                    <button class="btn btn-success">点我跳转套餐列表！</button>
                                </a>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
@endsection


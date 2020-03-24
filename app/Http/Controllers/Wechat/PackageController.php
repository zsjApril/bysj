<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pe_package;

class PackageController extends Controller
{
    //套餐的列表显示
    public function index(){

        //查询数据
        $pe_package = Pe_package::get();

        //展示视图
        return view('wechat.pe_package',compact('pe_package'));

    }
}

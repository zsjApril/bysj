<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pe_item;

class ItemController extends Controller
{
    //
    public function index(){
        //查询数据
        $pe_item = Pe_item::get();

        //展示视图
        return view('wechat.pe_item',compact('pe_item'));

    }
}

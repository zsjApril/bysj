<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pe_questionnaire;

class QuesController extends Controller
{
    //
    public function single_index(){
        return view('pe_questionnaire.single_index');

//        //检索框的条件
//        $keyword = $request->input('keyword');
//        //检测关键字是否为空
//        if(empty($keyword)){
//            //数据的分页显示
//            //数据读取
//            $pe_ques = Pe_questionnaire::orderBy('id','desc')->paginate(10);
//        }else{
//            $pe_ques = Pe_questionnaire::orderBy('id','desc')
//                ->where('name','like','%'.$keyword.'%')
//                ->paginate(10);
//        }

        //分配变量解析模板   pe_packages=>$pe_package 将参数分配进去
//        return view('pe_questionnaire.q_index',['pe_questionnaires'=>$pe_ques,'request'=>$request]);

    }

    public function multiple_index(){
        return view('pe_questionnaire.multiple_index');
    }
}

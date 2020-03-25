<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pe_questionnaire;

class QuesController extends Controller
{
    //
    public function index(Request $request){
        //检索框的条件
        $keyword = $request->input('keyword');
        //检测关键字是否为空
        if(empty($keyword)){
            //数据的分页显示
            //数据读取
            $pe_ques = Pe_questionnaire::orderBy('id','desc')->paginate(10);
        }else{
            $pe_ques = Pe_questionnaire::orderBy('id','desc')
                ->where('label','like','%'.$keyword.'%')
                ->paginate(10);
        }

//        分配变量解析模板   pe_packages=>$pe_package 将参数分配进去
        return view('pe_questionnaire.index',['pe_questionnaires'=>$pe_ques,'request'=>$request]);

    }

    public function delete($id){
        //  读取信息
        $pe_ques = Pe_questionnaire::findOrFail($id);

        //删除
        if($pe_ques -> delete()){
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }

    public function edit($id){
        //  读取信息
        $pe_ques = Pe_questionnaire::findOrFail($id);

        //展现用户信息
        return view('pe_questionnaire.edit',['pe_questionnaires'=>$pe_ques]);
    }

    public function update(Request $request){
        //  读取信息
        $pe_ques = Pe_questionnaire::findOrFail($request->input('id'));
        $pe_ques -> label = $request->input('label');
        $pe_ques -> type = $request->input('type');
        $pe_ques -> male = $request->input('male');
        if($pe_ques->save()){
            return redirect('/pe_questionnaire/index')->with('info','更新成功!');
        }else{
            return back()->with('info','更新失败!');
        }

    }

    public function add(){

        return view('pe_questionnaire.add');
    }
    public function insert(Request $request)
    {

        //表单验证
        $this->validate($request, [
            'label' => 'required',
            'type' => 'required',
            'male' => 'required',
        ], [
            'label.required' => '题干不能为空!',
            'type.required' => '题目类型不能为空！',
            'male.required' => '适用性别不能为空!',
        ]);

        //数据插入
        $pe_ques = new Pe_questionnaire;
        $pe_ques -> label = $request->input('label');
        $pe_ques -> type = $request->input('type');
        $pe_ques -> male = $request->input('male');

        //执行插入
        if ($pe_ques->save()) {
            return redirect('/pe_questionnaire/index')->with('info', '添加成功!');
        } else {
            return back()->with('info', '添加失败!');
        }
    }
}

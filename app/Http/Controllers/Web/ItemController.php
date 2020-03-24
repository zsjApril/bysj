<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pe_item;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    //项目的列表显示
    public function index(Request $request){

        //检索框的条件
        $keyword = $request->input('keyword');
        //检测关键字是否为空
        if(empty($keyword)){
            //数据的分页显示
            //数据读取
            $pe_items = Pe_item::orderBy('id','desc')->paginate(8);
        }else{
            $pe_items = Pe_item::orderBy('id','desc')
                ->where('name','like','%'.$keyword.'%')
                ->paginate(8);
        }

        //分配变量解析模板   pe_packages=>$pe_package 将参数分配进去
        return view('pe_items.i_index',['pe_items'=>$pe_items,'request'=>$request]);

    }


    public function delete($id){
        //  读取信息
        $pe_items = Pe_item::findOrFail($id);

        //删除
        if($pe_items -> delete()){
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }

    public function edit($id){
        //  读取信息
        $pe_items = Pe_item::findOrFail($id);

        //展现用户信息
        return view('pe_items.i_edit',['pe_items'=>$pe_items]);
    }

    public function update(Request $request){
        //  读取信息
        $pe_items = Pe_item::findOrFail($request->input('id'));
        $pe_items -> name = $request->input('name');
        $pe_items -> content = $request->input('content');
        $pe_items -> price = $request->input('price');
        if($pe_items->save()){
            return redirect('/pe_items/index')->with('info','更新成功!');
        }else{
            return back()->with('info','更新失败!');
        }

    }

    public function add(){

        return view('pe_items.i_add');
    }
    public function insert(Request $request)
    {

        //表单验证
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required',
            'price' => 'required',
        ], [
            'name.required' => '项目名称不能为空!',
            'content.required' => '内容不能省略!(无内容则填“无”)',
            'price.required' => '项目价格不能为空!',
        ]);

        //数据插入
        $pe_items = new Pe_item;
        $pe_items -> name = $request->input('name');
        $pe_items -> content = $request->input('content');
        $pe_items -> price = $request->input('price');

        //执行插入
        if ($pe_items->save()) {
            return redirect('/pe_items/index')->with('info', '添加成功!');
        } else {
            return back()->with('info', '添加失败!');
        }
    }

    public function import(Request $request)
    {
        if ($request->isMethod('POST')) {
            //文件名称
            $fileCharater = $request->file('file');

            if ($fileCharater->isValid()) {

                //获取文件的扩展名
                $ext = $fileCharater->getClientOriginalExtension();

                //获取文件的绝对路径
                $path = $fileCharater->getRealPath();

                //定义文件名
                $filename = date('Y-m-d-h-i-s') . '.' . $ext;

                //存储文件,disk里面的public,就是调用disk模块里的public配置
                Storage::disk('public')->put($filename, file_get_contents($path));

                $res = [];
                Excel::load($path, function ($reader) use (&$res) {
                    $reader = $reader->getSheet(0);
                    $res = $reader->toArray();
                });
                for ($i = 1; $i < count($res); $i++) {
                    $check = Pe_item::where('name', $res[$i][0])->where('content', $res[$i][1])->where('price', $res[$i][2])->count();
                    if ($check) {
                        continue;
                    }
                    $pe_items = new Pe_item();
                    $pe_items -> name = $res[$i][0];
                    $pe_items -> content = $res[$i][1];
                    $pe_items -> price = $res[$i][2];
                    $pe_items -> save();
                }
                return redirect('/pe_items/index')->with('info', '导入成功!');
            }
        }
    }
}


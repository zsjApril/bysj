<?php

namespace App\Http\Controllers\Web;

use App\Pe_item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pe_package;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    //套餐的列表显示
    public function index(Request $request)
    {
        //检索框的条件
        $keyword = $request->input('keyword');
        //检测关键字是否为空
        if (empty($keyword)) {
            //数据的分页显示
            //数据读取
            $pe_package = Pe_package::orderBy('id', 'desc')->with(['items'])->paginate(5);
        } else {
            $pe_package = Pe_package::orderBy('id', 'desc')
                ->with(['items'])
                ->where('content', 'like', '%' . $keyword . '%')
                ->paginate(10);
        }

        //分配变量解析模板   pe_packages'=>$pe_package 将参数分配进去
        return view('pe_package.p_index', ['pe_packages' => $pe_package, 'request' => $request]);

    }

    public function delete($id)
    {
        //  读取信息
        $pe_package = Pe_package::findOrFail($id);

        //删除
        if ($pe_package->delete()) {
            return back()->with('info', '删除成功');
        } else {
            return back()->with('info', '删除失败');
        }
    }

    public function edit($id)
    {
        //  读取信息
        $pe_package = Pe_package::with(['items'])->findOrFail($id);

        $itemIds = [];
        foreach ($pe_package->items as $item) {
            array_push($itemIds, $item->id);
        }

        //这里我只拿10个，说实在的没那么多项目的啊
        //实在要做很多项目，那就去做选择器，但有点麻烦，想想还是算了
        $items = Pe_item::all()->take(10);
        //展现用户信息
        return view('pe_package.p_edit', ['pe_packages' => $pe_package, 'items' => $items, 'itemIds' => $itemIds]);
    }

    public function update(Request $request)
    {
        //  读取信息
        $pe_package = Pe_package::findOrFail($request->input('id'));
        $pe_package->name = $request->input('name');
        $pe_package->content = $request->input('content');
        $pe_package->price = $request->input('price');

        if ($pe_package->save()) {
            DB::table('package_items')->where('package_id', $pe_package->id)->delete();
            $items = $request->get('items');
            foreach ($items as $item) {
                DB::table('package_items')->insert([
                    'package_id' => $pe_package->id,
                    'item_id' => $item
                ]);
            }
            return redirect('/pe_package/index')->with('info', '更新成功!');
        } else {
            return back()->with('info', '更新失败!');
        }
    }

    public function add()
    {

        return view('pe_package.p_add');
    }

    public function insert(Request $request)
    {

        //表单验证
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required',
            'price' => 'required',
        ], [
            'name.required' => '套餐名称不能省略!',
            'content.required' => '内容不能省略!',
            'price.required' => '价格不能省略!',
        ]);

        //数据插入
        $pe_package = new Pe_package;
        $pe_package->name = $request->input('name');
        $pe_package->content = $request->input('content');
        $pe_package->price = $request->input('price');

        //执行插入
        if ($pe_package->save()) {
            return redirect('/pe_package/index')->with('info', '添加成功!');
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

                //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
                Storage::disk('public')->put($filename, file_get_contents($path));

                $res = [];
                Excel::load($path, function ($reader) use (&$res) {
                    $reader = $reader->getSheet(0);
                    $res = $reader->toArray();
                });
                for ($i = 1; $i < count($res); $i++) {
                    $check = Pe_package::where('name', $res[$i][0])->where('content', $res[$i][1])->where('price', $res[$i][2])->count();
                    if ($check) {
                        continue;
                    }
                    $pe_package = new Pe_package();
                    $pe_package->name = $res[$i][0];
                    $pe_package->content = $res[$i][1];
                    $pe_package->price = $res[$i][2];
                    $pe_package->save();
                }
                return redirect('/pe_package/index')->with('info', '导入成功!');
            }
        }
    }

}

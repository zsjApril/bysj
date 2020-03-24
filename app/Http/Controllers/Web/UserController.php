<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //管理员添加页面
    public function add(){
        return view('user.add');
    }
    //用户插入
    public function insert(Request $request){
        //表单验证
        $this->validate($request, [
            'name' => 'required|regex:/^1[345789][0-9]{9}$/',
            'email' => 'required|email',
            'password' => 'required|same:repassword',
            'repassword' => 'required'
            ],
            [
                'name.required' => '用户名不能省略!',
                'name.regex' => '手机号格式错误!',
                'email.required' => '邮箱不能省略',
                'email.email' => '邮箱格式错误!',
                'password.required' => '请输入密码!',
                'password.same' => '两次密码不一致',
                'repassword.required' => '请再次输入密码!',
            ]
        );

        //数据插入
        $user = new User;
        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user -> password = Hash::make($request->input('password'));

        //执行插入
        if($user->save()){
            return redirect('/user/index')->with('info','添加成功!');
        }else{
            return back()->with('info','添加失败!');
        }
    }


    //用户的列表显示
    public function index(Request $request){

        //检索框的条件
        $keyword = $request->input('keyword');
        //检测关键字是否为空
        if(empty($keyword)){
            //数据的分页显示
            //数据读取
            $users = User::orderBy('id','desc')->paginate(10);
        }else{
            $users = User::orderBy('id','desc')
                ->where('name','like','%'.$keyword.'%')
                ->paginate(10);
        }

        //分配变量解析模板
        return view('user.index',['users'=>$users,'request'=>$request]);

    }

    //删除管理员信息

    public function delete($id){
        //  读取用户信息
        $user = User::findOrFail($id);

        //删除
        if($user -> delete()){
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        };
    }

}



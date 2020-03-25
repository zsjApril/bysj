<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hsah;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //登陆
    public function login(){
        return view('admin.login');
    }

    public function doLogin(Request $request){

        //表单验证
        $this->validate($request, [
            'name' => 'required|regex:/^1[345789][0-9]{9}$/',
            'password' => 'required',
        ], [
            'name.required' => '请输入手机号!',
            'name.regex' => '手机号格式错误!',
            'password.required' => '请输入密码!',
        ]);
        //实例化用户对象
        //获取用户信息,firstOrFail()单条结果获取
        $user = User::where('name',$request->name)->firstOrFail();
        //验证密码
        if (Hash::check($request->password,$user->password)){
            //写入登陆状态
            session(['uid'=>$user->id]);
            return redirect('/dashboard');
        }else{
            return back()->with('info','账号或密码有误!');
        }
    }

    //登出操作
    public function logout(Request $request){
            //清掉数据
            $request->session()->flush();
            return redirect('/login');
    }
}

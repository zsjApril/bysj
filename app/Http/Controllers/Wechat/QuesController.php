<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuesController extends Controller
{
    //
    public function single(){
        return view('wechat.single');
    }

    public function multiple(){
        return view('wechat.multiple');
    }
}

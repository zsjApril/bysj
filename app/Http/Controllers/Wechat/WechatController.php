<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use EasyWeChat;


class WechatController extends Controller
{

    private $app;

    public function __construct()
    {
        $this->app = EasyWeChat::officialAccount();
    }

    public function serve()
    {
        $userApi = $this->app->user;
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');
        $app->server->push(function($message) use ($userApi) {
            return '你好' . $userApi->get($message['FromUserName'])['nickname'].',点击下方菜单开启体检问卷';
        });

        return $app->server->serve();
    }

}

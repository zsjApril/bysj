<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat;

class MenuController extends Controller
{
    //
    //    EasyWechat的SDK获取实例
    private $menu;
    public function __construct()
    {
        $app = EasyWeChat::officialAccount(); // 公众号
//        $app = app('wechat.official_account');
        $this->menu = $app->menu;
    }

    public function create()
    {
        $buttons = [
            [
                "type" => "view",
                "name" => "体检问卷",
                "url" => env('WECHAT_MENU_URL', 'http://localhost') . 'pe_questionnaire'
//              "url" => "http://q25azy.natappfree.cc/api/wechat/pe_questionnaire"
            ],
//            [
//                "type" => "view",
//                "name" => "体检套餐",
//                "url" => env('WECHAT_MENU_URL', 'http://localhost') . 'pe_package'
//            ],
            [
                "name"       => "体检相关",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "体检套餐",
                        "url"  => env('WECHAT_MENU_URL', 'http://localhost') . 'pe_package'
                    ],
                    [
                        "type" => "view",
                        "name" => "体检项目",
                        "url"  => env('WECHAT_MENU_URL', 'http://localhost') . 'pe_item'
                    ],
                    ]
                ],
            [
                "type" => "view",
                "name" => "我的预约",
                "url" => env('WECHAT_MENU_URL', 'http://localhost') . 'order'
            ],
        ];
        $this->menu->create($buttons);
        return env('WECHAT_MENU_URL') . ',菜单生成成功';
    }
}

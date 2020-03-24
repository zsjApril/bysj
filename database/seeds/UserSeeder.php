<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //命令:php artisan db:seed
//        //填充user表
//        $arr = [];
//        for($i=0;$i<50;$i++){
//            $tmp = [];
//            $tmp['name'] = str_random(11);
//            $tmp['email'] = str_random(8).'@qq.com';
//            $tmp['password'] = Hash::make('123456');
//            $tmp['created_at'] = date('Y-m-d H:i:s');
//            $tmp['updated_at'] = date('Y-m-d H:i:s');
//            $arr[] = $tmp;
//        }
//        DB::table('users')->insert($arr);


//        //填充套餐表
//        //创建数组 i=准备填充的数据条数
//        $arr = [];
//        for($i=0;$i<50;$i++){
//        $tmp = [];
//        $tmp['name'] = str_random(5);
//        $tmp['content'] = str_random(20);
//        $tmp['price'] = str_random(3);
//        $arr[] = $tmp;
//        }
//        DB::table('pe_packages')->insert($arr);

        //填充项目表
//        $arr = [];
//        for($i=0;$i<50;$i++){
//        $tmp = [];
//        $tmp['name'] = str_random(10);
//        $tmp['price'] = str_random(3);
//        $arr[] = $tmp;
//        }
//        DB::table('pe_items')->insert($arr);
    }
}

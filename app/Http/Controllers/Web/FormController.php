<?php

namespace App\Http\Controllers\Web;

use App\Pe_package;
use App\Pe_questionnaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pe_item;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    //项目的列表显示
    public function index(Request $request)
    {
        // type分为；两种， select（单选），m-select（多选）
        // male包含三个数字， 0：通用， 1：男性 ， 2：女性，只有符合用户性别的问题才会显示
        // recommend_id:推荐的项目id,看最后哪个套餐包含的多就选哪个套餐

        $qs = Pe_questionnaire::with(['options'])->get();
        //组合题目
        $questions = [];
        foreach ($qs as $q) {
            $options = [];
            foreach ($q->options as $option) {
                $options[] = ['name' => $option->name, 'recommend_id' => $option->item_id];
            }

            array_push($questions, [
                'label' => $q->label,
                'type' => $q->type,
                'male' => $q->male,
                'options' => $options
            ]);
        }

        //这里应该是传入用户的性别对问题进行过滤
        $male = 1;
        $qs = [];
        foreach ($questions as $q) {
            if ($q['male'] == 0 || $q['male'] == $male) {
                array_push($qs, $q);
            }
        }
        $questions = $qs;

        return view('form.form', compact('questions'));
    }

    public function getAnswer(Request $request)
    {
        //循环获得推荐项目Id
        $recommendIds = [];
        foreach ($request->all() as $key => $answer) {
            if ($key === '_token') continue;
            if (is_array($answer)) {
                $recommendIds = array_merge($recommendIds, $answer);
            } else {
                array_push($recommendIds, $answer);
            }
        }
        //去除重复
        $recommendIds = array_unique($recommendIds);

        //获得套餐信息
        $packages = [];
        $ps = Pe_package::all();
        foreach ($ps as $p) {
            $projectIds = $p->items()->get()->pluck('id')->toArray();
            array_push($packages, [
                'name' => $p->name, 'project_ids' => $projectIds
            ]);
        }
        //最大匹配的套餐
        $maxKey = null;
        $maxCount = null;
        foreach ($packages as $key => $package) {
            //求交集数量
            $count = count(array_intersect($package['project_ids'], $recommendIds));
            $packages[$key]['count'] = $count;
            if (is_null($maxKey) || $count > $maxCount) {
                $maxKey = $key;
                $maxCount = $count;
            }
        }
        $recommend = $packages[$maxKey]['name'];

        return view('form.answer', compact('recommend', 'packages'));
    }
}


<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pe_questionnaire extends Model
{
    public function options()
    {
        return $this->hasMany(Pe_option::class, 'question_id');
    }

    public function removeOptions()
    {
        DB::table('pe_option')->where('question_id', $this->id)->delete();
    }

    public function addOptions($options, $option_items)
    {
        $items = [];
        foreach ($options as $key => $option) {
            array_push($items, [
                'question_id' => $this->id,
                'name' => $option,
                'item_id' => $option_items[$key],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        DB::table('pe_option')->insert($items);
    }
}

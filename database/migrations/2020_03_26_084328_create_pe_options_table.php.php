<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pe_option', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('question_id')->comment('关联问题');
            $table->string('name')->comment('答案选项');
            $table->string('item_id')->comment('推荐项目');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

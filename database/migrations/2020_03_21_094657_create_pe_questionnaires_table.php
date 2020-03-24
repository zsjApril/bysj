<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pe_questionnaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question')->comment('题目');
            $table->string('content')->comment('其他描述');
            $table->boolean('choose')->comment('选项');
            $table->string('type')->comment('对应套餐类型');
            $table->string('distinct')->comment('判断某个套餐的标志');
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
        Schema::dropIfExists('pe_questionnaires');
    }
}

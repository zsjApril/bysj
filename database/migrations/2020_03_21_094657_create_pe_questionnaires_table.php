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
            $table->string('label')->comment('题干');
            $table->string('type')->comment('单选或多选');
            $table->string('male')->comment('判断适用性别');
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

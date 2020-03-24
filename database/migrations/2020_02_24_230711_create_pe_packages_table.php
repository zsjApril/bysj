<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pe_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('套餐名称');
            $table->text('content')->comment('套餐内容');
            $table->string('price')->comment('套餐价格');
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
        Schema::dropIfExists('pe_packages');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemiFinishedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semi_finisheds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned();
            $table->foreignId('brand_id')->unsigned();
            $table->foreignId('brand_type_id')->unsigned();
            $table->foreignId('brand_size_id')->unsigned();
            $table->string('date')->nullable();
            $table->string('oven_date')->nullable();
            $table->string('total')->nullable();
            $table->string('stock_left')->nullable();
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
        Schema::dropIfExists('semi_finisheds');
    }
}

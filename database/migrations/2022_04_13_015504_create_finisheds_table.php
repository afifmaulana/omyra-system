<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinishedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finisheds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->unsigned();
            $table->foreignId('brand_type_id')->unsigned();
            $table->foreignId('brand_size_id')->unsigned();
            $table->string('date')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('finisheds');
    }
}

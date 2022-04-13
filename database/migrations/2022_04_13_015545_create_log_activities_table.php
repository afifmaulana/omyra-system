<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->unsigned();
            $table->foreignId('brand_type_id')->unsigned();
            $table->foreignId('brand_size_id')->unsigned();
            $table->foreignId('stock_id')->unsigned();
            $table->foreignId('semi_finished_size_id')->unsigned();
            $table->foreignId('finished_id')->unsigned();
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
        Schema::dropIfExists('log_activities');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('building_name')->index();
            $table->float('price')->unsigned();
            $table->float('full_price')->unsigned();
            $table->float('site_area')->unsigned();
            $table->float('building_area')->unsigned();
            $table->string('architecture');
            $table->string('prefecture');
            $table->string('city');
            $table->string('address');
            $table->string('station');
            $table->integer('on_foot')->unsigned();
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
        Schema::dropIfExists('properties');
    }
}

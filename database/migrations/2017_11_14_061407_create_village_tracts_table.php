<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageTractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_tracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('township_id')->unsigned();
            $table->foreign('township_id')->references('id')->on('townships')->onDelete('cascade');
            $table->string('village_name');
            $table->string('village_code');
            $table->string('description');
            $table->string('latitude')->default(0);
            $table->string('longitude')->default(0);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('village_tracts');
    }
}

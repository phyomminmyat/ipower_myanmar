<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNricTownshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nric_townships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nric_code_id')->unsigned();
            $table->foreign('nric_code_id')->references('id')->on('nric_codes')->onDelete('cascade');
            $table->string('township');
            $table->string('short_name');
            $table->string('serial_no');
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
        Schema::dropIfExists('nric_townships');
    }
}

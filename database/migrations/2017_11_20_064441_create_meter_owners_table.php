<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeterOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->date('dob');
            $table->string('contact_no');
            $table->string('fax_no');
            $table->integer('nric_code')->unsigned();
            $table->integer('nric_township')->unsigned();
            $table->foreign('nric_township')->references('id')->on('nric_townships')->onDelete('cascade');
            $table->string('gender');
            $table->string('martial_status');
            $table->string('nationality');
            $table->text('address');
            $table->string('position');
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
        Schema::dropIfExists('meter_owners');
    }
}

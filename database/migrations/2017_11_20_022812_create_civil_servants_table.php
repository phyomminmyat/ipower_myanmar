<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCivilServantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civil_servants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->date('dob');
            $table->string('contact_no');
            $table->string('fax_no');
            $table->integer('nric_code')->unsigned();
            $table->string('gender');
            $table->string('martial_status');
            $table->string('nationality');
            $table->text('address');
            $table->string('position');
            $table->tinyInteger('status')->default(1)->unsigned();
            $table->softDeletes();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();

            // id,department_id,name,email,password,dob,contact_no,fax_no,nric_code,gender,martial_status(single, married, separated, divorced,widowed, single parent), nationality, address, position, deleted, created_by,updated_by,created_at,updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('civil_servants');
    }
}

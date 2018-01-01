<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('department_id')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->date('dob')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('fax_no')->nullable();
            $table->integer('nric_code')->nullable();
            $table->string('gender')->nullable();
            $table->string('martial_status')->nullable();
            $table->string('nationality')->nullable();
            $table->text('address')->nullable();
            $table->string('position')->nullable();
            $table->tinyInteger('is_meter_owner')->default(0)->unsigned();
            $table->tinyInteger('is_civil_servant')->default(0)->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

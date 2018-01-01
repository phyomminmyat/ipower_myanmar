<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('meter_owners')->onDelete('cascade');
            $table->string('meter_no');
            $table->string('qrcode')->unique();
            $table->string('meter_type');
            $table->date('register_date');
            $table->string('status');
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->integer('township_id')->unsigned();
            $table->foreign('township_id')->references('id')->on('townships')->onDelete('cascade');
            $table->integer('village_tract_id')->unsigned();
            $table->foreign('village_tract_id')->references('id')->on('village_tracts')->onDelete('cascade');
            $table->integer('community_id')->unsigned();
            $table->foreign('community_id')->references('id')->on('communities')->onDelete('cascade');
            $table->integer('street_id')->unsigned();
            $table->foreign('street_id')->references('id')->on('streets')->onDelete('cascade');
            $table->text('address');
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }


// Meters

// id,owner_id,meter_no,qrcode,meter_type(Resident,sme,factory, individual, office,ngo, school, goverment,public hospital, private hospital),register_date,status(in-operation,offline,reminder),region_id,district_id,township_id,village_tract_id, community_id,street, address, deleted, created_by,updated_by,created_at,updated_at

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meters');
    }
}

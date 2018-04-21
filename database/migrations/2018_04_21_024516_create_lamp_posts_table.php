<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLampPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamp_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('street_id')->unsigned();
            $table->foreign('street_id')->references('id')->on('streets')->onDelete('cascade');
            $table->string('lamp_post_name');
            $table->string('latitude')->default(0);
            $table->string('longitude')->default(0);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
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
        Schema::dropIfExists('lamp_posts');
    }
}

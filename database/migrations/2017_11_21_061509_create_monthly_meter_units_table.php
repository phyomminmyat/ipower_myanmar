<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyMeterUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_meter_units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meter_id')->unsigned();
            $table->foreign('meter_id')->references('id')->on('meters')->onDelete('cascade');
            $table->date('read_date');
            $table->integer('prev_unit');
            $table->integer('reading_unit');
            $table->integer('usage_unit');
            $table->integer('total_amount');
            $table->integer('payable_amount');
            $table->integer('received_amount');
            $table->integer('penalty_amount');
            $table->integer('tax_amount');
            $table->integer('tax_percentage');
            $table->integer('service_percentage');
            $table->integer('service_amount');
            $table->text('remarks');
            $table->softDeletes();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();
        });

        // Id,meter_id,read_date,prev_unit,reading_unit, usage_unit, total_amount, payable_amount, received_amount, penalty_amount, tax_amount, tax_percentage, service_percentage, service_amount, remarks,
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_meter_units');
    }
}

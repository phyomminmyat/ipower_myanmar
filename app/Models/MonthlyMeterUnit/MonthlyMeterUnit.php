<?php

namespace App\Models\MonthlyMeterUnit;

use Illuminate\Database\Eloquent\Model;
use App\Models\MonthlyMeterUnit\Traits\Attribute\MonthlyMeterUnitAttribute;
use App\Models\MonthlyMeterUnit\Traits\Relationship\MonthlyMeterUnitRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthlyMeterUnit extends Model
{
	use MonthlyMeterUnitAttribute,MonthlyMeterUnitRelationship,SoftDeletes;
	
    protected $table = 'monthly_meter_units';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['meter_id','read_date','prev_unit','reading_unit','usage_unit','total_amount','payable_amount','received_amount','penalty_amount','tax_amount','tax_percentage','service_percentage','service_amount','remarks', 'created_by', 'updated_by'];
}

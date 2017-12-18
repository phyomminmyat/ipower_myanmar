<?php

namespace App\Models\UnitRate;

use Illuminate\Database\Eloquent\Model;
use App\Models\UnitRate\Traits\Attribute\UnitRateAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitRate extends Model
{
	use UnitRateAttribute, SoftDeletes;

    protected $table = 'unit_rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['meter_type', 'unit_price', 'created_by', 'updated_by'];
}

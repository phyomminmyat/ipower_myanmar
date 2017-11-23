<?php

namespace App\Models\NricTownship;

use Illuminate\Database\Eloquent\Model;
use App\Models\NricTownship\Traits\Attribute\NricTownshipAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class NricTownship extends Model
{
	use NricTownshipAttribute,SoftDeletes;
    protected $table = 'nric_townships';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nric_code_id', 'township','short_name', 'serial_no', 'created_by', 'updated_by'];
}

<?php

namespace App\Models\Meter;

use Illuminate\Database\Eloquent\Model;
use App\Models\Meter\Traits\Attribute\MeterAttribute;
use App\Models\Meter\Traits\Relationship\MeterRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meter extends Model
{
	use MeterAttribute,MeterRelationship,SoftDeletes;
	
    protected $table = 'meters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'region_id','township_id','district_id','village_tract_id','community_id', 'department_name','department_code', 'description', 'created_by', 'updated_by'];
}

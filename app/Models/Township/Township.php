<?php

namespace App\Models\Township;

use Illuminate\Database\Eloquent\Model;
use App\Models\Township\Traits\Attribute\TownshipAttribute;
use App\Models\Township\Traits\Relationship\TownshipRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Township extends Model
{
	use TownshipAttribute,TownshipRelationship,SoftDeletes;
	
    protected $table = 'townships';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['district_id', 'township_name','township_code', 'description', 'created_by', 'updated_by'];
}

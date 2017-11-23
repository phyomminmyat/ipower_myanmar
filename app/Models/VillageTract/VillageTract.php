<?php

namespace App\Models\VillageTract;

use Illuminate\Database\Eloquent\Model;
use App\Models\VillageTract\Traits\Attribute\VillageTractAttribute;
use App\Models\VillageTract\Traits\Relationship\VillageTractRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class VillageTract extends Model
{
	use VillageTractAttribute, VillageTractRelationship, SoftDeletes;
	
    protected $table = 'village_tracts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['township_id', 'village_name','village_code', 'description', 'created_by', 'updated_by'];
}

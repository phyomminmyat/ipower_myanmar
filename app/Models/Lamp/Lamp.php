<?php

namespace App\Models\Lamp;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lamp\Traits\Attribute\LampAttribute;
use App\Models\Lamp\Traits\Relationship\LampRelationship;

class Lamp extends Model
{
	use LampAttribute,LampRelationship;
	
    protected $table = 'lamp_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['street_id', 'lamp_post_name','latitude', 'longitude', 'created_by', 'updated_by'];
}
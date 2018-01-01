<?php

namespace App\Models\Street;

use Illuminate\Database\Eloquent\Model;
use App\Models\Street\Traits\Attribute\StreetAttribute;
use App\Models\Street\Traits\Relationship\StreetRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Street extends Model
{
	use StreetAttribute,StreetRelationship, SoftDeletes;
	
    protected $table = 'streets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['community_id', 'street_name','street_code', 'description', 'created_by', 'updated_by'];
}
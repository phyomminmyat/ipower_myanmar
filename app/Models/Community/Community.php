<?php

namespace App\Models\Community;

use Illuminate\Database\Eloquent\Model;
use App\Models\Community\Traits\Attribute\CommunityAttribute;
use App\Models\Community\Traits\Relationship\CommunityRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Community extends Model
{
	use CommunityAttribute,CommunityRelationship, SoftDeletes;
	
    protected $table = 'communities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['village_tract_id', 'community_name','community_code', 'description', 'created_by', 'updated_by'];
}
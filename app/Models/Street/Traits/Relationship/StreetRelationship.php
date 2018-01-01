<?php

namespace App\Models\Street\Traits\Relationship;
use App\Models\Community\Community;

/**
 * Class StreetRelationship.
 */
trait StreetRelationship
{
    /**
     * @return mixed
     */
    public function community()
    {
        return $this->belongsTo(Community::class,'community_id');
    }
}

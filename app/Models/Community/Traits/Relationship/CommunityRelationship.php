<?php

namespace App\Models\Community\Traits\Relationship;
use App\Models\VillageTract\VillageTract;

/**
 * Class CommunityRelationship.
 */
trait CommunityRelationship
{
    /**
     * @return mixed
     */
    public function village()
    {
        return $this->belongsTo(VillageTract::class,'village_tract_id');
    }
}

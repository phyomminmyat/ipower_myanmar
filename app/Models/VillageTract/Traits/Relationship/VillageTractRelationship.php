<?php

namespace App\Models\VillageTract\Traits\Relationship;
use App\Models\Township\Township;

/**
 * Class VillageTractRelationship.
 */
trait VillageTractRelationship
{
    /**
     * @return mixed
     */
    public function township()
    {
        return $this->belongsTo(Township::class,'township_id');
    }

}

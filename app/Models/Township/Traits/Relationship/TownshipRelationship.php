<?php

namespace App\Models\Township\Traits\Relationship;
use App\Models\District\District;

/**
 * Class TownshipRelationship.
 */
trait TownshipRelationship
{
    /**
     * @return mixed
     */
    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
}

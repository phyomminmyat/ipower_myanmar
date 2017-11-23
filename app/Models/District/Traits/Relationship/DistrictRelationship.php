<?php

namespace App\Models\District\Traits\Relationship;
use App\Models\Township\Township;
use App\Models\Region\Region;

/**
 * Class DistrictRelationship.
 */
trait DistrictRelationship
{
    /**
     * @return mixed
     */
    public function township()
    {
        return $this->hasMany(Township::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}

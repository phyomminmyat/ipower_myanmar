<?php

namespace App\Models\Lamp\Traits\Relationship;
use App\Models\Street\Street;

/**
 * Class LampRelationship.
 */
trait LampRelationship
{
    /**
     * @return mixed
     */
    public function street()
    {
        return $this->belongsTo(Street::class,'street_id');
    }
}

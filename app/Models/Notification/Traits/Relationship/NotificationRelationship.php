<?php

namespace App\Models\Notification\Traits\Relationship;
use App\Models\Street\Street;

/**
 * Class NotificationRelationship.
 */
trait NotificationRelationship
{
    /**
     * @return mixed
     */
    public function street()
    {
        return $this->belongsTo(Street::class,'street_id');
    }
}
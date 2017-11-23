<?php

namespace App\Models\MeterOwner\Traits\Relationship;
use App\Models\NricTownship\NricTownship;
use App\Models\NricCode\NricCode;

/**
 * Class MeterOwnerRelationship.
 */
trait MeterOwnerRelationship
{
    /**
     * @return mixed
     */
    public function nric_townships()
    {
        return $this->belongsTo(NricTownship::class,'nric_township');
    }

    public function nric_codes()
    {
        return $this->belongsTo(NricCode::class,'nric_code');
    }

}

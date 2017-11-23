<?php

namespace App\Models\CivilServant\Traits\Relationship;
use App\Models\Department\Department;
use App\Models\NricCode\NricCode;

/**
 * Class CivilServantRelationship.
 */
trait CivilServantRelationship
{
    /**
     * @return mixed
     */
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function nric_codes()
    {
        return $this->belongsTo(NricCode::class,'nric_code');
    }
}

<?php

namespace App\Models\Access\User\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Department\Department;
use App\Models\NricCode\NricCode;
use App\Models\NricTownship\NricTownship;
use App\Models\Access\User\SocialLogin;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('access.role'), config('access.role_user_table'), 'user_id', 'role_id');
    }

    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialLogin::class);
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function nric_codes()
    {
        return $this->belongsTo(NricCode::class,'nric_code');
    }

    public function nric_townships()
    {
        return $this->belongsTo(NricTownship::class,'nric_township');
    }
}

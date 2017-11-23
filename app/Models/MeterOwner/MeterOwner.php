<?php

namespace App\Models\MeterOwner;

use Illuminate\Database\Eloquent\Model;
use App\Models\MeterOwner\Traits\Attribute\MeterOwnerAttribute;
use App\Models\MeterOwner\Traits\Relationship\MeterOwnerRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeterOwner extends Model
{
	use MeterOwnerAttribute,MeterOwnerRelationship, SoftDeletes;
	
    protected $table = 'meter_owners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nric_code_id', 'name','email','dob','contact_no','fax_no','nric_code','gender','martial_status','address', 'position', 'created_by', 'updated_by'];

}

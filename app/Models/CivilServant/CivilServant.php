<?php

namespace App\Models\CivilServant;

use Illuminate\Database\Eloquent\Model;
use App\Models\CivilServant\Traits\Attribute\CivilServantAttribute;
use App\Models\CivilServant\Traits\Relationship\CivilServantRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class CivilServant extends Model
{
	use CivilServantAttribute,CivilServantRelationship,SoftDeletes;
	
    protected $table = 'civil_servants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['department_id', 'name','email','dob','contact_no','fax_no','nric_code','gender','martial_status','address', 'position', 'created_by', 'updated_by'];

}

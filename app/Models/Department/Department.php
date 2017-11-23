<?php

namespace App\Models\Department;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department\Traits\Attribute\DepartmentAttribute;
use App\Models\Department\Traits\Relationship\DepartmentRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
	use DepartmentAttribute,DepartmentRelationship, SoftDeletes;
	
    protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'region_id','township_id','district_id','village_tract_id','community_id', 'department_name','department_code', 'description', 'created_by', 'updated_by'];
}

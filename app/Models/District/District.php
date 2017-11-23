<?php

namespace App\Models\District;

use Illuminate\Database\Eloquent\Model;
use App\Models\District\Traits\Attribute\DistrictAttribute;
use App\Models\District\Traits\Relationship\DistrictRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use DistrictAttribute, DistrictRelationship, SoftDeletes;

    protected  $table = 'districts';

    protected $fillable = ['district_name', 'district_code','description', 'created_by', 'updated_by'];

}

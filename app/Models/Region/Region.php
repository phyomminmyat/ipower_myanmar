<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Model;
use App\Models\Region\Traits\Attribute\RegionAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;


class Region extends Model
{
    use RegionAttribute, SoftDeletes;

    protected  $table = 'regions';

    protected $fillable = ['region_name', 'region_code','description', 'created_by', 'updated_by'];

}

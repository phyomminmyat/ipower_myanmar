<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Model;
use App\Models\Report\Traits\Attribute\ReportAttribute;
use App\Models\Report\Traits\Relationship\ReportRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
	use ReportAttribute,ReportRelationship, SoftDeletes;
	
    protected $table = 'reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['report_type_id', 'report_name','datetime', 'description', 'created_by', 'updated_by'];
}
<?php

namespace App\Models\ReportType;

use Illuminate\Database\Eloquent\Model;
use App\Models\ReportType\Traits\Attribute\ReportTypeAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportType extends Model
{
	use ReportTypeAttribute, SoftDeletes;

    protected $table = 'report_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type_name', 'description', 'created_by', 'updated_by'];
}

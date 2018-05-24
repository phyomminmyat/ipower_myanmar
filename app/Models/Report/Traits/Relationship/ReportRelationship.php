<?php

namespace App\Models\Report\Traits\Relationship;
use App\Models\ReportType\ReportType;

/**
 * Class ReportRelationship.
 */
trait ReportRelationship
{
    /**
     * @return mixed
     */
    public function report_type()
    {
        return $this->belongsTo(ReportType::class,'report_type_id');
    }
}

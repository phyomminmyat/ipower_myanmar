<?php

namespace App\Models\Transformer\Traits\Relationship;
use App\Models\Street\Street;

/**
 * Class TransformerRelationship.
 */
trait TransformerRelationship
{
    /**
     * @return mixed
     */
    public function street()
    {
        return $this->belongsTo(Street::class,'street_id');
    }
}

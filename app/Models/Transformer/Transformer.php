<?php

namespace App\Models\Transformer;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transformer\Traits\Attribute\TransformerAttribute;
use App\Models\Transformer\Traits\Relationship\TransformerRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transformer extends Model
{
	use TransformerAttribute,TransformerRelationship, SoftDeletes;
	
    protected $table = 'transformers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['street_id', 'transformer_name','qrcode','latitude','longtitude', 'created_by', 'updated_by'];
}
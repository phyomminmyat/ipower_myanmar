<?php

namespace App\Models\NricCode;

use Illuminate\Database\Eloquent\Model;
use App\Models\NricCode\Traits\Attribute\NricCodeAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class NricCode extends Model
{
	use NricCodeAttribute, SoftDeletes;
    protected $table = 'nric_codes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nric_code', 'description', 'created_by', 'updated_by'];
}

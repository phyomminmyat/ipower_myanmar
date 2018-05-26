<?php

namespace App\Models\Record;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'records';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['imei_no', 'locations_id'];
}
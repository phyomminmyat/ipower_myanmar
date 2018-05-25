<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Model;
use App\Models\Notification\Traits\Attribute\NotificationAttribute;
use App\Models\Notification\Traits\Relationship\NotificationRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
	use NotificationAttribute,NotificationRelationship, SoftDeletes;
	
    protected $table = 'notifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['street_id', 'name', 'description', 'created_by', 'updated_by'];
}
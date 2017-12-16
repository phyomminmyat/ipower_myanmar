<?php

namespace App\Models\MeterOwner\Traits\Attribute;

/**
 * Class MeterOwnerAttribute.
 */
trait MeterOwnerAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.meter_owner.edit', $this).'" class="btn btn-default btn-sm btn-icon icon-left">  <i class="entypo-pencil"></i>Edit </a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        //Can't delete master admin role
        return '<a href="'.route('admin.meter_owner.destroy_meter_owner', $this).'" name="delete_perm"
                        class="delete btn btn-danger btn-sm btn-icon icon-left">
                            <i class="entypo-cancel"></i>'.trans('buttons.general.crud.delete').'</a>'; 
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->edit_button.$this->delete_button;
    }
}

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
        return '<a href="'.route('admin.meter_owner.edit', $this).'" class="btn btn-default btn-sm icon-left entypo-pencil tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.trans('buttons.general.crud.edit').'"></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.meter_owner.destroy_meter_owner', $this).'" name="delete_perm" class="btn btn-danger btn-sm icon-left entypo-cancel tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.trans('buttons.general.crud.delete').'"></a>';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->edit_button.$this->delete_button;
    }
}

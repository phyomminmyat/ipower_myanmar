<?php

namespace App\Models\UnitRate\Traits\Attribute;

/**
 * Class UnitRateAttribute.
 */
trait UnitRateAttribute
{

    /**
     * @return string
    */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.unit_rate.edit', $this).'" class="btn btn-default btn-sm icon-left entypo-pencil tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.trans('buttons.general.crud.edit').'"></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        //Can't delete master admin role
        return '<a href="'.route('admin.unit_rate.destroy_unit_rate', $this).'" name="delete_perm" class="btn btn-danger btn-sm icon-left entypo-cancel tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.trans('buttons.general.crud.delete').'"></a>';
    }


    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->edit_button.$this->delete_button;
    }
}
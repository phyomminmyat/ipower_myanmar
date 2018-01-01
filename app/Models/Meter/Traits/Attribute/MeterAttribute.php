<?php

namespace App\Models\Meter\Traits\Attribute;

/**
 * Class MeterAttribute.
 */
trait MeterAttribute
{

    /**
     * @return string
    */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.meter.edit', $this).'" class="btn btn-default btn-sm icon-left entypo-pencil tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.trans('buttons.general.crud.edit').'"></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        //Can't delete master admin role
        return '<a href="'.route('admin.meter.destroy_meter', $this).'" name="delete_perm" class="btn btn-danger btn-sm icon-left entypo-cancel tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.trans('buttons.general.crud.delete').'"></a>';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.meter.restore', $this).'" name="restore_meter" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.meter.restore_meter').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.meter.delete-permanently', $this).'" name="delete_meter_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.meter.delete_permanently').'"></i></a> ';
    }


    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return $this->restore_button.$this->delete_permanently_button;
        }
        return $this->edit_button.$this->delete_button;
    }
}

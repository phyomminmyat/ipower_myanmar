<?php

namespace App\Models\Access\Role\Traits\Attribute;

/**
 * Class RoleAttribute.
 */
trait RoleAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.access.role.edit', $this).'" class="btn btn-default btn-sm icon-left entypo-pencil tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.trans('buttons.general.crud.edit').'"></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        //Can't delete master admin role
        if ($this->id != 1) {
            return '<a href="'.route('admin.access.role.destroy_role', $this).'" name="delete_perm" class="btn btn-danger btn-sm entypo-cancel icon-left tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.trans('buttons.general.crud.delete').'"></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->edit_button.$this->delete_button;
    }
}

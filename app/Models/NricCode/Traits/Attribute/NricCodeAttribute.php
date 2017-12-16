<?php

namespace App\Models\NricCode\Traits\Attribute;

/**
 * Class RoleAttribute.
 */
trait NricCodeAttribute
{

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.nric_codes.edit', $this).'" class="btn btn-default btn-sm btn-icon icon-left">  <i class="entypo-pencil"></i>Edit </a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        //Can't delete master admin role
        return  '<a href="'.route('admin.nric_codes.destroy_nric_code', $this).'" name="delete_perm"
                        class="btn btn-danger btn-sm btn-icon icon-left">
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

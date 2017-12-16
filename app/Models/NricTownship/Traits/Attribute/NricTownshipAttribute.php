<?php

namespace App\Models\NricTownship\Traits\Attribute;

/**
 * Class RoleAttribute.
 */
trait NricTownshipAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
         return '<a href="'.route('admin.nric_township.edit', $this).'" class="btn btn-default btn-sm btn-icon icon-left">  <i class="entypo-pencil"></i>Edit </a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        //Can't delete master admin role
        return  '<a href="'.route('admin.nric_township.destroy_nric_township', $this).'" name="delete_perm" 
                        class="btn btn-danger btn-sm btn-icon icon-left">
                            <i class="entypo-cancel"></i>Delete</a>'; 
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->edit_button.$this->delete_button;
    }
}

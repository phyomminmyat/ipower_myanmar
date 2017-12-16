<?php

namespace App\Models\CivilServant\Traits\Attribute;

/**
 * Class CivilServantAttribute.
 */
trait CivilServantAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {

        return '<a href="'.route('admin.civil_servant.edit', $this).'" class="btn btn-default btn-sm btn-icon icon-left">  <i class="entypo-pencil"></i>Edit </a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        //Can't delete master admin role
        return '<a href="'.route('admin.civil_servant.destroy_civil_servant', $this).'" name="delete_perm"
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

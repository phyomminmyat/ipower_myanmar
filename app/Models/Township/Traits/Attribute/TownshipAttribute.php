<?php

namespace App\Models\Township\Traits\Attribute;

/**
 * Class TownshipAttribute.
 */
trait TownshipAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.township.edit', $this).'" class="btn btn-default btn-sm btn-icon icon-left">  <i class="entypo-pencil"></i>Edit </a>';

    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        //Can't delete master admin role
            // return '<a href="'.route('admin.township.destroy', $this).'"
            //     data-method="delete"
            //     data-trans-button-cancel="'.trans('buttons.general.cancel').'"
            //     data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
            //     data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
            //     class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'"></i></a>';
        return '<a href="'.route('admin.township.destroy', $this).'" 
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

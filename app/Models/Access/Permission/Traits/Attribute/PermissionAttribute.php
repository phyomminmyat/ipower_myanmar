<?php

namespace App\Models\Access\Permission\Traits\Attribute;

/**
 * Class PermissionAttribute
 * @package App\Models\Access\Permission\Traits\Attribute
 */
trait PermissionAttribute
{
    /**
     * @return bool
     */
    public function isSystem()
    {
        return $this->system == 1;
    }

    /**
     * @return string
     */
    public function getSystemLabelAttribute()
    {
        if ($this->isSystem())
            return '<span class="label label-danger">'. trans('labels.general.yes') .'</span>';
        return '<span class="label label-success">'. trans('labels.general.yes') .'</span>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->allow('edit-permissions')) {

            return '<a href="' . route('admin.access.permissions.edit', $this->id) . '" class="btn btn-default btn-sm icon-left entypo-pencil tooltip-primary" data-original-title="'.trans('buttons.general.crud.edit').'" data-placement="top" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (access()->allow('delete-permissions')) {
            return '<a href="' . route('admin.access.permissions.destroy', $this->id) . '" class="btn btn-xs btn-danger tooltips" data-original-title="'.trans('buttons.general.crud.delete').'" data-placement="top" data-toggle="tooltip" data-method="delete"><i class="fa fa-times"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        $buttons = '';
        $buttons .= $this->getEditButtonAttribute();

        //If the permission is not a system item it can be deleted
        if (! $this->isSystem()) {
            $buttons .= ' ' . $this->getDeleteButtonAttribute();
        }

        return $buttons;
    }
}

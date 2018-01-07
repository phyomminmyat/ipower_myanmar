<?php

namespace App\Repositories\Backend\Access\Permission;

use App\Models\Access\Permission\Permission;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Permission::class;

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($order_by = 'created_at', $sort = 'asc')
    {
        return $this->query()
            ->orderBy($order_by, $sort)
            ->select('*');
    }

    /**
     * @param array $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $permission = $this->createPermissionStub($data);
        DB::transaction(function () use ($permission, $data) {
            if ($permission->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.community.create_error'));
        });
    }

    /**
     * @param Model $permission
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $permission, array $input)
    {
        $data = $input['data'];

        $permission->name 			= $data['name'];
        $permission->display_name 	= $data['display_name'];
        $permission->description 	= $data['description'];
        $permission->system 		= isset($data['system']) ? 1 : 0;
        $permission->sort 			= $data['sort'];
        $permission->created_by 	= access()->user()->id;
        $permission->updated_by 	= access()->user()->id;

        DB::transaction(function () use ($permission, $data) {
            if ($permission->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.community.update_error'));
        });
    }

    /**
     * @param Model $permission
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $permission)
    {
        if ($permission->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.community.delete_error'));
    }

    /**
     * @param Model $user
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $user)
    {
        if (is_null($user->deleted_at)) {
            throw new GeneralException(trans('exceptions.backend.access.users.delete_first'));
        }

        DB::transaction(function () use ($user) {
            if ($user->forceDelete()) {
                event(new UserPermanentlyDeleted($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createPermissionStub($input)
    {
        $permission = self::MODEL;
        $permission = new $permission;
        $permission->name = $input['name'];
        $permission->display_name = $input['display_name'];
        $permission->description = $input['description'];
        $permission->system = isset($input['system']) ? 1 : 0;
        $permission->sort = $input['sort'];
        $permission->created_by = access()->user()->id;
        $permission->updated_by = access()->user()->id;   

        return $permission;
    }
}

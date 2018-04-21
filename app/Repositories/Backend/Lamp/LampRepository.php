<?php

namespace App\Repositories\Backend\Lamp;

use App\Models\Lamp\Lamp;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LampRepository.
 */
class LampRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Lamp::class;

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($order_by = 'created_at', $sort = 'desc')
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

        $lamp = $this->createLampStub($data);
        DB::transaction(function () use ($lamp, $data) {
            if ($lamp->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.lamp.create_error'));
        });
    }

    /**
     * @param Model $lamp
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $lamp, array $input)
    {
        $data = $input['data'];

        $lamp->street_id = $data['street_id'];
        $lamp->lamp_post_name = $data['lamp_post_name'];
        $lamp->latitude = $data['latitude'];
        $lamp->longitude = $data['longitude'];
        $lamp->created_by = access()->user()->id;
        $lamp->updated_by = access()->user()->id;

        DB::transaction(function () use ($lamp, $data) {
            if ($lamp->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.lamp.update_error'));
        });
    }

    /**
     * @param Model $lamp
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $lamp)
    {
        if ($lamp->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.lamp.delete_error'));
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
    protected function createLampStub($input)
    {
        $lamp = self::MODEL;
        $lamp = new $lamp;
        $lamp->street_id = $input['street_id'];
        $lamp->lamp_post_name = $input['lamp_post_name'];
        $lamp->latitude = $input['latitude'];
        $lamp->longitude = $input['longitude'];
        $lamp->created_by = access()->user()->id;
        $lamp->updated_by = access()->user()->id;   

        return $lamp;
    }
}

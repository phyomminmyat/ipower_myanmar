<?php

namespace App\Repositories\Backend\VillageTract;

use App\Models\VillageTract\VillageTract;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VillageTractRepository.
 */
class VillageTractRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = VillageTract::class;

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

        $village = $this->createVillageStub($data);
        DB::transaction(function () use ($village, $data) {
            if ($village->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.village.create_error'));
        });
    }

    /**
     * @param Model $village
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $village, array $input)
    {
        $data = $input['data'];

        $village->township_id = $data['township_id'];
        $village->village_name = $data['village_name'];
        $village->village_code = $data['village_code'];
        $village->description = $data['description'];
        $village->latitude    = $data['latitude'];
        $village->longitude   = $data['longitude'];
        $village->updated_by = access()->user()->id;

        DB::transaction(function () use ($village, $data) {
            if ($village->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.village.update_error'));
        });
    }

    /**
     * @param Model $village
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $village)
    {
        if ($village->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.village.delete_error'));
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
    protected function createVillageStub($input)
    {
        $village = self::MODEL;
        $village = new $village;
        $village->township_id = $input['township_id'];
        $village->village_name = $input['village_name'];
        $village->village_code = $input['village_code'];
        $village->description = $input['description'];
        $village->latitude    = $input['latitude'];
        $village->longitude   = $input['longitude'];
        $village->created_by = access()->user()->id;
        $village->updated_by = access()->user()->id;   

        return $village;
    }
}

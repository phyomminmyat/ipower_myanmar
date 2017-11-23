<?php

namespace App\Repositories\Backend\Region;

use App\Models\Region\Region;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RegionRepository.
 */
class RegionRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Region::class;

    /**
     * @param $order_by
     * @param $sort
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

        $region = $this->createRegionStub($data);

        DB::transaction(function () use ($region, $data) {
            if ($region->save()) {
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.region.create_error'));
        });
    }

    /**
     * @param Model $region
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $region, array $input)
    {
        $data = $input['data'];

        $region->region_name = $data['region_name'];
        $region->region_code = $data['region_code'];
        $region->description = $data['description'];
        $region->created_by = access()->user()->id;
        $region->updated_by = access()->user()->id;

        DB::transaction(function () use ($region, $data) {
            if ($region->save()) {

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.region.update_error'));
        });
    }

    /**
     * @param Model $region
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $region)
    {
        if ($region->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.region.delete_error'));
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
    protected function createRegionStub($input)
    {
        $region = self::MODEL;
        $region = new $region;
        $region->region_name = $input['region_name'];
        $region->region_code = $input['region_code'];
        $region->description = $input['description'];
        $region->created_by = access()->user()->id;
        $region->updated_by = access()->user()->id;   

        return $region;
    }
}

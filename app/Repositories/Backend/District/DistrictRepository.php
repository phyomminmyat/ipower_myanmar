<?php

namespace App\Repositories\Backend\District;

use App\Models\District\District;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class DistrictRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = District::class;

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

        $district = $this->createDistrictStub($data);
        DB::transaction(function () use ($district, $data) {
            if ($district->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.district.create_error'));
        });
    }

    /**
     * @param Model $district
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $district, array $input)
    {
        $data = $input['data'];

        $district->region_id = $data['region_id'];
        $district->district_name = $data['district_name'];
        $district->district_code = $data['district_code'];
        $district->description = $data['description'];
        $district->latitude    = $data['latitude'];
        $district->longitude   = $data['longitude'];
        $district->created_by = access()->user()->id;
        $district->updated_by = access()->user()->id;   

        DB::transaction(function () use ($district, $data) {
            if ($district->save()) {

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.district.update_error'));
        });
    }

    /**
     * @param Model $district
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $district)
    {
        if ($district->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.district.delete_error'));
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
    protected function createDistrictStub($input)
    {
        $district                   = self::MODEL;
        $district                   = new $district;
        $district->region_id        = $input['region_id'];
        $district->district_name    = $input['district_name'];
        $district->district_code    = $input['district_code'];
        $district->description      = $input['description'];
        $district->latitude         = $input['latitude'];
        $district->longitude        = $input['longitude'];
        $district->created_by       = access()->user()->id;
        $district->updated_by       = access()->user()->id;   

        return $district;
    }

    public function getDistrictRepoList()
    {
        $district_list = District::join('regions','regions.id','=','districts.region_id')
                        ->where('districts.deleted_at',null)
                        ->select('districts.*','regions.region_name')
                        ->get();

        return $district_list;
    }
}

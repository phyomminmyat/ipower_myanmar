<?php

namespace App\Repositories\Backend\Region;

use App\Models\Region\Region;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


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
        $region->latitude    = $data['latitude'];
        $region->longitude   = $data['longitude'];
        if (isset($data['image1'])) {
            $image1 = uniqid() .$data['image1']->getClientOriginalExtension();

            $data['image1']->move(public_path('uploads/region'), $image1);
            $region->image1 = $image1;
        }

        if (isset($data['image2'])) {
            $image2 = uniqid() .$data['image2']->getClientOriginalExtension();

            $data['image2']->move(public_path('uploads/region'), $image2);

            $region->image2 = $image2;
        }

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
        $region->latitude   = $input['latitude'];
        $region->longitude   = $input['longitude'];
        if (isset($input['image1'])) {
            $image1 = uniqid() .$input['image1']->getClientOriginalExtension();

            $input['image1']->move(public_path('uploads/region'), $image1);
            $region->image1 = $image1;
        }else $region->image1 = '';

        if (isset($input['image2'])) {
            $image2 = uniqid() .$input['image2']->getClientOriginalExtension();

            $input['image2']->move(public_path('uploads/region'), $image2);

            $region->image2 = $image2;

        }else $region->image2 = '';

        $region->created_by = access()->user()->id;
        $region->updated_by = access()->user()->id;   

        return $region;
    }
}

<?php

namespace App\Repositories\Backend\UnitRate;

use App\Models\UnitRate\UnitRate;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class UnitRateRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = UnitRate::class;

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

        $unit_rate = $this->createUnitRateStub($data);

        DB::transaction(function () use ($unit_rate, $data) {
            if ($unit_rate->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.township.create_error'));
        });
    }

    /**
     * @param Model $unit_rate
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $unit_rate, array $input)
    {
        $data = $input['data'];

        $unit_rate->meter_type = $data['meter_type'];
        $unit_rate->unit_price = $data['unit_price'];
        $unit_rate->created_by = access()->user()->id;
        $unit_rate->updated_by = access()->user()->id;

        DB::transaction(function () use ($unit_rate, $data) {
            if ($unit_rate->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.township.update_error'));
        });
    }

    /**
     * @param Model $unit_rate
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $unit_rate)
    {
        if ($unit_rate->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.township.delete_error'));
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
    protected function createUnitRateStub($input)
    {
        $unit_rate = self::MODEL;
        $unit_rate = new $unit_rate;
        $unit_rate->meter_type = $input['meter_type'];
        $unit_rate->unit_price = $input['unit_price'];
        $unit_rate->created_by = access()->user()->id;
        $unit_rate->updated_by = access()->user()->id;   

        return $unit_rate;
    }
}
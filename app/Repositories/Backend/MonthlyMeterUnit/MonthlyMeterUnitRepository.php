<?php

namespace App\Repositories\Backend\MonthlyMeterUnit;

use App\Models\MonthlyMeterUnit\MonthlyMeterUnit;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class MonthlyMeterUnitRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = MonthlyMeterUnit::class;

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

        $meter_unit = $this->createMonthlyMeterUnitStub($data);
        DB::transaction(function () use ($meter_unit, $data) {
            if ($meter_unit->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.meter_unit.create_error'));
        });
    }

    /**
     * @param Model $meter_unit
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $meter_unit, array $input)
    {
        $data = $input['data'];

        $meter_unit->meter_id           =   $data['meter_id'];
        $meter_unit->read_date          =   date('Y-m-d',strtotime($data['read_date']));
        $meter_unit->prev_unit          =   $data['prev_unit'];
        $meter_unit->reading_unit       =   $data['reading_unit'];
        $meter_unit->usage_unit         =   $data['usage_unit'];
        $meter_unit->total_amount       =   $data['total_amount'];
        $meter_unit->payable_amount     =   $data['payable_amount'];
        $meter_unit->received_amount    =   $data['received_amount'];
        $meter_unit->penalty_amount     =   $data['penalty_amount'];
        $meter_unit->tax_amount         =   $data['tax_amount'];
        $meter_unit->tax_percentage     =   $data['tax_percentage'];
        $meter_unit->service_percentage =   $data['service_percentage'];
        $meter_unit->service_amount     =   $data['service_amount'];
        $meter_unit->remarks            =   $data['remarks'];
        $meter_unit->created_by         =   access()->user()->id;
        $meter_unit->updated_by         =   access()->user()->id;

        DB::transaction(function () use ($meter_unit, $data) {
            if ($meter_unit->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.meter_unit.update_error'));
        });
    }

    /**
     * @param Model $meter_unit
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $meter_unit)
    {
        if ($meter_unit->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.meter_unit.delete_error'));
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
    protected function createMonthlyMeterUnitStub($input)
    {
        $meter_unit                     =   self::MODEL;
        $meter_unit                     =   new $meter_unit;
        $meter_unit->meter_id           =   $input['meter_id'];
        $meter_unit->read_date          =   date('Y-m-d',strtotime($input['read_date']));
        $meter_unit->prev_unit          =   $input['prev_unit'];
        $meter_unit->reading_unit       =   $input['reading_unit'];
        $meter_unit->usage_unit         =   $input['usage_unit'];
        $meter_unit->total_amount       =   $input['total_amount'];
        $meter_unit->payable_amount     =   $input['payable_amount'];
        $meter_unit->received_amount    =   $input['received_amount'];
        $meter_unit->penalty_amount     =   $input['penalty_amount'];
        $meter_unit->tax_amount         =   $input['tax_amount'];
        $meter_unit->tax_percentage     =   $input['tax_percentage'];
        $meter_unit->service_percentage =   $input['service_percentage'];
        $meter_unit->service_amount     =   $input['service_amount'];
        $meter_unit->remarks            =   $input['remarks'];
        $meter_unit->created_by         =   access()->user()->id;
        $meter_unit->updated_by         =   access()->user()->id; 

        // name,email,password,dob,contact_no,fax_no,nric_code,gender,martial_status(single, married, separated, divorced,widowed, single parent), nationality, address, position,

        return $meter_unit;
    }
}

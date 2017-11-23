<?php

namespace App\Repositories\Backend\MeterOwner;

use App\Models\MeterOwner\MeterOwner;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class MeterOwnerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = MeterOwner::class;

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($order_by = 'created_at', $sort = 'desc')
    {
        return $this->query()
            ->with('nric_townships','nric_codes')
            ->orderBy($order_by, $sort)
            ->select('*');
    }

    /**
     * @param array $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $meter_owner = $this->createMeterOwnerStub($data);
        DB::transaction(function () use ($meter_owner, $data) {
            if ($meter_owner->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.meter_owner.create_error'));
        });
    }

    /**
     * @param Model $meter_owner
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $meter_owner, array $input)
    {
        $data = $input['data'];

        $meter_owner->nric_township = $data['nric_township'];
        $meter_owner->name = $data['name'];
        $meter_owner->email = $data['email'];
        $meter_owner->password = $data['password'];
        $meter_owner->dob = date('Y-m-d',strtotime($data['dob']));
        $meter_owner->contact_no = $data['contact_no'];
        $meter_owner->fax_no = $data['fax_no'];
        $meter_owner->nric_code = $data['nric_code'];
        $meter_owner->gender = $data['gender'];
        $meter_owner->martial_status = $data['martial_status'];
        $meter_owner->nationality = $data['nationality'];
        $meter_owner->address = $data['address'];
        $meter_owner->position = $data['position'];
        $meter_owner->created_by = access()->user()->id;
        $meter_owner->updated_by = access()->user()->id;

        DB::transaction(function () use ($meter_owner, $data) {
            if ($meter_owner->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.meter_owner.update_error'));
        });
    }

    /**
     * @param Model $meter_owner
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $meter_owner)
    {
        if ($meter_owner->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.meter_owner.delete_error'));
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
    protected function createMeterOwnerStub($input)
    {
        $meter_owner = self::MODEL;
        $meter_owner = new $meter_owner;
        $meter_owner->nric_township = $input['nric_township'];
        $meter_owner->name = $input['name'];
        $meter_owner->email = $input['email'];
        $meter_owner->password = $input['password'];
        $meter_owner->dob = date('Y-m-d',strtotime($input['dob']));
        $meter_owner->contact_no = $input['contact_no'];
        $meter_owner->fax_no = $input['fax_no'];
        $meter_owner->nric_code = $input['nric_code'];
        $meter_owner->gender = $input['gender'];
        $meter_owner->martial_status = $input['martial_status'];
        $meter_owner->nationality = $input['nationality'];
        $meter_owner->address = $input['address'];
        $meter_owner->position = $input['position'];
        $meter_owner->created_by = access()->user()->id;
        $meter_owner->updated_by = access()->user()->id;   

        // name,email,password,dob,contact_no,fax_no,nric_code,gender,martial_status(single, married, separated, divorced,widowed, single parent), nationality, address, position,

        return $meter_owner;
    }
}

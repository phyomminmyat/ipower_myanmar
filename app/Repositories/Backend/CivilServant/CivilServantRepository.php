<?php

namespace App\Repositories\Backend\CivilServant;

use App\Models\CivilServant\CivilServant;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Access\User\User;

/**
 * Class UserRepository.
 */
class CivilServantRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    // const MODEL = CivilServant::class;
    const MODEL = User::class;

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false,$order_by = 'created_at', $sort = 'desc')
    {
        // return $this->query()
        //     ->with('department')
        //     ->orderBy($order_by, $sort)
        //     ->select('*');

        $dataTableQuery = User::with('department')->where('is_civil_servant',1)->orderBy($order_by, $sort)->select('*');

         if ($trashed == 'true') {
            return $dataTableQuery->onlyTrashed();
        }

        // active() is a scope on the UserScope trait
        return $dataTableQuery->active($status);
    }

    /**
     * @param array $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $civil_servant = $this->createCivilServantStub($data);
        DB::transaction(function () use ($civil_servant, $data) {
            if ($civil_servant->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.civil_servant.create_error'));
        });
    }

    /**
     * @param Model $civil_servant
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $civil_servant, array $input)
    {
        $data = $input['data'];

        $civil_servant->department_id = $data['department_id'];
        $civil_servant->name = $data['name'];
        $civil_servant->email = $data['email'];
        $civil_servant->password = $data['password'];
        $civil_servant->dob = date('Y-m-d',strtotime($data['dob']));
        $civil_servant->contact_no = $data['contact_no'];
        $civil_servant->fax_no = $data['fax_no'];
        $civil_servant->nric_code = $data['nric_code'];
        $civil_servant->gender = $data['gender'];
        $civil_servant->martial_status = $data['martial_status'];
        $civil_servant->nationality = $data['nationality'];
        $civil_servant->address = $data['address'];
        $civil_servant->position = $data['position'];
        $civil_servant->status = isset($data['status']) ? 1 : 0;
        $civil_servant->updated_by = access()->user()->id;

        DB::transaction(function () use ($civil_servant, $data) {
            if ($civil_servant->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.civil_servant.update_error'));
        });
    }

    /**
     * @param Model $civil_servant
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $civil_servant)
    {
        if ($civil_servant->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.civil_servant.delete_error'));
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
    protected function createCivilServantStub($input)
    {
        $civil_servant = self::MODEL;
        $civil_servant = new $civil_servant;
        $civil_servant->department_id = $input['department_id'];
        $civil_servant->name = $input['name'];
        $civil_servant->email = $input['email'];
        $civil_servant->password = $input['password'];
        $civil_servant->dob = date('Y-m-d',strtotime($input['dob']));
        $civil_servant->contact_no = $input['contact_no'];
        $civil_servant->fax_no = $input['fax_no'];
        $civil_servant->nric_code = $input['nric_code'];
        $civil_servant->gender = $input['gender'];
        $civil_servant->martial_status = $input['martial_status'];
        $civil_servant->nationality = $input['nationality'];
        $civil_servant->address = $input['address'];
        $civil_servant->position = $input['position'];
        $civil_servant->status = isset($input['status']) ? 1 : 0;
        // $civil_servant->confirmed = isset($input['confirmed']) ? 1 : 0;
        $civil_servant->created_by = access()->user()->id;
        $civil_servant->updated_by = access()->user()->id;   

        // name,email,password,dob,contact_no,fax_no,nric_code,gender,martial_status(single, married, separated, divorced,widowed, single parent), nationality, address, position,

        return $civil_servant;
    }
}

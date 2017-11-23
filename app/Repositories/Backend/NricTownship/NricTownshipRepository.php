<?php

namespace App\Repositories\Backend\NricTownship;

use App\Models\NricTownship\NricTownship;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class NricTownshipRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = NricTownship::class;

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

        $nric_code = $this->createNricTownshipStub($data);
        DB::transaction(function () use ($nric_code, $data) {
            if ($nric_code->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Model $nric_code
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $nric_township, array $input)
    {
        $data = $input['data'];

        $nric_township->nric_code_id = $data['nric_code_id'];
        $nric_township->township = $data['township'];
        $nric_township->short_name = $data['short_name'];
        $nric_township->serial_no = $data['serial_no'];
        $nric_township->created_by = access()->user()->id;
        $nric_township->updated_by = access()->user()->id;

        DB::transaction(function () use ($nric_township, $data) {
            if ($nric_township->save()) {

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.nric_township.update_error'));
        });
    }

    /**
     * @param Model $nric_township
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $nric_township)
    {

        if ($nric_township->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.nric_township.delete_error'));
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
    protected function createNricTownshipStub($input)
    {
        $nric_township = self::MODEL;
        $nric_township = new $nric_township;
        $nric_township->nric_code_id = $input['nric_code_id'];
        $nric_township->township = $input['township'];
        $nric_township->short_name = $input['short_name'];
        $nric_township->serial_no = $input['serial_no'];
        $nric_township->created_by = access()->user()->id;
        $nric_township->updated_by = access()->user()->id;   

        return $nric_township;
    }
}

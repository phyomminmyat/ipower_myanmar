<?php

namespace App\Repositories\Backend\NricCode;

use App\Models\NricCode\NricCode;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class NricCodeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = NricCode::class;

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

        $nric_code = $this->createNricCodeStub($data);
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
    public function update(Model $nric_code, array $input)
    {
        $data = $input['data'];

        $nric_code->nric_code = $data['nric_code'];
        $nric_code->description = $data['description'];
        $nric_code->created_by = access()->user()->id;
        $nric_code->updated_by = access()->user()->id;

        DB::transaction(function () use ($nric_code, $data) {
            if ($nric_code->save()) {

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }

    /**
     * @param Model $nric_code
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $nric_code)
    {
        if (access()->id() == $nric_code->id) {
            throw new GeneralException(trans('exceptions.backend.access.nric_codes.cant_delete_self'));
        }

        if ($nric_code->id == 1) {
            throw new GeneralException(trans('exceptions.backend.access.nric_codes.cant_delete_admin'));
        }

        if ($nric_code->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.nric_codes.delete_error'));
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
    protected function createNricCodeStub($input)
    {
        $nric_code = self::MODEL;
        $nric_code = new $nric_code;
        $nric_code->nric_code = $input['nric_code'];
        $nric_code->description = $input['description'];
        $nric_code->created_by = access()->user()->id;
        $nric_code->updated_by = access()->user()->id;   

        return $nric_code;
    }
}

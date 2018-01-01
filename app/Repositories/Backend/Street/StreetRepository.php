<?php

namespace App\Repositories\Backend\Street;

use App\Models\Street\Street;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StreetRepository.
 */
class StreetRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Street::class;

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

        $street = $this->createStreetStub($data);
        DB::transaction(function () use ($street, $data) {
            if ($street->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.street.create_error'));
        });
    }

    /**
     * @param Model $street
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $street, array $input)
    {
        $data = $input['data'];

        $street->community_id = $data['community_id'];
        $street->street_name = $data['street_name'];
        $street->street_code = $data['street_code'];
        $street->description = $data['description'];
        $street->created_by = access()->user()->id;
        $street->updated_by = access()->user()->id;

        DB::transaction(function () use ($street, $data) {
            if ($street->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.street.update_error'));
        });
    }

    /**
     * @param Model $street
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $street)
    {
        if ($street->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.street.delete_error'));
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
    protected function createStreetStub($input)
    {
        $street = self::MODEL;
        $street = new $street;
        $street->community_id = $input['community_id'];
        $street->street_name = $input['street_name'];
        $street->street_code = $input['street_code'];
        $street->description = $input['description'];
        $street->created_by = access()->user()->id;
        $street->updated_by = access()->user()->id;   

        return $street;
    }
}

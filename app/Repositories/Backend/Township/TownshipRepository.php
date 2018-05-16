<?php

namespace App\Repositories\Backend\Township;

use App\Models\Township\Township;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class TownshipRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Township::class;

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($order_by = 'created_at', $sort = 'desc')
    {
        return $this->query()
            ->with('district')
            ->orderBy($order_by, $sort)
            ->select('*');
    }

    /**
     * @param array $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $township = $this->createTownshipStub($data);
        DB::transaction(function () use ($township, $data) {
            if ($township->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.township.create_error'));
        });
    }

    /**
     * @param Model $township
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $township, array $input)
    {
        $data = $input['data'];

        $township->district_id   = $data['district_id'];
        $township->township_name = $data['township_name'];
        $township->township_code = $data['township_code'];
        $township->description   = $data['description'];
        $township->latitude      = $data['latitude'];
        $township->longitude     = $data['longitude'];
        $township->updated_by    = access()->user()->id;

        DB::transaction(function () use ($township, $data) {
            if ($township->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.township.update_error'));
        });
    }

    /**
     * @param Model $township
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $township)
    {
        if ($township->delete()) {

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
    protected function createTownshipStub($input)
    {
        $township = self::MODEL;
        $township = new $township;
        $township->district_id   = $input['district_id'];
        $township->township_name = $input['township_name'];
        $township->township_code = $input['township_code'];
        $township->description   = $input['description'];
        $township->latitude      = $input['latitude'];
        $township->longitude     = $input['longitude'];
        $township->created_by    = access()->user()->id;
        $township->updated_by    = access()->user()->id;   

        return $township;
    }
}

<?php

namespace App\Repositories\Backend\Notification;

use App\Models\Notification\Notification;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NotificationRepository.
 */
class NotificationRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Notification::class;

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

        $street = $this->createNotificationStub($data);
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

        $street->street_id = $data['street_id'];
        $street->name = $data['name'];
        $street->description = $data['description'];
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
    protected function createNotificationStub($input)
    {
        $street = self::MODEL;
        $street = new $street;
        $street->street_id = $input['street_id'];
        $street->name = $input['name'];
        $street->description = $input['description'];
        $street->created_by = access()->user()->id;
        $street->updated_by = access()->user()->id;   

        return $street;
    }

    public function getNotificationRepoList()
    {
        $notification_lists = Notification::join('streets','streets.id','=','notifications.street_id')
                        ->where('notifications.deleted_at',null)
                        ->select('notifications.id','notifications.name','notifications.description','streets.street_name')
                        ->get();

        return $notification_lists;
    } 
}

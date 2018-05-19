<?php

namespace App\Repositories\Backend\Community;

use App\Models\Community\Community;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class CommunityRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Community::class;

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

        $communities = $this->createCommunityStub($data);
        DB::transaction(function () use ($communities, $data) {
            if ($communities->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.community.create_error'));
        });
    }

    /**
     * @param Model $communities
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $communities, array $input)
    {
        $data = $input['data'];

        $communities->village_tract_id = $data['village_tract_id'];
        $communities->community_name = $data['community_name'];
        $communities->community_code = $data['community_code'];
        $communities->description = $data['description'];
        $communities->latitude    = $data['latitude'];
        $communities->longitude   = $data['longitude'];

        $communities->updated_by = access()->user()->id;

        DB::transaction(function () use ($communities, $data) {
            if ($communities->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.community.update_error'));
        });
    }

    /**
     * @param Model $communities
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $communities)
    {
        if ($communities->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.community.delete_error'));
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
    protected function createCommunityStub($input)
    {
        $communities = self::MODEL;
        $communities = new $communities;
        $communities->village_tract_id = $input['village_tract_id'];
        $communities->community_name = $input['community_name'];
        $communities->community_code = $input['community_code'];
        $communities->description = $input['description'];
        $communities->latitude   = $input['latitude'];
        $communities->longitude   = $input['longitude'];
        $communities->created_by = access()->user()->id;
        $communities->updated_by = access()->user()->id;   

        return $communities;
    }

    public function getCommunityRepoList()
    {
        $community_list = Community::join('village_tracts','village_tracts.id','=','communities.village_tract_id')
                        ->where('communities.deleted_at',null)
                        ->select('communities.*','village_tracts.village_name')
                        ->get();

        return $community_list;
    }
}

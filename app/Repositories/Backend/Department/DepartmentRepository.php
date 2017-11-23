<?php

namespace App\Repositories\Backend\Department;

use App\Models\Department\Department;
use App\Models\Region\Region;
use App\Models\Township\Township;
use App\Models\District\District;
use App\Models\VillageTract\VillageTract;
use App\Models\Community\Community;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class DepartmentRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Department::class;

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

        $department = $this->createDepartmentStub($data);
        DB::transaction(function () use ($department, $data) {
            if ($department->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.department.create_error'));
        });
    }

    /**
     * @param Model $department
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $department, array $input)
    {
        $data = $input['data'];

        $department->region_id = $data['region_id'];
        $department->township_id = $data['township_id'];
        $department->district_id = $data['district_id'];
        $department->village_tract_id = $data['village_tract_id'];
        $department->community_id = $data['community_id'];
        $department->department_name = $data['department_name'];
        $department->department_code = $data['department_code'];
        $department->description = $data['description'];
        $department->created_by = access()->user()->id;
        $department->updated_by = access()->user()->id; 

        DB::transaction(function () use ($department, $data) {
            if ($department->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.department.update_error'));
        });
    }

    /**
     * @param Model $department
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $department)
    {
        if ($department->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.department.delete_error'));
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
    protected function createDepartmentStub($input)
    {
        $department = self::MODEL;
        $department = new $department;
        $department->region_id = $input['region_id'];
        $department->township_id = $input['township_id'];
        $department->district_id = $input['district_id'];
        $department->village_tract_id = $input['village_tract_id'];
        $department->community_id = $input['community_id'];
        $department->department_name = $input['department_name'];
        $department->department_code = $input['department_code'];
        $department->description = $input['description'];
        $department->created_by = access()->user()->id;
        $department->updated_by = access()->user()->id;   

        return $department;
    }

    public function getDistrictData($id)
    {
        $district = District::with('region')->where('region_id',$id)->get();
        return $district;
    }

    public function getTownshipData($id)
    {
        $township = Township::with('district')->get();
        return $township;
    }

    public function getVillageData($id)
    {
        $township = VillageTract::with('township')->get();
        return $township;
    }

    public function getCommunityData($id)
    {
        $villages = Community::with('village')->get();
        return $villages;
    }


}

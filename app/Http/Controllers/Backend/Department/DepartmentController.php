<?php

namespace App\Http\Controllers\Backend\Department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Department\DepartmentRepository;
use App\Models\Department\Department;
use App\Models\Region\Region;
use App\Models\Township\Township;
use App\Models\District\District;
use App\Models\VillageTract\VillageTract;
use App\Models\Community\Community;
use App\Http\Requests\Backend\Department\StoreDepartmentRequest;
use App\Http\Requests\Backend\Department\ManageDepartmentRequest;
use App\Http\Requests\Backend\Department\UpdateDepartmentRequest;

class DepartmentController extends Controller
{   
    protected $department;

    /**
     * @param DepartmentRepository $department
     */
    public function __construct(DepartmentRepository $department)
    {
        $this->department = $department;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.department.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        $townships = Township::all();
        $districts = District::all();
        $villages = VillageTract::all();
        $communities = Community::all();
       
        return view('backend.department.create', compact('regions','townships','districts','villages','communities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $this->department->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.department.index')->withFlashSuccess(trans('alerts.backend.department.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $regions = Region::all();
        $townships = Township::all();
        $districts = District::all();
        $villages = VillageTract::all();
        $communities = Community::all();
        return view('backend.department.edit', compact('regions','townships','districts','villages','communities'))
            ->withdepartment($department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Department $department, UpdateDepartmentRequest $request)
    {
        $this->department->update($department,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.department.index')->withFlashSuccess(trans('alerts.backend.department.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $this->department->delete($department);

        return redirect()->route('admin.department.index')->withFlashSuccess(trans('alerts.backend.department.deleted'));
    }

    public function getDistrictData($region_id)
    {
        $districts = $this->department->getDistrictData($region_id);
        return response()->json($districts);
    }

    public function getTownshipData($district_id)
    {
        $townships = $this->department->getTownshipData($district_id);
        return response()->json($townships);
    }

    public function getVillageData($township_id)
    {
        $villages = $this->department->getVillageData($township_id);
        return response()->json($villages);
    }

    public function getCommunityData($village_id)
    {
        $communities = $this->department->getCommunityData($village_id);
        return response()->json($communities);
    }

}

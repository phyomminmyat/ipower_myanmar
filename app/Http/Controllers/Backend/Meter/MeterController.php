<?php

namespace App\Http\Controllers\Backend\Meter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Meter\MeterRepository;
use App\Models\Meter\Meter;
use App\Models\MeterOwner\MeterOwner;
use App\Models\Region\Region;
use App\Models\Township\Township;
use App\Models\District\District;
use App\Models\VillageTract\VillageTract;
use App\Models\Community\Community;
use App\Http\Requests\Backend\Meter\StoreMeterRequest;
use App\Http\Requests\Backend\Meter\ManageMeterRequest;
use App\Http\Requests\Backend\Meter\UpdateMeterRequest;

class MeterController extends Controller
{   
    protected $meter;

    /**
     * @param MeterRepository $meter
     */
    public function __construct(MeterRepository $meter)
    {
        $this->meter = $meter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.meter.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = MeterOwner::all();
        $regions = Region::all();
        $townships = Township::all();
        $districts = District::all();
        $villages = VillageTract::all();
        $communities = Community::all();
       
        return view('backend.meter.create', compact('owners','regions','townships','districts','villages','communities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremeterRequest $request)
    {
        $this->meter->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.meter.index')->withFlashSuccess(trans('alerts.backend.meter.created'));
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
     * @param  $meter
     * @return \Illuminate\Http\Response
     */
    public function edit(Meter $meter)
    {   
        $owners = MeterOwner::all();
        $regions = Region::all();
        $townships = Township::all();
        $districts = District::all();
        $villages = VillageTract::all();
        $communities = Community::all();
        return view('backend.meter.edit', compact('owners','regions','townships','districts','villages','communities'))
            ->withmeter($meter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $meter
     * @return \Illuminate\Http\Response
     */
    public function update(Meter $meter, UpdatemeterRequest $request)
    {
        $this->meter->update($meter,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.meter.index')->withFlashSuccess(trans('alerts.backend.meter.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meter $meter)
    {
        if($this->meter->delete($meter)){

            return redirect()->route('admin.meter.index')->withFlashSuccess(trans('alerts.backend.meter.deleted'));
        }

    }

    /**
     * @param int $id
     * @param ManageMeterRequest $request
     *
     * @return mixed
     */
    public function delete($id)
    {   
        $this->meter->forceDelete($id);

        return redirect()->route('admin.meter.deleted')->withFlashSuccess(trans('alerts.backend.meter.deleted_permanently'));
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function restore($id)
    {
        $this->meter->restore($id);

        return redirect()->route('admin.meter.index')->withFlashSuccess(trans('alerts.backend.meter.restored'));
    }



    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeleted()
    {
        return view('backend.meter.deleted');
    }

    public function getDistrictData($region_id)
    {
        $districts = $this->meter->getDistrictData($region_id);
        return response()->json($districts);
    }

    public function getTownshipData($district_id)
    {
        $townships = $this->meter->getTownshipData($district_id);
        return response()->json($townships);
    }

    public function getVillageData($township_id)
    {
        $villages = $this->meter->getVillageData($township_id);
        return response()->json($villages);
    }

    public function getCommunityData($village_id)
    {
        $communities = $this->meter->getCommunityData($village_id);
        return response()->json($communities);
    }

}

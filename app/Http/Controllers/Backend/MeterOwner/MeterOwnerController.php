<?php

namespace App\Http\Controllers\Backend\MeterOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\MeterOwner\MeterOwnerRepository;
use App\Models\MeterOwner\MeterOwner;
use App\Models\NricCode\NricCode;
use App\Models\NricTownship\NricTownship;
use App\Models\Department\Department;
use App\Http\Requests\Backend\MeterOwner\StoreMeterOwnerRequest;
use App\Http\Requests\Backend\MeterOwner\ManageMeterOwnerRequest;
use App\Http\Requests\Backend\MeterOwner\UpdateMeterOwnerRequest;

class MeterOwnerController extends Controller
{   
    protected $meter_owner;

    /**
     * @param MeterOwnerRepository $meter_owner
     */
    public function __construct(MeterOwnerRepository $meter_owner)
    {
        $this->meter_owner = $meter_owner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.meter_owner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nric_townships = NricTownship::all();
        $nric_codes = NricCode::all();
       
        return view('backend.meter_owner.create', compact('nric_townships','nric_codes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeterOwnerRequest $request)
    {
        $this->meter_owner->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.meter_owner.index')->withFlashSuccess(trans('alerts.backend.meter_owner.created'));
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
     * @param  $meter_owner
     * @return \Illuminate\Http\Response
     */
    public function edit(MeterOwner $meter_owner)
    {
        $nric_townships = NricTownship::all();
        $nric_codes = NricCode::all();
        return view('backend.meter_owner.edit', compact('nric_townships','nric_codes'))
            ->withMeterOwner($meter_owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $meter_owner
     * @return \Illuminate\Http\Response
     */
    public function update(MeterOwner $meter_owner, UpdateMeterOwnerRequest $request)
    {
        $this->meter_owner->update($meter_owner,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.meter_owner.index')->withFlashSuccess(trans('alerts.backend.meter_owner.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $meter_owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeterOwner $meter_owner)
    {
        $this->meter_owner->delete($meter_owner);

        return redirect()->route('admin.meter_owner.index')->withFlashSuccess(trans('alerts.backend.meter_owner.deleted'));
    }
}

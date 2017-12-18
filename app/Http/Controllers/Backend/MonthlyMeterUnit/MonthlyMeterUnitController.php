<?php

namespace App\Http\Controllers\Backend\MonthlyMeterUnit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\MonthlyMeterUnit\MonthlyMeterUnitRepository;
use App\Models\MonthlyMeterUnit\MonthlyMeterUnit;
use App\Models\Meter\Meter;
use App\Http\Requests\Backend\MonthlyMeterUnit\StoreMonthlyMeterUnitRequest;
use App\Http\Requests\Backend\MonthlyMeterUnit\ManageMonthlyMeterUnitRequest;
use App\Http\Requests\Backend\MonthlyMeterUnit\UpdateMonthlyMeterUnitRequest;

class MonthlyMeterUnitController extends Controller
{   
    protected $meter_unit;

    /**
     * @param MonthlyMeterUnitRepositoryRepository $meter_unit
     */
    public function __construct(MonthlyMeterUnitRepository $meter_unit)
    {
        $this->meter_unit = $meter_unit;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.meter_unit.index')->withMonthlyMeterUnits($this->meter_unit->getForDataTable()->paginate(2));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meters = Meter::all();
    
        return view('backend.meter_unit.create', compact('meters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonthlyMeterUnitRequest $request)
    {
        $this->meter_unit->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.meter_units.index')->withFlashSuccess(trans('alerts.backend.meter_unit.created'));
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
     * @param  $meter_unit
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlyMeterUnit $meter_unit)
    {
        $meters = Meter::all();

        return view('backend.meter_unit.edit', compact('meters'))
            ->withMeterUnit($meter_unit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $meter_unit
     * @return \Illuminate\Http\Response
     */
    public function update(MonthlyMeterUnit $meter_unit, UpdateMonthlyMeterUnitRequest $request)
    {
        $this->meter_unit->update($meter_unit,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.meter_units.index')->withFlashSuccess(trans('alerts.backend.meter_unit.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $meter_unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyMeterUnit $meter_unit)
    {
        $this->meter_unit->delete($meter_unit);

        return redirect()->route('admin.meter_units.index')->withFlashSuccess(trans('alerts.backend.meter_unit.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $meter_unit
     * @return \Illuminate\Http\Response
     */
    public function destroyMeterUnit($id)
    {   
        $meter_unit = MonthlyMeterUnit::find($id);

        $this->meter_unit->delete($meter_unit);

        return redirect()->route('admin.meter_units.index')->withFlashSuccess(trans('alerts.backend.meter_unit.deleted'));
    }    
}
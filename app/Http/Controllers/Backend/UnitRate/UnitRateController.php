<?php

namespace App\Http\Controllers\Backend\UnitRate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\UnitRate\UnitRateRepository;
use App\Models\UnitRate\UnitRate;
use App\Models\Meter\Meter;
use App\Http\Requests\Backend\UnitRate\StoreUnitRateRequest;
use App\Http\Requests\Backend\UnitRate\ManageUnitRateRequest;
use App\Http\Requests\Backend\UnitRate\UpdateUnitRateRequest;

class UnitRateController extends Controller
{   
    protected $unit_rate;

    /**
     * @param UnitRateRepositoryRepository $unit_rate
     */
    public function __construct(UnitRateRepository $unit_rate)
    {
        $this->unit_rate = $unit_rate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.unit_rate.index')->withUnitRates($this->unit_rate->getForDataTable()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meters = Meter::all();
    
        return view('backend.unit_rate.create', compact('meters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnitRateRequest $request)
    {
        $this->unit_rate->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.unit_rate.index')->withFlashSuccess(trans('alerts.backend.unit_rate.created'));
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
     * @param  $unit_rate
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitRate $unit_rate)
    {
        $meters = Meter::all();

        return view('backend.unit_rate.edit', compact('meters'))
            ->withUnitRate($unit_rate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $unit_rate
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRate $unit_rate, UpdateUnitRateRequest $request)
    {
        $this->unit_rate->update($unit_rate,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.unit_rate.index')->withFlashSuccess(trans('alerts.backend.unit_rate.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $unit_rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitRate $unit_rate)
    {
        $this->unit_rate->delete($unit_rate);

        return redirect()->route('admin.unit_rate.index')->withFlashSuccess(trans('alerts.backend.unit_rate.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $unit_rate
     * @return \Illuminate\Http\Response
     */
    public function destroyUnitRate($id)
    {   
        $unit_rate = UnitRate::find($id);

        $this->unit_rate->delete($unit_rate);

        return redirect()->route('admin.unit_rate.index')->withFlashSuccess(trans('alerts.backend.unit_rate.deleted'));
    }    
}
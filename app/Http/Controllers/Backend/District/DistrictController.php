<?php

namespace App\Http\Controllers\Backend\District;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\District\DistrictRepository;
use App\Http\Requests\Backend\District\StoreDistrictRequest;
use App\Http\Requests\Backend\District\ManageDistrictRequest;
use App\Http\Requests\Backend\District\UpdateDistrictRequest;
use App\Models\Region\Region;
use App\Models\District\District;

class DistrictController extends Controller
{   
    protected $district;

    /**
     * @param DistrictRepository $district
     */
    public function __construct(DistrictRepository $district)
    {
        $this->district = $district;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.district.index')->withDistricts($this->district->getForDataTable()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        return view('backend.district.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistrictRequest $request)
    {
        $this->district->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.district.index')->withFlashSuccess(trans('alerts.backend.district.created'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        $regions = Region::all();
        return view('backend.district.edit', compact('regions'))
         ->withDistrict($district);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(District $district, UpdateDistrictRequest $request)
    {
        $this->district->update($district,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.district.index')->withFlashSuccess(trans('alerts.backend.district.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        $this->district->delete($district);

        return redirect()->route('admin.district.index')->withFlashSuccess(trans('alerts.backend.district.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyDistrict($id)
    {
        $district = District::find($id);
        
        $this->district->delete($district);

        return redirect()->route('admin.district.index')->withFlashSuccess(trans('alerts.backend.district.deleted'));
    }
}

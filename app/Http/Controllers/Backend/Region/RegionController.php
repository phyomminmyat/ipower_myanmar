<?php

namespace App\Http\Controllers\Backend\Region;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Region\RegionRepository;
use App\Http\Requests\Backend\Region\StoreRegionRequest;
use App\Http\Requests\Backend\Region\ManageRegionRequest;
use App\Http\Requests\Backend\Region\UpdateRegionRequest;
use App\Models\Region\Region;


class RegionController extends Controller
{
    protected $region;

    /**
     * @param RegionRepository $region
     */
    public function __construct(RegionRepository $region)
    {
        $this->region = $region;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.region.index')->withRegions($this->region->getForDataTable()->paginate(2));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.region.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegionRequest $request)
    {
        $this->region->create(
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.region.index')->withFlashSuccess(trans('alerts.backend.region.created'));
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
    public function edit(Region $region)
    {
        return view('backend.region.edit')
            ->withRegion($region);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Region $region,UpdateRegionRequest $request)
    {
        $this->region->update($region,
            [
                'data' => $request->except(
                    '_token',
                    '_method'
                )
            ]);

        return redirect()->route('admin.region.index')->withFlashSuccess(trans('alerts.backend.region.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $this->region->delete($region);

        return redirect()->route('admin.region.index')->withFlashSuccess(trans('alerts.backend.region.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyRegion($id)
    {   
        $region = Region::find($id);
        
        $this->region->delete($region);

        return redirect()->route('admin.region.index')->withFlashSuccess(trans('alerts.backend.region.deleted'));
    }
}

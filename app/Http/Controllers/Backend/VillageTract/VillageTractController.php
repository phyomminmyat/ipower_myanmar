<?php

namespace App\Http\Controllers\Backend\VillageTract;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\VillageTract\VillageTractRepository;
use App\Http\Requests\Backend\VillageTract\StoreVillageTractRequest;
use App\Http\Requests\Backend\VillageTract\ManageVillageTractRequest;
use App\Http\Requests\Backend\VillageTract\UpdateVillageTractRequest;
use App\Models\Township\Township;
use App\Models\VillageTract\VillageTract;


class VillageTractController extends Controller
{
    protected $village_tract;

    /**
     * @param VillageTractRepository $village_tract
     */
    public function __construct(VillageTractRepository $village_tract)
    {
        $this->village_tract = $village_tract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.village_tract.index')->withVillageTracts($this->village_tract->getForDataTable()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $townships = Township::all();
        return view('backend.village_tract.create', compact('townships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVillageTractRequest $request)
    {
         $this->village_tract->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.village_tract.index')->withFlashSuccess(trans('alerts.backend.village_tract.created'));
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
    public function edit(VillageTract $village_tract)
    {
        $townships = Township::all();
        return view('backend.village_tract.edit', compact('townships'))
            ->withVillageTract($village_tract);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VillageTract $village_tract, UpdateVillageTractRequest $request)
    {
        $this->village_tract->update($village_tract,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.village_tract.index')->withFlashSuccess(trans('alerts.backend.village_tract.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VillageTract $village_tract)
    {
        $this->village_tract->delete($village_tract);

        return redirect()->route('admin.village_tract.index')->withFlashSuccess(trans('alerts.backend.village_tract.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyVillage($id)
    {
        $village_tract = VillageTract::find($id);
        
        $this->village_tract->delete($village_tract);

        return redirect()->route('admin.village_tract.index')->withFlashSuccess(trans('alerts.backend.village_tract.deleted'));
    }
}

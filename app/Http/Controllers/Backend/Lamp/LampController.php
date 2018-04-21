<?php

namespace App\Http\Controllers\Backend\Lamp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Lamp\LampRepository;
use App\Models\Lamp\Lamp;
use App\Models\Street\Street;
use App\Http\Requests\Backend\Lamp\StoreLampRequest;
use App\Http\Requests\Backend\Lamp\ManageLampRequest;
use App\Http\Requests\Backend\Lamp\UpdateLampRequest;

class LampController extends Controller
{
    protected $lamp;

    /**
     * @param StreetRepository $lamp
     */
    public function __construct(LampRepository $lamp)
    {
        $this->lamp = $lamp;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.lamp.index')->withLamp($this->lamp->getForDataTable()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $streets = Street::all();
       
        return view('backend.lamp.create', compact('streets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLampRequest $request)
    {
        $this->lamp->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.lamp.index')->withFlashSuccess(trans('alerts.backend.lamp.created'));
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
    public function edit(Lamp $lamp)
    {
        $streets = Street::all();
        return view('backend.lamp.edit', compact('streets'))
            ->withLamp($lamp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Lamp $lamp, UpdateLampRequest $request)
    {
        $this->lamp->update($lamp,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.lamp.index')->withFlashSuccess(trans('alerts.backend.lamp.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lamp $lamp)
    {
        $this->lamp->delete($lamp);

        return redirect()->route('admin.lamp.index')->withFlashSuccess(trans('alerts.backend.lamp.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyLamp($id)
    {
        $lamp = Lamp::find($id);
        
        $this->lamp->delete($lamp);

        return redirect()->route('admin.lamp.index')->withFlashSuccess(trans('alerts.backend.lamp.deleted'));
    }
}
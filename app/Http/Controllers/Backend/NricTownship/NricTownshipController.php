<?php

namespace App\Http\Controllers\Backend\NricTownship;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\NricTownship\NricTownshipRepository;
use App\Http\Requests\Backend\NricTownship\StoreNricTownshipRequest;
use App\Http\Requests\Backend\NricTownship\ManageNricTownshipRequest;
use App\Http\Requests\Backend\NricTownship\UpdateNricTownshipRequest;
use App\Models\NricCode\NricCode;
use App\Models\NricTownship\NricTownship;


class NricTownshipController extends Controller
{
    protected $nric_township;

    /**
     * @param NricTownshipRepository $nric_township
     */
    public function __construct(NricTownshipRepository $nric_township)
    {
        $this->nric_township = $nric_township;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.nric_township.index')->withNricTownships($this->nric_township->getForDataTable()->paginate(2));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nric_codes = NricCode::all();
        return view('backend.nric_township.create', compact('nric_codes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNricTownshipRequest $request)
    {
        $this->nric_township->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.nric_township.index')->withFlashSuccess(trans('alerts.backend.nric_township.created'));
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
    public function edit(NricTownship $nric_township)
    {   
        $nric_codes = NricCode::all();
        return view('backend.nric_township.edit', compact('nric_codes'))
            ->withNricTownship($nric_township);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NricTownship $nric_township, UpdateNricTownshipRequest $request)
    {
        $this->nric_township->update($nric_township,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.nric_township.index')->withFlashSuccess(trans('alerts.backend.nric_township.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NricTownship $nric_township)
    {
        $this->nric_township->delete($nric_township);

        return redirect()->route('admin.nric_township.index')->withFlashSuccess(trans('alerts.backend.nric_township.deleted'));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroyNricTowship($id)
    {
        $nric_township = NricTownship::find($id);
        
        $this->nric_township->delete($nric_township);

        return redirect()->route('admin.nric_township.index')->withFlashSuccess(trans('alerts.backend.nric_township.deleted'));
    }
}

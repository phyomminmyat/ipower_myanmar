<?php

namespace App\Http\Controllers\Backend\Township;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Township\TownshipRepository;
use App\Models\Township\Township;
use App\Models\District\District;
use App\Http\Requests\Backend\Township\StoreTownshipRequest;
use App\Http\Requests\Backend\Township\ManageTownshipRequest;
use App\Http\Requests\Backend\Township\UpdateTownshipRequest;

class TownshipController extends Controller
{   
    protected $township;

    /**
     * @param TownshipRepository $township
     */
    public function __construct(TownshipRepository $township)
    {
        $this->township = $township;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.township.index')->withTownships($this->township->getForDataTable()->paginate(2));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();
       
        return view('backend.township.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTownshipRequest $request)
    {
        $this->township->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.township.index')->withFlashSuccess(trans('alerts.backend.township.created'));
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
     * @param  $township
     * @return \Illuminate\Http\Response
     */
    public function edit(Township $township)
    {
        $districts = District::all();
        return view('backend.township.edit', compact('districts'))
            ->withTownship($township);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $township
     * @return \Illuminate\Http\Response
     */
    public function update(Township $township, UpdateTownshipRequest $request)
    {
        $this->township->update($township,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.township.index')->withFlashSuccess(trans('alerts.backend.township.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Township $township)
    {
        $this->township->delete($township);

        return redirect()->route('admin.township.index')->withFlashSuccess(trans('alerts.backend.township.deleted'));
    }
}

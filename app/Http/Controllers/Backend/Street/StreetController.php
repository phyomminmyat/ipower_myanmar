<?php

namespace App\Http\Controllers\Backend\Street;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Street\StreetRepository;
use App\Models\Community\Community;
use App\Models\Street\Street;
use App\Http\Requests\Backend\Street\StoreStreetRequest;
use App\Http\Requests\Backend\Street\ManageStreetRequest;
use App\Http\Requests\Backend\Street\UpdateStreetRequest;

class StreetController extends Controller
{
    protected $street;

    /**
     * @param StreetRepository $Street
     */
    public function __construct(StreetRepository $street)
    {
        $this->street = $street;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.street.index')->withStreet($this->street->getForDataTable()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communities = Community::all();
       
        return view('backend.street.create', compact('communities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStreetRequest $request)
    {
        $this->street->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.street.index')->withFlashSuccess(trans('alerts.backend.street.created'));
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
    public function edit(Street $street)
    {
        $communities = Community::all();
        return view('backend.street.edit', compact('communities'))
            ->withStreet($street);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Street $street, UpdateStreetRequest $request)
    {
        $this->street->update($street,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.street.index')->withFlashSuccess(trans('alerts.backend.street.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Street $street)
    {
        $this->communities->delete($street);

        return redirect()->route('admin.street.index')->withFlashSuccess(trans('alerts.backend.street.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyStreet($id)
    {
        $street = Community::find($id);
        
        $this->communities->delete($street);

        return redirect()->route('admin.street.index')->withFlashSuccess(trans('alerts.backend.street.deleted'));
    }
}
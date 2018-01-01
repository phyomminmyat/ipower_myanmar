<?php

namespace App\Http\Controllers\Backend\CivilServant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\CivilServant\CivilServantRepository;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Repositories\Backend\Access\User\UserRepository;
use App\Models\CivilServant\CivilServant;
use App\Models\NricCode\NricCode;
use App\Models\Department\Department;
use App\Http\Requests\Backend\CivilServant\StoreCivilServantRequest;
use App\Http\Requests\Backend\CivilServant\ManageCivilServantRequest;
use App\Http\Requests\Backend\CivilServant\UpdateCivilServantRequest;

class CivilServantController extends Controller
{   
    protected $civil_servants;
 
    /**
     * @param CivilServantRepository $civil_servants
     */
    public function __construct(CivilServantRepository $civil_servants)
    {
        $this->civil_servants = $civil_servants;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.civil_servant.index')->withCivilServants($this->civil_servants->getForDataTable(1,false)->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $nric_codes = NricCode::all();
       
        return view('backend.civil_servant.create', compact('departments','nric_codes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCivilServantRequest $request)
    {
        $this->civil_servants->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.civil_servant.index')->withFlashSuccess(trans('alerts.backend.civil_servants.created'));
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
     * @param  $civil_servants
     * @return \Illuminate\Http\Response
     */
    public function edit(CivilServant $civil_servant)
    {
        $departments = Department::all();
        $nric_codes = NricCode::all();
        return view('backend.civil_servant.edit', compact('departments','nric_codes'))
            ->withCivilServant($civil_servant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $civil_servants
     * @return \Illuminate\Http\Response
     */
    public function update(CivilServant $civil_servant, UpdateCivilServantRequest $request)
    {
        $this->civil_servants->update($civil_servant,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.civil_servant.index')->withFlashSuccess(trans('alerts.backend.civil_servants.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $civil_servants
     * @return \Illuminate\Http\Response
     */
    public function destroy(CivilServant $civil_servant)
    {
        $this->civil_servants->delete($civil_servant);

        return redirect()->route('admin.civil_servant.index')->withFlashSuccess(trans('alerts.backend.civil_servants.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $civil_servants
     * @return \Illuminate\Http\Response
    */
    public function destroyCivilServant($id)
    {   
        $civil_servant = CivilServant::find($id);
        
        $this->civil_servants->delete($civil_servant);

        return redirect()->route('admin.civil_servant.index')->withFlashSuccess(trans('alerts.backend.civil_servants.deleted'));
    }

    
}

<?php

namespace App\Http\Controllers\Backend\Access\Permission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Access\Permission\PermissionRepository;
use App\Models\Access\Permission\Permission;
use App\Http\Requests\Backend\Access\Permission\StorePermissionRequest;
use App\Http\Requests\Backend\Access\Permission\ManagePermissionRequest;
use App\Http\Requests\Backend\Access\Permission\UpdatePermissionRequest;

class PermissionController extends Controller
{   
    protected $permission;

    /**
     * @param PermissionRepository $permission
     */
    public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.access.permission.index')->withPermissions($this->permission->getForDataTable()->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.access.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        $this->permission->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.access.permissions.index')->withFlashSuccess(trans('alerts.backend.access.permission.created'));
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
     * @param  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {   
        return view('backend.access.permission.edit')
            ->withPermission($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Permission $permission, UpdatePermissionRequest $request)
    {
        $this->permission->update($permission, [ 'data' => $request->except('_token','_method') ]);

        return redirect()->route('admin.access.permissions.index')->withFlashSuccess(trans('alerts.backend.permission.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if($this->permission->delete($permission)){

            return redirect()->route('admin.permissions.index')->withFlashSuccess(trans('alerts.backend.permission.deleted'));
        }

    }

    /**
     * @param int $id
     * @param ManagePermissionRequest $request
     *
     * @return mixed
     */
    public function destroyPermission($id)
    {   
        $permission = Permission::find($id);
        
        $this->permission->delete($permission);

        return redirect()->route('admin.permissions.index')->withFlashSuccess(trans('alerts.backend.permission.deleted'));
    }
}
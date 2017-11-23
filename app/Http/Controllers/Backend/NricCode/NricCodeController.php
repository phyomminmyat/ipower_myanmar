<?php

namespace App\Http\Controllers\Backend\NricCode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\NricCode\NricCodeRepository;
use App\Http\Requests\Backend\NricCode\StoreNricCodeRequest;
use App\Http\Requests\Backend\NricCode\ManageNricCodeRequest;
use App\Http\Requests\Backend\NricCode\UpdateNricCodeRequest;
use App\Models\NricCode\NricCode;

class NricCodeController extends Controller
{
    protected $nric_code;

    /**
     * @param NricCodeRepository $nric_code
     */
    public function __construct(NricCodeRepository $nric_code)
    {
        $this->nric_code = $nric_code;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.nric_codes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.nric_codes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNricCodeRequest $request)
    {
        $this->nric_code->create(
            [
                'data' => $request->only(
                    'nric_code',
                    'description'
                ),
            ]);

        return redirect()->route('admin.nric_codes.index')->withFlashSuccess(trans('alerts.backend.nric_codes.created'));
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
    public function edit(NricCode $nric_code)
    {
        return view('backend.nric_codes.edit')
            ->withNricCode($nric_code);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(NricCode $nric_code, UpdateNricCodeRequest $request)
    {
        $this->nric_code->update($nric_code,
            [
                'data' => $request->only(
                    'nric_code',
                    'description'
                )
            ]);

        return redirect()->route('admin.nric_codes.index')->withFlashSuccess(trans('alerts.backend.nric_codes.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NricCode $nric_code, ManageNricCodeRequest $request)
    {
        $this->nric_code->delete($nric_code);

        return redirect()->route('admin.nric_codes.index')->withFlashSuccess(trans('alerts.backend.nric_codes.deleted'));
    }
}

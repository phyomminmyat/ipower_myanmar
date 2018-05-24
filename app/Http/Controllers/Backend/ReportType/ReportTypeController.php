<?php

namespace App\Http\Controllers\Backend\ReportType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\ReportType\ReportTypeRepository;
use App\Models\ReportType\ReportType;
use App\Models\Meter\Meter;
use App\Http\Requests\Backend\ReportType\StoreReportTypeRequest;
use App\Http\Requests\Backend\ReportType\ManageReportTypeRequest;
use App\Http\Requests\Backend\ReportType\UpdateReportTypeRequest;

class ReportTypeController extends Controller
{   
    protected $report_type;

    /**
     * @param ReportTypeRepositoryRepository $report_type
     */
    public function __construct(ReportTypeRepository $report_type)
    {
        $this->report_type = $report_type;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.report_type.index')->withReportTypes($this->report_type->getForDataTable()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meters = Meter::all();
    
        return view('backend.report_type.create', compact('meters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportTypeRequest $request)
    {
        $this->report_type->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.report_type.index')->withFlashSuccess(trans('alerts.backend.report_type.created'));
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
     * @param  $report_type
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportType $report_type)
    {
        $meters = Meter::all();

        return view('backend.report_type.edit', compact('meters'))
            ->withReportType($report_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $report_type
     * @return \Illuminate\Http\Response
     */
    public function update(ReportType $report_type, UpdateReportTypeRequest $request)
    {
        $this->report_type->update($report_type,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.report_type.index')->withFlashSuccess(trans('alerts.backend.report_type.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $report_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportType $report_type)
    {
        $this->report_type->delete($report_type);

        return redirect()->route('admin.report_type.index')->withFlashSuccess(trans('alerts.backend.report_type.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $report_type
     * @return \Illuminate\Http\Response
     */
    public function destroyReportType($id)
    {   
        $report_type = ReportType::find($id);

        $this->report_type->delete($report_type);

        return redirect()->route('admin.report_type.index')->withFlashSuccess(trans('alerts.backend.report_type.deleted'));
    }    
}
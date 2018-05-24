<?php

namespace App\Http\Controllers\Backend\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Report\ReportRepository;
use App\Models\Report\Report;
use App\Models\ReportType\ReportType;
use App\Http\Requests\Backend\Report\StoreReportRequest;
use App\Http\Requests\Backend\Report\ManageReportRequest;
use App\Http\Requests\Backend\Report\UpdateReportRequest;

class ReportController extends Controller
{   
    protected $report;

    /**
     * @param ReportRepositoryRepository $report
     */
    public function __construct(ReportRepository $report)
    {
        $this->report = $report;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.report.index')->withReports($this->report->getForDataTable()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $report_types = ReportType::all();
    
        return view('backend.report.create', compact('report_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        $this->report->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.report.index')->withFlashSuccess(trans('alerts.backend.report.created'));
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
     * @param  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $report_types = ReportType::all();

        return view('backend.report.edit', compact('report_types'))
            ->withReport($report);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Report $report, UpdateReportRequest $request)
    {
        $this->report->update($report,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.report.index')->withFlashSuccess(trans('alerts.backend.report.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $this->report->delete($report);

        return redirect()->route('admin.report.index')->withFlashSuccess(trans('alerts.backend.report.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $report
     * @return \Illuminate\Http\Response
     */
    public function destroyReport($id)
    {   
        $report = Report::find($id);

        $this->report->delete($report);

        return redirect()->route('admin.report.index')->withFlashSuccess(trans('alerts.backend.report.deleted'));
    }    
}
<?php

namespace App\Http\Controllers\Backend\Department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Department\DepartmentRepository;

class DepartmentTableController extends Controller
{
    protected $department;

    /**
     * @param DepartmentRepository $department
     */
    public function __construct(DepartmentRepository $department)
    {
        $this->department = $department;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->department->getForDataTable())
            ->addColumn('region', function ($department) {
                return $department->region->region_name;
            })
            ->addColumn('township', function ($department) {
                return $department->township->township_name;
            })
            ->addColumn('district', function ($department) {
                return $department->district->district_name;
            })
            ->addColumn('village', function ($department) {
                return $department->village->village_name;
            })
            ->addColumn('community', function ($department) {
                return $department->community->community_name;
            })
            ->addColumn('actions', function ($department) {
                return $department->action_buttons;
            })
             ->rawColumns(['actions'])
            ->make(true);
    }
}

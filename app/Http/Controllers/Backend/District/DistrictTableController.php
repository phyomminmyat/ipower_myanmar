<?php

namespace App\Http\Controllers\Backend\District;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\District\DistrictRepository;

class DistrictTableController extends Controller
{
    protected $district;

    /**
     * @param DistrictRepository $district
     */
    public function __construct(DistrictRepository $district)
    {
        $this->district = $district;
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->district->getForDataTable())
            ->addColumn('actions', function ($district) {
                return $district->action_buttons;
            })
             ->rawColumns(['actions'])
            ->make(true);
    }
}

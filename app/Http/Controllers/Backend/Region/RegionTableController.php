<?php

namespace App\Http\Controllers\Backend\Region;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Region\RegionRepository;

class RegionTableController extends Controller
{
    protected $region;

    /**
     * @param RegionRepository $region
     */
    public function __construct(RegionRepository $region)
    {
        $this->region = $region;
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->region->getForDataTable())
            ->addColumn('actions', function ($region) {
                return $region->action_buttons;
            })
             ->rawColumns(['actions'])
            ->make(true);
    }
}

<?php

namespace App\Http\Controllers\Backend\VillageTract;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\VillageTract\VillageTractRepository;

class VillageTractTableController extends Controller
{

    protected $village_tract;

    /**
     * @param VillageTractRepository $VillageTract
     */
    public function __construct(VillageTractRepository $village_tract)
    {
        $this->village_tract = $village_tract;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->village_tract->getForDataTable())
            ->addColumn('township', function ($village_tract) {
                return $village_tract->township->township_name;
            })
            ->addColumn('actions', function ($village_tract) {
                return $village_tract->action_buttons;
            })
             ->rawColumns(['actions'])
            ->make(true);
    }
}

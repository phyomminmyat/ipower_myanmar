<?php

namespace App\Http\Controllers\Backend\Meter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Meter\MeterRepository;

class MeterTableController extends Controller
{
    protected $meter;

    /**
     * @param MeterRepository $meter
     */
    public function __construct(MeterRepository $meter)
    {
        $this->meter = $meter;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->meter->getForDataTable($order_by = 'created_at', $sort = 'desc',$request->get('trashed')))
            ->addColumn('owner', function ($meter) {
                return $meter->owner->name;
            })
            ->addColumn('region', function ($meter) {
                return $meter->region->region_name;
            })
            ->addColumn('township', function ($meter) {
                return $meter->township->township_name;
            })
            ->addColumn('district', function ($meter) {
                return $meter->district->district_name;
            })
            ->addColumn('village', function ($meter) {
                return $meter->village->village_name;
            })
            ->addColumn('community', function ($meter) {
                return $meter->community->community_name;
            })
            ->addColumn('actions', function ($meter) {
                return $meter->action_buttons;
            })
             ->rawColumns(['actions'])
            ->make(true);
    }
}

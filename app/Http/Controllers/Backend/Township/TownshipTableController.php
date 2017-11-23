<?php

namespace App\Http\Controllers\Backend\Township;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Township\TownshipRepository;

class TownshipTableController extends Controller
{
    protected $township;

    /**
     * @param TownshipRepository $_township
     */
    public function __construct(TownshipRepository $township)
    {
        $this->township = $township;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->township->getForDataTable())
            ->addColumn('district', function ($township) {
                return $township->district->district_name;
            })
            ->addColumn('actions', function ($township) {
                return $township->action_buttons;
            })
             ->rawColumns(['actions'])
            ->make(true);
    }
}
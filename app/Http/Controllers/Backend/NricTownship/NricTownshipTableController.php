<?php

namespace App\Http\Controllers\Backend\NricTownship;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\NricTownship\NricTownshipRepository;

class NricTownshipTableController extends Controller
{
    protected $nric_township;

    /**
     * @param NricTownshipRepository $nric_township
     */
    public function __construct(NricTownshipRepository $nric_township)
    {
        $this->nric_township = $nric_township;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->nric_township->getForDataTable())
            ->addColumn('actions', function ($nric_township) {
                return $nric_township->action_buttons;
            })
             ->rawColumns(['actions'])
            ->make(true);
    }
}
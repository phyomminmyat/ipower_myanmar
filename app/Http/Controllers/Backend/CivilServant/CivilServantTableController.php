<?php

namespace App\Http\Controllers\Backend\CivilServant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\CivilServant\CivilServantRepository;

class CivilServantTableController extends Controller
{
    protected $civil_servants;

    /**
     * @param CivilServantsRepository $civil_servants
     */
    public function __construct(CivilServantRepository $civil_servants)
    {
        $this->civil_servants = $civil_servants;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->civil_servants->getForDataTable())
            ->addColumn('department', function ($civil_servant) {
                return $civil_servant->department->department_name;
            })
            ->addColumn('nric_code', function ($civil_servant) {
                return $civil_servant->nric_codes->nric_code;
            })
            ->addColumn('actions', function ($civil_servant) {
                return $civil_servant->action_buttons;
            })
             ->rawColumns(['actions'])
            ->make(true);
    }
}
<?php

namespace App\Http\Controllers\Backend\MeterOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\MeterOwner\MeterOwnerRepository;

class MeterOwnerTableController extends Controller
{
    protected $meter_owners;

    /**
     * @param MeterOwnersRepository $meter_owners
     */
    public function __construct(MeterOwnerRepository $meter_owners)
    {
        $this->meter_owners = $meter_owners;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->meter_owners->getForDataTable())
            ->addColumn('nric_township', function ($meter_owner) {
                return $meter_owner->nric_townships->township;
            })
            ->addColumn('nric_code', function ($meter_owner) {
                return $meter_owner->nric_codes->nric_code;
            })
            ->addColumn('actions', function ($meter_owner) {
                return $meter_owner->action_buttons;
            })
             ->rawColumns(['actions','nric_township'])
            ->make(true);
    }
}
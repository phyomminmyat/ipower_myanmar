<?php

namespace App\Http\Controllers\Backend\NricCode;

use Illuminate\Http\Request;
use App\Http\Request\NricCode\ManageNricCodeRequest;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\NricCode\NricCodeRepository;

class NricCodeTableController extends Controller
{
    /**
     * @var NricCodeRepository
     */
    protected $nric_code;

    /**
     * @param NricCodeRepository $nric_code
     */
    public function __construct(NricCodeRepository $nric_code)
    {
        $this->nric_code = $nric_code;
    }

    /**
     * @param ManageNricCodeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageNricCodeRequest $request)
    {
        return Datatables::of($this->nric_code->getForDataTable())
            ->addColumn('actions', function ($nric_code) {
                return $nric_code->action_buttons;
            })
             ->rawColumns(['actions','nric_code'])
            ->make(true);
    }
}


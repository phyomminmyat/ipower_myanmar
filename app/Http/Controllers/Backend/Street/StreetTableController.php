<?php

namespace App\Http\Controllers\Backend\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Community\CommunityRepository;

class CommunityTableController extends Controller
{
    protected $communities;

    /**
     * @param CommunityRepository $communities
     */
    public function __construct(CommunityRepository $communities)
    {
        $this->communities = $communities;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->communities->getForDataTable())
            ->addColumn('village', function ($communities) {
                return $communities->village->village_name;
            })
            ->addColumn('actions', function ($communities) {
                return $communities->action_buttons;
            })
             ->rawColumns(['actions'])
            ->make(true);
    }
}

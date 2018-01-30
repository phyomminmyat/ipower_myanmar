<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Models\Meter\Meter;
/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	$no_of_user = User::where('status',1)->count();

    	$no_of_meter = Meter::count();

    	$no_of_running_meter = Meter::where('status','in-operation')->count();

    	$no_of_disconnect_meter = Meter::where('status','offline')->count();

    	$no_of_to_disconnect_meter = Meter::where('status','reminder')->count();

        return view('backend.dashboard',compact('no_of_user','no_of_meter','no_of_running_meter','no_of_disconnect_meter','no_of_to_disconnect_meter'));
    }
}

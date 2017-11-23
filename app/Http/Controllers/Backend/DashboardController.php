<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
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
   
        return view('backend.dashboard',compact('no_of_user'));
    }
}

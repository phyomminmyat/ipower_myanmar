<?php

namespace App\Http\Controllers\Backend\Community;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Community\CommunityRepository;
use App\Models\VillageTract\VillageTract;
use App\Models\Community\Community;
use App\Http\Requests\Backend\Community\StoreCommunityRequest;
use App\Http\Requests\Backend\Community\ManageCommunityRequest;
use App\Http\Requests\Backend\Community\UpdateCommunityRequest;

class CommunityController extends Controller
{
    protected $communities;

    /**
     * @param CommunityRepository $community
     */
    public function __construct(CommunityRepository $communities)
    {
        $this->communities = $communities;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.communities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villages = VillageTract::all();
       
        return view('backend.communities.create', compact('villages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommunityRequest $request)
    {
        $this->communities->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.communities.index')->withFlashSuccess(trans('alerts.backend.community.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        $villages = VillageTract::all();
        return view('backend.communities.edit', compact('villages'))
            ->withCommunity($community);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Community $community, UpdateCommunityRequest $request)
    {
        $this->communities->update($community,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.communities.index')->withFlashSuccess(trans('alerts.backend.community.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        $this->communities->delete($community);

        return redirect()->route('admin.communities.index')->withFlashSuccess(trans('alerts.backend.community.deleted'));
    }
}

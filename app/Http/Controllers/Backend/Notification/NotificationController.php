<?php

namespace App\Http\Controllers\Backend\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Notification\NotificationRepository;
use App\Models\Notification\Notification;
use App\Models\Street\Street;
use App\Http\Requests\Backend\Notification\StoreNotificationRequest;
use App\Http\Requests\Backend\Notification\ManageNotificationRequest;
use App\Http\Requests\Backend\Notification\UpdateNotificationRequest;

class NotificationController extends Controller
{   
    protected $notification;

    /**
     * @param NotificationRepository $notification
     */
    public function __construct(NotificationRepository $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.notification.index')->withNotifications($this->notification->getForDataTable()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $streets = Street::all();
    
        return view('backend.notification.create', compact('streets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotificationRequest $request)
    {
        $this->notification->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.notification.index')->withFlashSuccess(trans('alerts.backend.notification.created'));
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
     * @param  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        $streets = Street::all();

        return view('backend.notification.edit', compact('streets'))
            ->withNotification($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Notification $notification, UpdateNotificationRequest $request)
    {
        $this->notification->update($notification,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.notification.index')->withFlashSuccess(trans('alerts.backend.notification.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $this->notification->delete($notification);

        return redirect()->route('admin.notification.index')->withFlashSuccess(trans('alerts.backend.notification.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroyNotification($id)
    {   
        $notification = Notification::find($id);

        $this->notification->delete($notification);

        return redirect()->route('admin.notification.index')->withFlashSuccess(trans('alerts.backend.notification.deleted'));
    }    
}
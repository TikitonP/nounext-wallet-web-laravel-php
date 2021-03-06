<?php

namespace App\Http\Controllers\App;

use App\Services\NotificationService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Traits\PaginationTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    use PaginationTrait;

    public function __construct()
    {
        $this->middleware('ajax', ['only' => 'viewed']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param $language
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $language)
    {
        $notifications = Auth::user()->notifications->sortByDesc('created_at');

        foreach($notifications as $notification)
        {
            $notification->viewed = true;
            $notification->save();
        }

        $this->parginate($request, $notifications, 10);
        return view('notifications.index', ['paginationTools' => $this->paginationTools]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $language
     * @param Notification $notification
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, $language, Notification $notification)
    {
        $notification->delete();
        return back();
    }

    public function viewed($language)
    {
        $notificationService = new NotificationService;
        $notifications = $notificationService->getNotifications();

        foreach ($notifications as $notification)
        {
            $notification->viewed = true;
            $notification->save();
        }

        return response()->json();
    }
}

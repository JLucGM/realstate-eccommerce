<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Flash;
use Response;

class NotificationController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');

       
    }
    
    public function index(Request $request)
    {

        $UserNotification = auth()->user()->unreadNotifications;
        return view('notification.index')
            ->with('UserNotification', $UserNotification);
    }
    public function markAsRead(Request $request)
    {

        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    
}

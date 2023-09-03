<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\WebPush;
use App\Models\User;
use Auth;
use Notification;

class PushController extends Controller
{
    /**
     * Store the PushSubscription.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){


        $input = $request->all();
        $this->validate($request,[
            'endpoint'    => 'required',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required'
        ]);


        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        $user = Auth::user();

        $user->updatePushSubscription($endpoint, $key, $token);


        
        return response()->json(['success' => true],200);
    }

    /**
     * Send Push Notifications to all users.
     * 
     * @return \Illuminate\Http\Response
     */
    public function push(){



        $title = "hola junior";
        $body = "estas es la notificacion de prueba";
        $data = ['url' => 'http://www.google.com/'];
        Notification::send(User::all(), new WebPush($title, $body, $data));
        // return view('notification.list');
        // return redirect()->back();
        // return redirect()->route('home');
    }
}

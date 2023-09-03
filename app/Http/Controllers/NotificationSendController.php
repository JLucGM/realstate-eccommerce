<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use Auth;
use DateTime;
use Carbon\Carbon;

class NotificationSendController extends Controller
{

    public function updateDeviceToken(Request $request)
    {
        Auth::user()->device_token =  $request->token;
        
        Auth::user()->save();
        
        return response()->json(['Token successfully stored.']);
        
        
    }
    
    public function sendNotification(Request $request)
    {
             // save data
        $notification = new Notification();
        
        $notification->title = $request->get('title');
        $notification->body = $request->get('body');
        $notification->link = $request->get('link');
        $notification->date = $request->get('date');
        // $notification->image = $request->get('image');
        $notification->icon = $request->get('icon');
        $notification->status = 0;
        
        // if($request->hasFile('image')){
        //     $notification['image']=$request->file('image')->store('uploads', 'public'); //modificamos el archivo para que sea jpg y se guarde en uploads public, antes era un archivo temporal
        // }
        if($request->hasFile('icon')){
            $notification['icon']=$request->file('icon')->store('uploads', 'public'); //modificamos el archivo para que sea jpg y se guarde en uploads public, antes era un archivo temporal
        }
        $notification->save();

        
        
        
        return redirect('notification/list');
    }

    

    public function listNotification(){
       
        $datos = Notification::paginate(10);
        return view('notification.list', ['datos' => $datos]);

    }

    public function newNotification(){

        return view('notification.new');
    }

}


// se toma la fecha programada
        // $date = $request->get('date');
        // $date = $date->format('Y-m-d');
        // $date = new Carbon($date);
        // $date = $date->format('Y-m-d H:i');

        // se toma la fecha local actual
        // $now = new \DateTime();
        // $now = $now->format('Y-m-d H:i');
        // dd($date, $now);
        
        // dd($now);

        // comprueba que la fecha de publicacion coincida con la fecha actual
        // if($now === $date ){
            
        // dd($date);
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Notification;
use App\Notifications\WebPush;

// use App\Notifications;

use Carbon\Carbon;
use Notification as Notification2;

class sendNotification extends Command
{

    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'comando para lanzar notificaciones push';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $users = User::all();
        $datos = Notification::where('status', 0)->get(); 
        // echo ($datos[1]->icon);
        foreach ($datos as $dato) { 
            
            // fecha programada
            $dat = $dato->date;
            $dat = new Carbon($dat);
            $dat = $dat->format('Y-m-d H:i');
            
            // fecha actual
            $now = new Carbon();
            $now = $now->format('Y-m-d H:i');
            echo($now);

            
                // if ($dat === $now) {
                    
                $title = $dato->title;
                $body = $dato->body;
                $icon = $dato->icon;
                $data = ['url' => $dato->link];
                Notification2::send(User::all(), new WebPush($title, $body, $icon, $data));
             
                   
                $dato->status = 1;
                $dato->save();
                // }else{
                //     echo("no se envio la notificacion");
                // }


        }//cierra foreach1
    }//cierra metodo
}

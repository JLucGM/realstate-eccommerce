<?php

namespace App\Http\Controllers;

use App\Mail\NuevoMensaje;
use App\Models\TicketChat;
use App\Models\User;
use App\Events\Mensaje\NuevoMensajeEvent;


use App\Models\MensajesSoporte;

use Illuminate\Http\Request;

use Mail;

/**
 * Class TicketChatController
 * @package App\Http\Controllers
 */
class TicketChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketChats = TicketChat::paginate();

        return view('ticket-chat.index', compact('ticketChats'))
            ->with('i', (request()->input('page', 1) - 1) * $ticketChats->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticketChat = new TicketChat();
        return view('ticket-chat.create', compact('ticketChat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    

    public function store(Request $request)
    {
        $input = $request->all();
        $mensajeSoporte = MensajesSoporte::find($input['mensajes_soporte_id']);

        if(auth()->user()->hasRole('super Admin|Vendedor|Arrendador|Admin'))
        {
        $input['sender_id'] = auth()->user()->id;
        $input['receiver_id'] = $mensajeSoporte->contactoUser->user->id;
        $input['mensajes_soporte_id'] = $mensajeSoporte->id;

    //    Mail::to($mensajeSoporte->contactoUser->user->email)->send(new NuevoMensaje($mensajeSoporte->contactoUser->user,$input['mensaje']));


        }else{

         

        $input['sender_id'] = $mensajeSoporte->contactoUser->user->id;
        if(isset($mensajeSoporte->asignado_id))
        {

        $input['receiver_id'] = $mensajeSoporte->asignado_id;




        }else{


            $user = User::role('super Admin')->get()->first();

        $input['receiver_id'] = $user->id;


        }
        $input['mensajes_soporte_id'] = $mensajeSoporte->id;


            
        }

        $user = User::find($input['receiver_id']);
      


        $ticketChat = TicketChat::create($input);

        event(new NuevoMensajeEvent($user,$ticketChat));


        return redirect()->back()
            ->with('success', 'TicketChat created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticketChat = TicketChat::find($id);

        return view('ticket-chat.show', compact('ticketChat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticketChat = TicketChat::find($id);

        return view('ticket-chat.edit', compact('ticketChat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TicketChat $ticketChat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketChat $ticketChat)
    {
        request()->validate(TicketChat::$rules);

        $ticketChat->update($request->all());

        return redirect()->route('ticket-chats.index')
            ->with('success', 'TicketChat updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ticketChat = TicketChat::find($id)->delete();

        return redirect()->route('ticket-chats.index')
            ->with('success', 'TicketChat deleted successfully');
    }
}

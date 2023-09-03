<?php

namespace App\Http\Controllers;

use App\Models\MensajesSoporte;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Contacto;
use App\Models\TicketChat;
use App\Models\User;


/**
 * Class MensajesSoporteController
 * @package App\Http\Controllers
 */
class MensajesSoporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('super Admin'))
        {
            
        $mensajesSoportes = MensajesSoporte::paginate();

    


        }elseif(auth()->user()->hasRole('Vendedor|Arrendador'))
        {
        $mensajesSoportes = MensajesSoporte::where('asignado_id',auth()->user()->id)->paginate();
     
        }elseif(auth()->user()->hasRole('cliente'))
        {
        $contacto = Contacto::where('user_id',auth()->user()->id)->get()->first();

        $mensajesSoportes = MensajesSoporte::where('contacto_id',$contacto->id)->paginate();


        }

        return view('mensajes-soporte.index', compact('mensajesSoportes'))
            ->with('i', (request()->input('page', 1) - 1) * $mensajesSoportes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $products = Product::all()->pluck('name','id');
        $contactos = Contacto::all()->pluck('name','id');
        $mensajesSoporte = new MensajesSoporte();
        $asignado = User::whereHas("roles", function($q){ $q->where("name", "Arrendador")->orWhere("name",'Vendedor'); })->pluck('name','id');




       
        return view('mensajes-soporte.create', compact('mensajesSoporte','products','contactos','asignado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MensajesSoporte::$rules);
        $request['estadoticket'] ="En Proceso";

        $mensajesSoporte = MensajesSoporte::create($request->all());

        return redirect()->route('mensajes-soportes.index')
            ->with('success', 'MensajesSoporte created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensajesSoporte = MensajesSoporte::find($id);
        $mensajes = TicketChat::where('mensajes_soporte_id',$id)->get();

        $user= User::find(\auth()->user()->id);

        return view('mensajes-soporte.show', compact('mensajesSoporte','mensajes','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all()->pluck('name','id');
        $contactos = Contacto::all()->pluck('name','id');
        $mensajesSoporte = MensajesSoporte::find($id);

        $asignado = User::whereHas("roles", function($q){ $q->where("name", "Arrendador")->orWhere("name",'Vendedor'); })->pluck('name','id');



        return view('mensajes-soporte.edit', compact('mensajesSoporte','products','contactos','asignado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MensajesSoporte $mensajesSoporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MensajesSoporte $mensajesSoporte)
    {
        request()->validate(MensajesSoporte::$rules);

        $mensajesSoporte->update($request->all());

        return redirect()->route('mensajes-soportes.index')
            ->with('success', 'MensajesSoporte updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mensajesSoporte = MensajesSoporte::find($id)->delete();

        return redirect()->route('mensajes-soportes.index')
            ->with('success', 'MensajesSoporte deleted successfully');
    }
}

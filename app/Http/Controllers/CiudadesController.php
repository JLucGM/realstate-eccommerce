<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Http\Requests\StoreCiudadesRequest;
use App\Http\Requests\UpdateCiudadesRequest;
use App\Models\Estado;
use Symfony\Component\HttpFoundation\Request;

class CiudadesController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.ciudades.index')->only('index');
        $this->middleware('can:admin.ciudades.create')->only('create','store');
        $this->middleware('can:admin.ciudades.edit')->only('edit','update');
        $this->middleware('can:admin.ciudades.delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $ciudades = Ciudades::all();
        // // $ciudades = Ciudades::with('estados')->get();
        // // $nombreEstado = $ciudades->estados->nombre;

        // // dd($nombreEstado);

        // foreach ($ciudades as $ciudad) {
        //     $nombreEstado = $ciudad->estado_id;
        //     dd($nombreEstado);
        // }
        
        return view('ciudades.index', compact('ciudades'))->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudad = new Ciudades();
        $estados = Estado::all();

        $message="";
        return view('ciudades.add')->with('message',$message)->with('estados',$estados)->with('ciudad',$ciudad);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCiudadesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Ciudades::$rules);

        $city = new Ciudades;

    

        $city->name = $request->name;
        // $city->status = $request->status;
        $city->estado_id = $request->estado_id;


       
        $city->save();
        $message = "Nuevo elemento creado correctamente";
        return redirect(route('city.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function show(Ciudades $ciudades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciudades $ciudades, $id)
    {
        $city = Ciudades::find($id);
        $estados = Estado::all();

        $message = "";
        return view('ciudades.edit')->with('city',$city)->with('estados',$estados)->with('message',$message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCiudadesRequest  $request
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = Ciudades::find($id);
        $estados = Estado::all();

        $city->name = $request->name;
        $city->estado_id= $request->estado_id;

        $city->save();
        
        $message = "Datos actualizados correctamente";
        return view('ciudades.edit')->with('city',$city)->with('message',$message)->with('estados',$estados);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */


        public function ciudadDelete($id)
    {
        
        $city = Ciudades::find($id);
        $city->delete(); 
        $message = "Eliminado con exito";
        return redirect()->route('city.index');
    }
}

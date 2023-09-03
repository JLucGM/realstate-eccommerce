<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Http\Requests\StoreCiudadesRequest;
use App\Http\Requests\UpdateCiudadesRequest;
use Symfony\Component\HttpFoundation\Request;

class CiudadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = Ciudades::all();        
        return view('ciudades.index')->with('ciudades',$ciudades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message="";
        return view('ciudades.add')->with('message',$message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCiudadesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = new Ciudades;

    

        $city->name = $request->name;
        $city->status = $request->status;


       
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
        $message = "";
        return view('ciudades.edit')->with('city',$city)->with('message',$message);
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

        $city->name = $request->name;
        $city->status= $request->status;


        $city->save();
        $message = "Datos actualizados correctamente";
        return view('ciudades.edit')->with('city',$city)->with('message',$message);
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

<?php

namespace App\Http\Controllers;

use App\Models\TipoPropiedad;
use App\Http\Requests\StoreTipoPropiedadRequest;
use App\Http\Requests\UpdateTipoPropiedadRequest;

class TipoPropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoPropiedadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoPropiedadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoPropiedad  $tipoPropiedad
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPropiedad $tipoPropiedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoPropiedad  $tipoPropiedad
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPropiedad $tipoPropiedad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoPropiedadRequest  $request
     * @param  \App\Models\TipoPropiedad  $tipoPropiedad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoPropiedadRequest $request, TipoPropiedad $tipoPropiedad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoPropiedad  $tipoPropiedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPropiedad $tipoPropiedad)
    {
        //
    }
}

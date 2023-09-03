<?php

namespace App\Http\Controllers;

use App\Models\Monedas;
use App\Http\Requests\StoreMonedasRequest;
use App\Http\Requests\UpdateMonedasRequest;

class MonedasController extends Controller
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
     * @param  \App\Http\Requests\StoreMonedasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonedasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monedas  $monedas
     * @return \Illuminate\Http\Response
     */
    public function show(Monedas $monedas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monedas  $monedas
     * @return \Illuminate\Http\Response
     */
    public function edit(Monedas $monedas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonedasRequest  $request
     * @param  \App\Models\Monedas  $monedas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonedasRequest $request, Monedas $monedas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monedas  $monedas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monedas $monedas)
    {
        //
    }
}

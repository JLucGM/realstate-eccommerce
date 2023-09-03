<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use App\Http\Requests\StoreAmenitiesRequest;
use App\Http\Requests\UpdateAmenitiesRequest;

class AmenitiesController extends Controller
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
     * @param  \App\Http\Requests\StoreAmenitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAmenitiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function show(Amenities $amenities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function edit(Amenities $amenities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAmenitiesRequest  $request
     * @param  \App\Models\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAmenitiesRequest $request, Amenities $amenities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenities $amenities)
    {
        //
    }
}

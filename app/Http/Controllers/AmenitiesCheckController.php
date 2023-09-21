<?php

namespace App\Http\Controllers;

use App\Models\AmenitiesCheck;
use App\Models\Amenities;

use Illuminate\Http\Request;

use App\Http\Requests\StoreAmenitiesCheckRequest;
use App\Http\Requests\UpdateAmenitiesCheckRequest;

class  AmenitiesCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $amenitiesChecks = AmenitiesCheck::paginate();

        return view('amenities-check.index', compact('amenitiesChecks'))
            ->with('i', (request()->input('page', 1) - 1) * $amenitiesChecks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $amenitiesCheck = new AmenitiesCheck();
       $amenities = Amenities::all()->pluck('name','id');
        return view('amenities-check.create', compact('amenitiesCheck','amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAmenitiesCheckRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAmenitiesCheckRequest $request)
{
    $amenitiesCheck = new AmenitiesCheck;

    $amenitiesCheck->name = $request->name;
    $amenitiesCheck->status = $request->amenities_id;
    $amenitiesCheck->icon = $request->icon;

    $amenitiesCheck->save();

    return redirect()->route('amenities-checks.index')
        ->with('success', 'Amenities Check created successfully');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AmenitiesCheck  $amenitiesCheck
     * @return \Illuminate\Http\Response
     */
    public function show(AmenitiesCheck $amenitiesCheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AmenitiesCheck  $amenitiesCheck
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $amenitiesCheck = AmenitiesCheck::find($id);
       $amenities = Amenities::all()->pluck('name','id');

         return view('amenities-check.edit',compact('amenitiesCheck','amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAmenitiesCheckRequest  $request
     * @param  \App\Models\AmenitiesCheck  $amenitiesCheck
     * @return \Illuminate\Http\Response
     */
   

     public function update(UpdateAmenitiesCheckRequest $request, AmenitiesCheck $amenitiesCheck)
{
    $amenitiesCheck->update($request->all());

    return redirect()->route('amenities-checks.index')
        ->with('success', 'Amenities Check updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AmenitiesCheck  $amenitiesCheck
     * @return \Illuminate\Http\Response
     */
    public function destroy(AmenitiesCheck $amenitiesCheck)
{
    $amenitiesCheck->delete();

    return redirect()->route('amenities-checks.index')
        ->with('success', 'Amenities Check deleted successfully');
}
}

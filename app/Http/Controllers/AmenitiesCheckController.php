<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use App\Models\AmenitiesCheck;
use Illuminate\Http\Request;

/**
 * Class AmenitiesCheckController
 * @package App\Http\Controllers
 */
class AmenitiesCheckController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.amenities-checks.index')->only('index');
        $this->middleware('can:admin.amenities-checks.create')->only('create','store');
        $this->middleware('can:admin.amenities-checks.edit')->only('edit','update');
        $this->middleware('can:admin.amenities-checks.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenitiesChecks = AmenitiesCheck::all();

        return view('amenities-check.index', compact('amenitiesChecks'))
            ->with('i', (request()->input('page', 1) - 1) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenitiesCheck = new AmenitiesCheck();
        $amenities = Amenities::all();
        return view('amenities-check.create', compact('amenitiesCheck','amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AmenitiesCheck::$rules);

        $amenitiesCheck = AmenitiesCheck::create($request->all());

        return redirect()->route('amenities-checks.index')
            ->with('success', 'AmenitiesCheck created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $amenitiesCheck = AmenitiesCheck::find($id);

        return view('amenities-check.show', compact('amenitiesCheck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $amenitiesCheck = AmenitiesCheck::find($id);
        $amenities = Amenities::all();


        return view('amenities-check.edit', compact('amenitiesCheck','amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AmenitiesCheck $amenitiesCheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AmenitiesCheck $amenitiesCheck)
    {
        request()->validate(AmenitiesCheck::$rules);

        $amenitiesCheck->update($request->all());

        return redirect()->route('amenities-checks.index')
            ->with('success', 'AmenitiesCheck updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $amenitiesCheck = AmenitiesCheck::find($id)->delete();

        return redirect()->route('amenities-checks.index')
            ->with('success', 'AmenitiesCheck deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use App\Http\Requests\StoreSeoRequest;
use App\Http\Requests\UpdateSeoRequest;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo = Seo::find(1);
        $message = "";
        return view('seo.seoEdit')->with('seo',$seo)->with('message', $message);
    }

    public function seoUpdate(Request $request, $id)
    {

        $seo = Seo::find($id);
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keywords = $request->keywords;
        $seo->google_analytics = $request->google_analytics;
        $seo->copyright = $request->copyright;
        $seo->telefono = $request->telefono;
        $seo->whatsapp = $request->whatsapp;

        if($request->hasFile('image')){
        $file = $request->file('image');
        $filepath = "img/seo/";
        $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $filename = "favicon.".$extension;
        $uploadSucess = $request->file('image')->move($filepath, $filename);
        $seo->favicon = $filename;
        }
        $seo->save();
        
        $message = "Datos cargados correctamente";
        return view('seo.seoEdit')->with('seo',$seo)->with('message', $message);
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
     * @param  \App\Http\Requests\StoreSeoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function show(Seo $seo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function edit(Seo $seo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeoRequest  $request
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeoRequest $request, Seo $seo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seo $seo)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\StartPOPUP;
use App\Http\Requests\StoreStartPOPUPRequest;
use App\Http\Requests\UpdateStartPOPUPRequest;
use Symfony\Component\HttpFoundation\Request;

class StartPOPUPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pop = StartPOPUP::find(1);
        $message="";
        return view('popup.edit')->with('pop',$pop)->with('message',$message);
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
     * @param  \App\Http\Requests\StoreStartPOPUPRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStartPOPUPRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StartPOPUP  $startPOPUP
     * @return \Illuminate\Http\Response
     */
    public function show(StartPOPUP $startPOPUP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StartPOPUP  $startPOPUP
     * @return \Illuminate\Http\Response
     */
    public function edit(StartPOPUP $startPOPUP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStartPOPUPRequest  $request
     * @param  \App\Models\StartPOPUP  $startPOPUP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $pop = StartPOPUP::find(1);
        $pop->header = $request->header; 
        $pop->body = $request->body; 
        $pop->footer = $request->footer;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filepath = "img/pop/";
            $url = public_path($filepath.$pop->image);
            unlink($url);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename = "pop.".$extension;
            $uploadSucess = $request->file('image')->move($filepath, $filename);
            $pop->image = $filename;
            }
            $pop->save();
        $message="Los datos han sido actulizados";
        return view('popup.edit')->with('pop',$pop)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StartPOPUP  $startPOPUP
     * @return \Illuminate\Http\Response
     */
    public function destroy(StartPOPUP $startPOPUP)
    {
        //
    }
}

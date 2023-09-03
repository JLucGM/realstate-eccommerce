<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Http\Requests\StoreCategoriasRequest;
use App\Http\Requests\UpdateCategoriasRequest;
use Symfony\Component\HttpFoundation\Request;
class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorias::all();
        return view('categorias.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message="";
        return view('categorias.add')->with('message',$message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Categorias;

        $cat->name = $request->name;
        $cat->status = $request->status;


      
        $cat->save();
        $message = "Nuevo elemento creado correctamente";
        return redirect(route('cat.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categorias::find($id);
        $message = "";
        return view('categorias.edit')->with('cat',$categories)->with('message',$message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriasRequest  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Categorias::find($id);

        $cat->name = $request->name;
        $cat->status = $request->status;


     
        $cat->save();
        $message = "Datos actualizados correctamente";
        return view('categorias.edit')->with('cat',$cat)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function categoriaDelete($id)
    {
        
        $cat = Categorias::find($id);
        $cat->delete(); 
        $message = "Eliminado con exito";
        return redirect()->route('cat.index');
    }
}

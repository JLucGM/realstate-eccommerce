<?php

namespace App\Http\Controllers;

use App\Models\Sub_categorias;
use App\Http\Requests\StoreSub_categoriasRequest;
use App\Http\Requests\UpdateSub_categoriasRequest;
use Symfony\Component\HttpFoundation\Request;
class SubCategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Sub_categorias::all();
        return view('subcategorias.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message="";
        return view('subcategorias.add')->with('message',$message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSub_categoriasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Sub_categorias;

        $cat->name = $request->name;

        if($request->status == null)
        {
            $cat->status = 0;
        }
        if($request->status == "on")
        {
            $cat->status = 1;
        }
        $cat->save();
        $message = "Nuevo elemento creado correctamente";
        return redirect(route('subcat.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sub_categorias  $sub_categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_categorias $sub_categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sub_categorias  $sub_categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $categories = Sub_categorias::find($id);
        $message = "";
        return view('subcategorias.edit')->with('subcat',$categories)->with('message',$message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSub_categoriasRequest  $request
     * @param  \App\Models\Sub_categorias  $sub_categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Sub_categorias::find($id);

        $cat->name = $request->name;

        if($request->status == null)
        {
            $cat->status = 0;
        }
        if($request->status == "on")
        {
            $cat->status = 1;
        }
        $cat->save();
        $message = "Datos actualizados correctamente";
        return view('subcategorias.edit')->with('subcat',$cat)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sub_categorias  $sub_categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_categorias $sub_categorias)
    {
        //
    }
}

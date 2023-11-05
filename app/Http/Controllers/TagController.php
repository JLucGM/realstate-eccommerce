<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.delete')->only('destroy');
    }
    
    public function index()
    {

        $tags = Tag::all();
       return view('tags.index',compact('tags'))->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $colors = [
            'blue'=>'color azul',
            'yellow'=>'color amarillo',
            'purple'=> 'color morado',
            'pink'=> 'color rosado',
            'green'=> 'color verde',
            'red'=> 'color rojo',
            'indigo'=> 'color indigo'];

            return view('tags.create',compact('colors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:tags',
            'color'=> ' required'

        ]);

       $tag= Tag::create($request->all());

         return redirect()->route('tags.index')->with('info','La etiqueta fue creada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('tags.show',compact('tag'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {

        $colors = [
            'primary'=>'color azul',
            'warning'=>'color amarillo',
            'pink'=> 'color rosado',
            'success'=> 'color verde',
            'danger'=> 'color rojo',
            'info'=> 'color indigo'];

        return view('tags.edit',compact('tag','colors'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=> 'required',
            'slug'=> "required|unique:tags,slug,$tag->id",
            'color'=> ' required'

        ]);

        $tag->update($request->all());

        return redirect()->route('tags.index')->with('info','etiqueta actualizada exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('info','La etiqueta fue elimina con exito');
    }
}

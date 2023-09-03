<?php

namespace App\Http\Controllers;

use App\Models\Testimonio;
use Illuminate\Http\Request;

/**
 * Class TestimonioController
 * @package App\Http\Controllers
 */
class TestimonioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonios = Testimonio::paginate();

        return view('testimonio.index', compact('testimonios'))
            ->with('i', (request()->input('page', 1) - 1) * $testimonios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testimonio = new Testimonio();
        return view('testimonio.create', compact('testimonio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Testimonio::$rules);
        $input = $request->all();


          if($request['image'])
        {
            $file = $request->file('image');
            $filepath = "image/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('image')->move($filepath, $filename);
            $input['image'] = $filename;
        }

        $testimonio = Testimonio::create($input);

        return redirect()->route('testimonios.index')
            ->with('success', 'Testimonio creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonio = Testimonio::find($id);

        return view('testimonio.show', compact('testimonio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonio = Testimonio::find($id);

        return view('testimonio.edit', compact('testimonio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Testimonio $testimonio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonio $testimonio)
    {
        request()->validate(Testimonio::$rules);

        $testimonio->update($request->all());

        return redirect()->route('testimonios.index')
            ->with('success', 'Testimonio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $testimonio = Testimonio::find($id)->delete();

        return redirect()->route('testimonios.index')
            ->with('success', 'Testimonio deleted successfully');
    }
}

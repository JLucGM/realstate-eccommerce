<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Paises;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.paises.index')->only('index');
        $this->middleware('can:admin.paises.create')->only('create', 'store');
        $this->middleware('can:admin.paises.edit')->only('edit', 'update');
        $this->middleware('can:admin.paises.delete')->only('destroy');
    }
    public function index()
    {
        $paises = Paises::all();
        return view('paises.index', compact('paises'))->with('i', (request()->input('page', 1) - 1));
    }

    public function show($id)
    {
        $pais = Paises::find($id);

        return view('paises.show', compact('pais'));
    }

    public function create()
    {
        $pais = new Paises();
        return view('paises.create', compact('pais'));
    }

    public function store(Request $request)
    {
        request()->validate(Paises::$rules);

        Paises::create($request->all());
        return redirect()->route('paises.index');
    }

    public function edit($id)
    {
        $pais = Paises::find($id);
        return view('paises.edit', compact('pais'));
    }

    public function update(Request $request, Paises $pais, $id)
{
    $pais = Paises::find($id);
    $pais->update($request->all());

    return redirect()->route('paises.index')
        ->with('success', 'Contacto updated successfully');
}


    public function destroy($id)
    {
        Paises::find($id)->delete();
        return redirect()->route('paises.index');
    }
}

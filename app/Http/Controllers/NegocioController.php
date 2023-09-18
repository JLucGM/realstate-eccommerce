<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use App\Models\Product;
use App\Models\Contacto;
use App\Models\SettingGeneral;
use App\Models\User;



use Illuminate\Http\Request;

/**
 * Class NegocioController
 * @package App\Http\Controllers
 */
class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $negocios = Negocio::paginate();
        $SettingGeneral = SettingGeneral::first();
// dd($settingGeneral);
        return view('negocio.index', compact('negocios','SettingGeneral'))
            ->with('i', (request()->input('page', 1) - 1) * $negocios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $negocio = new Negocio();
        $contactos = Contacto::all()->pluck('name','id');
        $propiedades = Product::all()->pluck('name','id');

       $agente =  User::whereHas("roles", function($q){ $q->where("name", "Arrendador")->orWhere("name",'Vendedor'); })->pluck('name','id');

        
   


        return view('negocio.create', compact('negocio','contactos','propiedades','agente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Negocio::$rules);
// dd($request);
        $negocio = Negocio::create($request->all());

        return redirect()->route('negocios.index')
            ->with('success', 'Negocio creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $negocio = Negocio::find($id);

        return view('negocio.show', compact('negocio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $negocio = Negocio::find($id);
        $contactos = Contacto::all()->pluck('name','id');
        $propiedades = Product::all()->pluck('name','id');
        $agente =  User::whereHas("roles", function($q){ $q->where("name", "Arrendador")->orWhere("name",'Vendedor'); })->pluck('name','id');

        return view('negocio.edit', compact('negocio','contactos','propiedades','agente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Negocio $negocio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Negocio $negocio)
    {
        request()->validate(Negocio::$rules);

        $negocio->update($request->all());

        return redirect()->route('negocios.index')
            ->with('success', 'Negocio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $negocio = Negocio::find($id)->delete();

        return redirect()->route('negocios.index')
            ->with('success', 'Negocio deleted successfully');
    }


       public function negocioStatus($status,$negocioId)
    {
        $negocio = Negocio::find($negocioId);
        
     
            $negocio->status = $status;
      
      
      

      

        $negocio->save();

        return redirect()->back();

        
    }
}

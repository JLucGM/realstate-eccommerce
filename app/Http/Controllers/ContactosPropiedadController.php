<?php

namespace App\Http\Controllers;

use App\Models\ContactosPropiedad;
use App\Models\Product;
use App\Models\TipoPropiedad;
use Illuminate\Http\Request;
use App\Models\SettingGeneral;



/**
 * Class ContactosPropiedadController
 * @package App\Http\Controllers
 */
class ContactosPropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $contactosPropiedads = ContactosPropiedad::where('contacto_id',$id)->paginate();

        

        $contactosPropiedad = new ContactosPropiedad();
        $product = Product::all()->pluck('name','id');

        return view('contactos-propiedad.index', compact('contactosPropiedads','contactosPropiedad','id'))
            ->with('i', (request()->input('page', 1) - 1) * $contactosPropiedads->perPage())->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactosPropiedad = new ContactosPropiedad();
        return view('contactos-propiedad.create', compact('contactosPropiedad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ContactosPropiedad::$rules);

        $contactosPropiedad = ContactosPropiedad::create($request->all());

        return redirect()->route('contactos-propiedad.index',$request->contacto_id)
            ->with('success', 'ContactosPropiedad created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactosPropiedad = ContactosPropiedad::find($id);

        return view('contactos-propiedad.show', compact('contactosPropiedad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactosPropiedad = ContactosPropiedad::find($id);

        return view('contactos-propiedad.edit', compact('contactosPropiedad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ContactosPropiedad $contactosPropiedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactosPropiedad $contactosPropiedad)
    {
        request()->validate(ContactosPropiedad::$rules);

        $contactosPropiedad->update($request->all());

        return redirect()->route('contactos-propiedads.index')
            ->with('success', 'ContactosPropiedad updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contactosPropiedad = ContactosPropiedad::find($id)->delete();

        return redirect()->route('contactos-propiedads.index')
            ->with('success', 'ContactosPropiedad deleted successfully');
    }

    public function contactoWeb()
    {
        $productFooter = Product::with(['media'])->get()->take(3);
        $tipoPropiedad = TipoPropiedad::get()->take(7);

        $setting =  SettingGeneral::first();

        return view('frontend.Contacto')->with('productFooter', $productFooter)
        ->with('tipoPropiedad', $tipoPropiedad)
        ->with('setting', $setting);

    }
}

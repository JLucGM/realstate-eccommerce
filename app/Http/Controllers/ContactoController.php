<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\User;

use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;

/**
 * Class ContactoController
 * @package App\Http\Controllers
 */
class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('super Admin'))
        {
        $contactos = Contacto::paginate();

        }else
        {
        $contactos = Contacto::where('vendedorAgente_id',auth()->user()->id)->paginate();

        }
     

 
        return view('contacto.index', compact('contactos'))
            ->with('i', (request()->input('page', 1) - 1) * $contactos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacto = new Contacto();
        return view('contacto.create', compact('contacto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Contacto::$rules);
        $input= $request->all();
        $user = new User();
        $user->name = $request['name'];
        $user->last_name = $request['apellido'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['telefonoContacto1']);
        $user->save();
        $user->assignRole('cliente');
        $input['user_id'] = $user->id;

        $input['vendedorAgente_id'] = auth()->user()->id;

        $contacto = Contacto::create($input);

       




        return redirect()->route('contactos.index')
            ->with('success', 'Contacto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacto = Contacto::find($id);

        return view('contacto.show', compact('contacto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contacto::find($id);

        return view('contacto.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contacto $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        request()->validate(Contacto::$rules);

        $contacto->update($request->all());

        return redirect()->route('contactos.index')
            ->with('success', 'Contacto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contacto = Contacto::find($id)->delete();

        return redirect()->route('contactos.index')
            ->with('success', 'Contacto deleted successfully');
    }
}

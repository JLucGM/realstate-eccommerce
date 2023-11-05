<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Contacto;
use App\Models\Estado;
use App\Models\Paises;
use App\Models\User;

use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

/**
 * Class ContactoController
 * @package App\Http\Controllers
 */
class ContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.contactos.index')->only('index');
        $this->middleware('can:admin.contactos.create')->only('create','store');
        $this->middleware('can:admin.contactos.edit')->only('edit','update');
        $this->middleware('can:admin.contactos.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('super Admin')) {
            $contactos = Contacto::all();
        } else {
            $contactos = Contacto::where('vendedorAgente_id', auth()->user()->id)->get();
        }



        return view('contacto.index', compact('contactos'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacto = new Contacto();
        $paises = Paises::all();
        $ciudades = Estado::all();
        $estado = Ciudades::all();

        return view('contacto.create', compact('contacto', 'paises','ciudades','estado'));
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
        $input = $request->all();
        $contacto = new Contacto();
        $contacto->name = $request['name'];
        $contacto->apellido = $request['apellido'];
        $contacto->email = $request['email'];
        $contacto->telefonoContacto1 = ($request['telefonoContacto1']);
        $contacto->telefonoContacto2 = ($request['telefonoContacto2']);
        $contacto->origen = ($request['origen']);
        $contacto->status = ($request['status']);
        $contacto->pais = ($request['pais']);
        $contacto->region = ($request['region']);
        $contacto->ciudad = ($request['ciudad']);
        $contacto->direccion = ($request['direccion']);
        $contacto->observaciones = ($request['observaciones']);

        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->apellido;
        $user->email = $request->email;
        $user->whatsapp = $request->telefonoContacto1;
        $user->points = '0';
        $user->password = bcrypt('123456789');

        $role = Role::where('name', 'cliente')->first();
        $user->assignRole($role);
        $user->save();

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
        $paises = Paises::all();
        $ciudades = Estado::all();
        $estado = Ciudades::all();

        return view('contacto.edit', compact('contacto','paises','ciudades','estado'));
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

    public function storeUserContacto(Request $request)
    {
        // METODO PARA FORMULARIO DE CONTACTO DE FFRONTEND.SHOWPRODUCT
        $validatedData = $request->validate([
            'name' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'observaciones' => 'required',
        ]);

        $contacto = new Contacto();
        $contacto->name = $request->name;
        $contacto->apellido = $request->apellido;
        $contacto->email = $request->email;
        $contacto->telefonoContacto1 = $request->telefono;
        $contacto->observaciones = $request->observaciones;
        $contacto->vendedorAgente_id = $request->agente_id;
        $contacto->origen = 'Pagina web';
        $contacto->status = 'Interesado';

        // Asigna otros valores a las columnas restantes si es necesario
        $contacto->save();

        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->apellido;
        $user->email = $request->email;
        $user->whatsapp = $request->telefono;
        $user->points = '0';
        $user->password = bcrypt('123456789');

        $role = Role::where('name', 'cliente')->first();
        $user->assignRole($role);
        $user->save();

        return redirect()->back()->with('success', "Mensaje enviado.");
    }
}

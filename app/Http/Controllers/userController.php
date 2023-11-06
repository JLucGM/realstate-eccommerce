<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Mail\Anunciar\NotificarAdmin;
use App\Mail\Anunciar\NuevoRegistro;
use App\Mail\Contacto\NuevoContacto;

use App\Models\MensajesSoporte;
use App\Models\Contacto;
use App\Models\ContactosPropiedad;

use App\Models\TicketChat;
use Illuminate\Support\Facades\Auth;
use Mail;
use Spatie\Permission\Models\Role;
use SpomkyLabs\Pki\ASN1\Type\Primitive\Real;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:admin.user.index')->only('index');
        $this->middleware('can:admin.user.create')->only('create', 'store');
        $this->middleware('can:admin.user.edit')->only('edit', 'update');
        // $this->middleware('can:admin.user.delete')->only('delete');
    }

    public function index()
    {
        $users = User::all();

        return view('customers.list')->with('users', $users)->with('i', (request()->input('page', 1) - 1));
    }

    public function create()
    {
        $user = new User;
        $roles = Roles::all();
        $message = "";
        return view('customers.newUser')->with('user', $user)->with('roles', $roles)->with('message', $message);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'whatsapp' => 'required|max:255',
            'password' => 'required|min:8',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->whatsapp = $request->whatsapp;
        $user->status = $request->status == "on" ? 1 : 0;
        $user->country_id = 0;
        $user->city_id = 0;
        $user->assignRole($request->rol);

        // AGREGAR AVATAR
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $nombreImagen = $image->getClientOriginalName();
            $image->move(public_path('img/profile'), $nombreImagen);
            $user->avatar = $nombreImagen;
        } else {
            $user->avatar = "default.jpg";
        }

        $user->save();

        return redirect()->route('user.index');
    }



    public function storeUserAnunciar(Request $request)
    {
        $users = User::all();
        $user = new User;
        $user->name = $request->name;
        $user->last_name = "";

        $count = count($users);

        for ($i = 0; $i < $count; $i++) {
            if ($users[$i]->email == $request->email) {
                $message = "El correo ya existe!";
                // mandar atras
                return redirect()->route('propiedad.anunciar')->with('error', "Solicitud rechazada correo en uso");
            }
        }

        // dd("entro");
        $user->email = $request->email;
        $user->password = Hash::make($request->telefono);
        // $user->direccion = $request->direccion;
        $user->whatsapp =  $request->telefono;
        $user->avatar = "default.jpg";
        if ($request->status == null) {
            $user->status = 0;
        }
        if ($request->status == "on") {
            $user->status = 1;
        }

        $user->country_id = 0;
        $user->city_id = 0;
        $user->save();

        $user->assignRole('Vendedor');
        Mail::to($user->email)->send(new NuevoRegistro($user, $request->telefono));
        Mail::to("admin@gmail.com")->send(new NotificarAdmin($user, $request->mensaje));

        return redirect()->back()->with('success', "Solicitud realizada con exito en breve recibira un correo con las indicaciones a seguir");
    }


    public function edit($id) // edit de la vista detail en backend
    {
        $user = User::find($id);
        $roles = Roles::all();
        $message = "";

        return view('customers.detail')->with('user', $user)->with('roles', $roles)->with('message', $message);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $message = "Eliminado con exito";
        return redirect()->route('user.index')->with('success', "Usuario eliminado con exito.");
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->whatsapp = $request->whatsapp;
        $user->email = $request->email;
        $rol = Role::findByName($request->rol);
        $user->syncRoles([$rol]);

        $user->status = $request->filled('status') ? 1 : 0;

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $nombreImagen = $image->getClientOriginalName();
            $image->move(public_path('img/profile'), $nombreImagen);

            $user->avatar = $nombreImagen;
            $user->save();
        }
        $user->save();

        return redirect()->route('user.index')->with('user', $user)->with('success', "Usuario actualizado con exito.");
    }

    public function logout()
    {
        $user = User::all();
        auth()->logout();
        return redirect()->to('/');
    }

    public function profile()
    {
        $user = Auth::user();
        $roles = Roles::all();

        return view('customers.profile', compact('user', 'roles'));
    }
}

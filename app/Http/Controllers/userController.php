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
    }

    //
    // public function indexView()
    // {
    //     $message = "sssss";

    //     // Contador de usuarios
    //     $users = User::all();
    //     $usercount = count($users);
    //     $usercount++;

    //     // Contador de Productos (Propiedades)
    //     $product = Product::all();
    //     $productcount = count($product);
    //     $productcount++;

    //     $user = Auth::user();

    //     // for ($i=0; $i < $count  ; $i++) { 
    //     //     $product[$i]->image = json_decode($product[$i]->image);
    //     // }
    //     return view('/dashboard')->with('message', $message)->with('user', $user)->with('usercount', $usercount)->with('product', $product)->with('productcount', $productcount);
    //     // return view('customers.list');
    // }

    public function usuarioLogin()
    {

        if (auth()->attempt(request(['email', 'password'])) == false) {

            return back()->withErrors([
                'message' => 'Fallo: Correo o contraseña incorrectos'
            ]);
        }
        return redirect()->to('/dashboard');
    }

    public function store(Request $request)
    {
        // dd("entro");
        $users = User::all();
        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;

        $count = count($users);

        for ($i = 0; $i < $count; $i++) {
            if ($users[$i]->email == $request->email) {
                $message = "El correo ya existe!";
                return view('/dashboard')->with('message', $message);
            }
        }

        $user->email = $request->email;
        $request->password = Hash::make($request->password);
        $user->password =  $request->password;
        $user->whatsapp =  $request->whatsapp;
        $user->avatar = "default.jpg";
        $user->status = 1;
        $user->rol = 3;
        $user->country_id = 0;
        $user->city_id = 0;
        $user->points = 0;
        $user->save();

        auth()->login($user);
        return redirect()->to('/');
    }




    public function destroy()
    {
        $user = User::all();
        auth()->logout();
        return redirect()->to('/');
    }

    public function usuarios()
    {
        $users = User::all();
        $users = User::ordenar($users)->paginate(10);
        $roles = Roles::all();

        $count = count($users);
        $count2 = count($roles);

        for ($i = 0; $i < $count; $i++) {
            for ($k = 0; $k < $count2; $k++) {
                if ($users[$i]->rol == $roles[$k]->id) {
                    $users[$i]->rol = $roles[$k]->name;
                }
            }
        }

        return view('customers.list')->with('users', $users);
    }

    public function newUser()
    {
        $user = new User;
        $roles = Roles::all();
        $message = "";
        return view('customers.newUser')->with('user', $user)->with('roles', $roles)->with('message', $message);
    }

    public function storeUser(Request $request)
    {
        $users = User::all();
        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;

        $count = count($users);

        for ($i = 0; $i < $count; $i++) {
            if ($users[$i]->email == $request->email) {
                $message = "El correo ya existe!";
                return view('/Dashboard')->with('message', $message);
            }
        }

        // dd("entro");
        $user->email = $request->email;
        $request->password = Hash::make($request->password);
        $user->password =  $request->password;
        $user->whatsapp =  $request->whatsapp;
        $user->points = 0;

        if ($request->status == "on") {
            $user->status = 1;
        }

        $selectedRole = $request->input('rol');
        $role = Role::where('name', $selectedRole)->first();
        $user->assignRole($role);

        $user->country_id = 0;
        $user->city_id = 0;
        // dd($request->rol);

        // AGREGAR AVATAR
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $nombreImagen = $image->getClientOriginalName();
            $image->move(public_path('img/profile'), $nombreImagen);

            $user->avatar = $nombreImagen;
            $user->save();
        } else {
            $user->avatar = "default.jpg";
            $user->save();
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
        $user->points = 0;
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

//     public function storeUserContacto(Request $request)
//     {
// // Crear un nuevo registro en la tabla "contacto"
// $contacto = new Contacto();
// $contacto->name = $request->name;
// $contacto->apellido = $request->apellido;
// $contacto->email = $request->email;
// $contacto->telefonoContacto1 = $request->telefono;
// $contacto->direccion = $request->direccion;
// $contacto->observaciones = $request->observaciones;
// // Asignar otros valores a las columnas restantes si es necesario

// // Guardar el registro en la base de datos
// $contacto->save();
//         return redirect()->back()->with('success', "Solicitud realizada con exito en breve recibira un correo con las indicaciones a seguir");
//     }

    public function usuariosEdit($id)
    {
        $user = User::find($id);
        $roles = Roles::all();
        $message = "";


        return view('customers.detail')->with('user', $user)->with('roles', $roles)->with('message', $message);
    }

    public function usersDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        $message = "Eliminado con exito";
        return redirect()->route('user.index');
    }

    public function usuariosUpdate(Request $request, $id)
    {

        $roles = Roles::all();
        $user = User::find($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->rol = $request->rol;
        $user->email = $request->email;

        $user->status = $request->filled('status') ? 1 : 0;

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $nombreImagen = $image->getClientOriginalName();
            $image->move(public_path('img/profile'), $nombreImagen);

            $user->avatar = $nombreImagen;
            $user->save();
        }
// dd($user);s
        $user->save();

        $message = "Datos cargados correctamente";
        return redirect()->back()->with('user', $user)->with('roles', $roles)->with('message', $message);
    }


    public function profile()
    {
        $user = Auth::user();
        // dd($user);
        // $message = "Perfil actualizado";
        $roles = Roles::all();
        return view('customers.profile', compact('user', 'roles'));
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\SettingGeneral;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials['status'] = 1; // Agregar la condición de estado activo

    if (Auth::attempt($credentials)) {
        // Autenticación exitosa
        if (Auth::user()->status == 0) {
            // Usuario desactivado
            Auth::logout();
            return back()->withErrors([
                'email' => 'Tu cuenta ha sido desactivada. Por favor, ponte en contacto con el administrador.',
            ]);
        } else {
            return redirect()->intended('/Dashboard');
        }
    } else {
        // Autenticación fallida
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son válidas.',
        ]);
    }
}

    public function logins()
    {
        // $faqs = Faq::all()->where('status', 'Publicar');
        $setting = SettingGeneral::first();

        return view('auth.login')
        // ->with('faqs', $faqs)
        ->with('setting', $setting);

    }

   
    public function logoutInactiveUser()
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Cerrar la sesión en otros dispositivos
            Auth::logoutOtherDevices();
    
            // Cerrar la sesión actual
            Auth::logout();
    
            // Redirigir al usuario a la vista de inicio de sesión
            return redirect()->route('login');
        }
    }
}

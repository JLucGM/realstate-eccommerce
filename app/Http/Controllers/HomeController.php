<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Contacto;
use App\Models\Estado;
use App\Models\Faq;
use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Slide;
use  App\Models\InfoWeb;
use App\Models\Page;
use App\Models\Paises;
use App\Models\Post;
use App\Models\TipoPropiedad;
use  App\Models\User;
use  App\Models\Testimonio;
use  App\Models\SettingGeneral;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::with(['media'])->where('publicar', 1)->latest()->get()->take(9);
        $info = InfoWeb::all()->first();
        $paises = Paises::all();
        $estado = Estado::all();
        $ciudades = Ciudades::all();
        $pages = Page::where('status', 1)->get();

        $vendedorAgente =  User::whereHas("roles", function ($q) {
            $q->where("name", "Arrendador")->orWhere("name", 'Vendedor');
        })->take(3)->get();

        $productsDestacados = Product::with(['media'])->where('destacado', 1)->where('publicar', 1)->latest()->get()->take(9);

        $slides = Slide::latest()->where('active', 1)->take(5)->get();

        $productFooter = Product::with(['media'])->get()->take(3);

        $testimonios = Testimonio::latest()->take(3)->get();
        $tipoPropiedad = TipoPropiedad::get()->take(7);
        $tipoAll = TipoPropiedad::all()->pluck('nombre', 'id');
        $setting = SettingGeneral::first();

        return view('frontend.Home')
            ->with('products', $products)
            ->with('productsDestacados', $productsDestacados)
            ->with('slides', $slides)
            ->with('paises', $paises)
            ->with('estado', $estado)
            ->with('ciudades', $ciudades)
            ->with('info', $info)
            ->with('vendedorAgente', $vendedorAgente)
            ->with('productFooter', $productFooter)
            ->with('tipoPropiedad', $tipoPropiedad)
            ->with('tipoAll', $tipoAll)
            ->with('setting', $setting)
            ->with('pages', $pages)
            ->with('testimonios', $testimonios);
    }

    public function show($id)
    {
        $tipoPropiedad = TipoPropiedad::get()->take(7);

        $product = Product::where('id', $id)->with(['media'])->first();
        $producto = Product::with('usuarios')->find($id); //rescata la informacion de la tabla agentepropiedad
        // $product = Product::find($id);
        $images = json_decode($product->image, false);
        $setting = SettingGeneral::first();
        $paises = Paises::all();
        $ciudades = Ciudades::all();
        $estados = Estado::all();
        $pages = Page::where('status', 1)->get();

        $products = Product::where('tipoPropiedad_id', $product->tipoPropiedad_id)->take(6)->get();
        
        return view('frontend.productShow')
            ->with('product', $product)
            ->with('producto', $producto)
            ->with('products', $products)
            ->with('images', $images)
            ->with('tipoPropiedad', $tipoPropiedad)
            ->with('setting', $setting)
            ->with('paises', $paises)
            ->with('ciudades', $ciudades)
            ->with('estados', $estados)
            ->with('pages', $pages);
    }

    public function indexView()
    {
        $message = "";

        $user = Auth::user();

        // Contador de usuarios
        $users = User::all();
        $usercount = count($users);

        // Contador de Productos (Propiedades)
        $product = Product::latest()->take(20)->get();
        $productcount = Product::count();

        $contactos = Contacto::all();
        $contactocount = Contacto::count();

        $taskcount = Task::where('status', 'Completado')->count();

        $taskPcount = Task::where('status', 'Pendiente')->count();

        $blogcount = Post::count();

        $setting = SettingGeneral::first();

        $posts = Post::latest()->take(20);


        return view('/dashboard')->with('message', $message)
            ->with('contactos', $contactos)
            ->with('blogcount', $blogcount)
            ->with('taskPcount', $taskPcount)
            ->with('taskcount', $taskcount)
            ->with('contactocount', $contactocount)
            ->with('user', $user)
            ->with('usercount', $usercount)
            ->with('product', $product)
            ->with('productcount', $productcount)
            ->with('setting', $setting)
            ->with('posts', $posts);
        // return view('customers.list');
    }
    public function footerIndex()
    {
        $settingFooter = SettingGeneral::first();

        return view('frontend.footer')
            ->with('settingFooter', $settingFooter);
        // return view('customers.list');
    }

    public function faq()
    {
        $faqs = Faq::all()->where('status', 'Publicar');
        $setting = SettingGeneral::first();
        $pages = Page::where('status', 1)->get();

        return view('frontend.faq')
            ->with('faqs', $faqs)
            ->with('pages', $pages)
            ->with('setting', $setting);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Estado;
use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Slide;
use  App\Models\InfoWeb;
use App\Models\Paises;
use App\Models\TipoPropiedad;
use  App\Models\User;
use  App\Models\Testimonio;
use  App\Models\SettingGeneral;






class HomeController extends Controller
{

    public function index()
    {
       $products = Product::with(['media'])->latest()->get()->take(9);  
       $info = InfoWeb::all()->first();
       $paises = Paises::all();
       $estado = Estado::all();
       $ciudades = Ciudades::all();

       $vendedorAgente =  User::whereHas("roles", function($q){ $q->where("name", "Arrendador")->orWhere("name",'Vendedor'); })->take(3)->get();


       $productsDestacados = Product::with(['media'])->get()->take(9);    

        $slides= Slide::latest()
        ->where('active', 1)
        ->take(5)
        ->get();
        $productFooter = Product::with(['media'])->get()->take(3);

         $testimonios= Testimonio::latest()
        ->take(3)
        ->get();

        $tipoPropiedad = TipoPropiedad::get()->take(7);
        $tipoAll = TipoPropiedad::all()->pluck('nombre','id');

        $setting = SettingGeneral::first();

        $max = Product::max('price');
        $min = Product::min('price');

     
     

        return view('frontend.Home')->with('products',$products)
        ->with('productsDestacados',$productsDestacados)
        ->with('slides',$slides)
        ->with('paises',$paises)
        ->with('estado',$estado)
        ->with('ciudades',$ciudades)
        ->with('info',$info)
        ->with('vendedorAgente',$vendedorAgente)
        ->with('productFooter', $productFooter)
        ->with('tipoPropiedad', $tipoPropiedad)
        ->with('tipoAll', $tipoAll)
        ->with('setting', $setting)
        ->with('max', $max)
        ->with('min', $min)
        ->with('testimonios',$testimonios);


    }

    public function show($id){

        $tipoPropiedad = TipoPropiedad::get()->take(7);

        $product = Product::where('id', $id)->with(['media'])->first();


        $setting = SettingGeneral::first();


        $products = Product::where('tipoPropiedad_id', $product->tipoPropiedad_id)->get();
        $productFooter = Product::with(['media'])->get()->take(2);
        return view('frontend.productShow')->with('product', $product)
        ->with('products', $products)
        ->with('tipoPropiedad', $tipoPropiedad)
        ->with('setting', $setting)


        ->with('productFooter', $productFooter);

        

    }
    
}

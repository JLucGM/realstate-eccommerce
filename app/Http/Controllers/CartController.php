<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller
{
    public function shop()
    {
    //     $products = Product::all();
    //    dd($products);
    //     return view('shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        $product = Product::all();
        $count = count($product);
        for ($i=0; $i < $count  ; $i++) { 
            $product[$i]->image = json_decode($product[$i]->image);
        }
        // dd($cartCollection);
        $descuento=0;
        return view('cart')->with(['cartCollection' => $cartCollection])->with('product',$product)->with('descuento',$descuento);
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect(route('cart.index'))->with('success_msg', 'Producto removido!');
    }

    public function add(Request $request){
    //    dd($request);
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
            'image' => $request->image,
            'slug' => $request->slug
            )
        ));
        // dd(\Cart::getContent());
        return redirect(route('cart.index'))->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect(route('cart.index'))->with('success_msg', 'Carrito actualizado');
    }

    public function clear(){
        \Cart::clear();
        return redirect(route('cart.index'))->with('success_msg', 'Carrito limpio');
    }

 

}

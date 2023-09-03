<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use Symfony\Component\HttpFoundation\Request;
use Cart;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cupones = Coupon::all();
        // dd($cupones);
        return view('cupones.cupones')->with('cupones', $cupones);
    }


    public function canjearCupon(Request $request) {
        // is0EGRKB0G
        
        $cupones = Coupon::all();        
        $contar = count($cupones);
       

   if($request->cupon){
    
     for ($i=0; $i < $contar ; $i++) {
      
         if($request->cupon == $cupones[$i]->codigo && $cupones[$i]->active == 1){
          // dd("entro");
          $descuento =  Cart::discount($cupones[$i]->amount,$cupones[$i]->type,$cupones[$i]->active);
          // dd($descuento);
           $cupones[$i]->number_exchange = $cupones[$i]->number_exchange+1;
           $cupones[$i]->save();
           $tipo = $cupones[$i]->type;
           $monto_cupon = $cupones[$i]->amount;
           if($cupones[$i]->number_exchange >= $cupones[$i]->max_change && $cupones[$i]->active == 1){
             // dd("entro");
             $cupones[$i]->active = 0;
             $cupones[$i]->save();
           }

           if($tipo == "porcentage"){
             $tipo = "Porcentaje";
             $monto_cupon = strval($monto_cupon."%");
           }
           if($tipo == "total_amount"){
             $tipo = "Monto";
             $monto_cupon = strval("$".$monto_cupon);
           }
          //  dd("Exito, El cupon: ".$request->cupon."  Se ha agregado correctamente");
           $message = "Exito, El cupon: ".$request->cupon."  Se ha agregado correctamente";
           $code_cupon = $request->cupon;
           
           // "id" => 1
           // "name" => "Probando cupon"
           // "codigo" => "is0EGRKB0G"
           // "max_change" => 10
           // "max_change_user" => 2
           // "start_day" => "2022-04-01 12:33:09"
           // "final_day" => "2022-04-09 10:06:01"
           // "number_exchange" => 0
           // "active" => 1
           // "amount" => 50.0
           // "type" => "porcentage"
           // "products_id" => null
           // "created_at" => "2022-04-01 10:07:36"
           // "updated_at" => "2022-04-01 12:33:15"
          //  VARIABLES EXTRAS SOLO PARA QUE FUNCIONE EL BACKEND DONDE SE ENCUENTRA EL FORM DE CUPONES POR EL MOMENTO
          // $count
          $hola = 1;
          $product = Product::all();
          $count = count($product);
          for ($i=0; $i < $count  ; $i++) { 
              $product[$i]->image = json_decode($product[$i]->image);
          }

           return view('cart')->with('product',$product)->with('tipo',$tipo)->with('message',$message)->with('tipo', $tipo)->with('monto_cupon',$monto_cupon)->with('code_cupon',$code_cupon)->with('count', $hola)->with('descuento', $descuento);
         }
     }

    
   }
 }


 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cuponEdit($id)
    {
      $cupon = Coupon::find($id);
      $message = "";
      $cupon->start_day = date("d-m-Y", strtotime($cupon->start_day));
      $cupon->final_day = date("d-m-Y", strtotime($cupon->final_day));
      // dd($cupon->final_day);
      // dd(date("d/m/Y", strtotime($cupon->start_day)));
      return view('cupones.cuponEdit')->with('cupon',$cupon)->with('message',$message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCouponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function cuponUpdate(Request $request, $id)
    {
      $cupon = Coupon::find($id);
      $cupon->name = $request->name;
      // dd($request->codigo);
      $cupon->codigo = $request->codigo; 
      $cupon->max_change = $request->max_change;
      $request->start_day = date("Y-m-d", strtotime($request->start_day));
      $request->final_day = date("Y-m-d", strtotime($request->final_day));
      $cupon->start_day = $request->start_day;
      $cupon->final_day = $request->final_day;
      $cupon->number_exchange = $request->number_exchange;
      $cupon->amount = $request->amount;
    
      $cupon->type = $request->type;
      if($request->active == null)
      {
          $cupon->active = 0;
      }
      if($request->active == "on")
      {
          $cupon->active = 1;
      }
      $cupon->save();

      return redirect(route('cupon.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */

    public function cuponAdd(Coupon $coupon)
    {
      $message="";
      return view('cupones.cuponAdd')->with('message',$message);
    }

    public function newCupon(Request $request)
    {
      $cupon = new Coupon;
      $cupon->name = $request->name;
      $cupon->codigo = $request->codigo; 
      $cupon->max_change = $request->max_change;
      $request->start_day = date("Y-m-d", strtotime($request->start_day));
      $request->final_day = date("Y-m-d", strtotime($request->final_day));
      $cupon->start_day = $request->start_day;
      $cupon->final_day = $request->final_day;
      $cupon->number_exchange = $request->number_exchange;
      $cupon->amount = $request->amount;
    
      $cupon->type = $request->type;
      if($request->active == null)
      {
          $cupon->active = 0;
      }
      if($request->active == "on")
      {
          $cupon->active = 1;
      }
      $cupon->save();

      return redirect(route('cupon.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCouponRequest  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}

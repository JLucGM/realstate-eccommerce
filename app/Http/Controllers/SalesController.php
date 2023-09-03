<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Coupon;
use App\Models\User;
use App\Models\Customer_loyalties;
use App\Models\Product;
use App\Models\PaymentGateway;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Carbon;
use Cart;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSalesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesRequest  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesRequest $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
      
    }


    public function enviandoPedido(Request $request){
    // dd($request);
// reference	delivery	customer	total	payment	status	date	created_at	updated_at

// "_token" => "ia3svUUVGJld6OTDTKgS1WEDdEz4kSDzUK7fBMWw"
// "customer" => "Eloy José Bonilla"
// "total" => "6

    $sales = new Sales;
    $sales->delivery = "Ciudad";
    $sales->customer = $request->customer;

    $customerLoyality = Customer_loyalties::all();
    $productos = Product::all();
    $contar_productos = count($productos);
    $contar_customer = count($customerLoyality);
    $puntos = 0;
    //  dd($sales);
    $sales->productos = $request->c_contenido_cart;
  
     
       
     $carrito = Cart::getContent();
     $carrito = json_encode($carrito);
     $carrito = json_decode($carrito);
     $contenidoCarro = [];
     $contenidoFidel = [];
     $precios = [];



     foreach ($carrito as $key => $value) {
        // dd($value->price*$value->quantity);
        
       array_push($contenidoCarro, $value->quantity."-".$value->name);
       array_push($contenidoFidel, $value->name);
       array_push($precios, $value->price*$value->quantity);

     }
     $contenidoCarro = implode(", ", $contenidoCarro);
   //   dd($contenidoCarro);
     $sales->productos = $contenidoCarro;


     
    // Carrito con customer
     $arrayValues = $contenidoFidel;
     $contar_carrito = count($arrayValues);
     $total_puntos = 0;

     for ($i=0; $i < $contar_customer ; $i++) { 

         $productos_customer = $customerLoyality[$i]->productos;
         $productos_customer = (array)json_decode($productos_customer);
         $contar_p_c = count($productos_customer);
    
         for ($j=0; $j < $contar_carrito ; $j++) { 

             for ($k=0; $k < $contar_p_c ; $k++) {
                 if ($arrayValues[$j] == $productos_customer[$k]->elemento){
                     $puntos_de_compra = $customerLoyality[$i]->points;
                     $monto_de_compra = $customerLoyality[$i]->monto;
                     $total_de_compra = floatval($precios[$j]);
                     
                    if($total_de_compra>=$monto_de_compra){
                        $total_para_puntos = $total_de_compra/$monto_de_compra;
                        $total_puntos = $total_puntos+$total_para_puntos*$puntos_de_compra;
                        $total_puntos = intval($total_puntos);
                        // dd($total_puntos);
                    }else{
                        // dd("no es mayor");
                    }
                    
                    
                 }
             }
           
         }
        

     }

             // dd($request);
             $code = Sales::select('id','reference')->orderBy('id', 'desc')->first();

             $user = User::find(auth()->user()->id);
            
             $userPoints = $user->points+$total_puntos;
             $user->points = $userPoints;
             

            if (!empty($code)) {
                $sales->reference = intval($code->reference+1);
            }else{
                $sales->reference = 1;
            }

            //  $sales->reference = $code->code;

             $sales->customer = $request->customer;
         

             $sales->status = "";
 
             //cupon
             $coupons = Coupon::all();
             $contar = count($coupons);
             $request->c_cupon = lcfirst($request->c_cupon);
             //Buscando cupon
             for ($i=0; $i < $contar ; $i++) { 
                 if($coupons[$i]->codigo == $request->c_cupon){
                     $sales->coupon = $coupons[$i]->codigo;
                    //  dd( $coupons[$i]->codigo);
                 }
 
             }
 
              //metodo
              $pa_gateway = PaymentGateway::all();
              $contar = count($pa_gateway);
              $request->c_cupon = lcfirst($request->c_cupon);
  
            


              //Buscando metodo
              for ($i=0; $i < $contar ; $i++) { 
                  if($pa_gateway[$i]->name == $request->metodo){
                    // dd("encontrado");
                     $sales->payment = $pa_gateway[$i]->id;
                  }
  
              }
             
             $sales->total =  floatval($request->total);
              
             // dd($sales->total." ".$request->c_total);
 
             $date = Carbon::now();
             $year = $date->format('Y');
             $month = $date->format('-m-');
             $day = $date->format('d');
             $date = $date->format('Y-m-d h:i:s');
             $sales->date =  $date; //ahora si ta bien
            //  dd($sales->date);
             $user->save();
             $sales->save();

    //  $seo = Seo::find(1);
    //  $restaurant = Restaurant::find(2);
    //  $products = Products::all();
    //  $products = Products::ordenar($products)->paginate(50); 
     
     // EMAIL
    //  $referencia = $request->c_reference;
    //  $nombre_cliente = $request->t_nombre;
    //  $correo_cliente = $request->t_correo;
    //  $total_cliente = floatval($request->c_total);
     // dd($correo_cliente);

    //  include 'mails/enviar_email.php';

     // foreach ([$correo_cliente] as $recipient) {
     //     // Mail::to($recipient)->send(new enviar_email());
     //     $dat[0]= $recipient;
     //     Mail::send($recipient, 1, function ($message) {
     //         $message->to()
     //           ->subject("Hola")
     //           // here comes what you want
     //           ->setBody('Hi, welcome user!') // assuming text/plain
     //           // or:
     //           ->setBody('<h1>Hi, welcome user!</h1>', 'text/html'); // for HTML rich messages
     //       });

     // }


     // dd($request->t_correo);
     return redirect(route('cart.index'));
 }

}

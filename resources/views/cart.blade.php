@php
$html_tag_data = [];
$title = 'Carrito';
$description= 'Carrito'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/customers.list.js"></script>
 {{-- CARRITO --}}
 <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
@endsection

@section('content')
{{-- CARRITO --}}
    

    <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
       </a>
       <ul class="dropdown-menu">
         <li>@include('partials.cart-drop')</li>
       </ul>
     </li>
   
   
   <div class="tarjetas">
   
       @foreach ($product as $item)
       <div class="tarjetas">
           <form action="{{ route('cart.store') }}" method="POST">
               @csrf
               <input type="" value="{{$item->id}}"  name="id" Required>
               <input type="" value="{{$item->name}}"  name="name" Required>
               <input type="" value="{{$item->price}}"  name="price" Required>
               <input type="" value="img/product/product_id_{{$item->id}}/{{$item->image[0]}}" name="image" Required>
               <input type="" value=""  name="quantity" Required>
               <div class="card-footer" style="background-color: white;">
                     <div class="row">
                       <button class="btn btn-secondary btn-sm" class="tooltip-test" >
                           <i class="fa fa-shopping-cart"></i> agregar al carrito
                       </button>
                   </div>
               </div>
           </form>
       </div>
       @endforeach


{{-- 	
       ID
       Reference
       New client	
       Delivery
       Customer
       Total
       Payment
       Status
       Date
       Actions --}}

       <form action="{{ route('enviando.pedido') }}" method="post">
        @csrf
        {{-- reference	delivery	customer	total	payment	status	date	created_at	updated_at	 --}}

        <input type="text" name="customer" value="{{Auth()->User()->name}} {{Auth()->User()->last_name}}">
       
        @if($descuento>=1)
        <input type="text" name="total" value="{{ $descuento }}">
        <input type="text" name="c_cuponimage.png" value="{{ucfirst($code_cupon)}}">
        @else
        <input type="text" name="total" value="{{ Cart::getSubTotal() }}">
        @endif
        <h6>efectivo</h6>
        <input type="radio" name="metodo" id="metodo" value="efectivo">
        <h6>paymentez</h6>
        <input type="radio" name="metodo" id="metodo" value="paymentez">
        <br>
        <button type="submit" class="btn btn-dark btn-sm btn-block" href="#">
            CHECKOUT <i class="fa fa-arrow-right"></i>
        </button>
    </form>
       
   </div>
   
   <li class="list-group-item">
    <div class="row">
        <div class="col-lg-10">
            @if($descuento>=1)
            <b style="font-size: 10px; color:green; margin-top: 20px;">Tipo Descuento: <span id="d_tipo"  style="">{{ucfirst($tipo)}}</span></b>
            <br>
            <b style="font-size: 10px; color:green; margin-top: 0px;">Cupon Canjeado: <span id="d_cupon" style="">{{ucfirst($code_cupon)}}</span></b>
            <br>
            <b>Descuento <span id="d_descuento" style="/*float:right*/"> {{$monto_cupon}}</span></b>
            <br>
            <b>SubTotal: </b>${{ \Cart::getSubTotal() }}
            <br>
            <b>Total: </b>${{ $descuento }}
            @else
            <b>SubTotal: </b>${{ \Cart::getSubTotal() }}
            <br>
            <b>Total: </b>${{ \Cart::getTotal() }}
            @endif
           
        </div>
    </div>
</li>

       {{--   'id' => $request->id,
       'name' => $request->name,
       'price' => $request->price,
       'quantity' => $request->quantity,
       'attributes' => array(
       'image' => $request->img,
       'slug' => $request->slug --}}
        {{-- CARRITO --}}
@endsection

<style>
    li{
        list-style: none;
    }
</style>
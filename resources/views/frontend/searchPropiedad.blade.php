<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Inmobiliaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
    integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
    integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{asset('js/enable-push.js')}}"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    
</head>

<body>
    <header>
        
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <a href="#" class="enlace">
                
                
                <img src="{{ asset('img/logo.png') }}" alt="" class="logo" width="100%" height="auto" />
            </a>
            <ul class="menu-horizontal">
                <li><a href="{{ route('home') }}">Inicio</a></li>
   
        <div class="dropdown">
  <li ><a href="#" class="dropActive">Venta</a></li>
  
  <div class="dropdown-content offset-2">
    <a href="{{ route('propiedad.lista',[$tipo='all']) }}">Todas</a>
    <hr>
    <a href="{{ route('propiedad.lista',[$tipo='Alquiler']) }}">Apartamento</a>
    <a href="{{ route('propiedad.lista',[$tipo='Venta']) }}">Casa</a>
    <a href="{{ route('propiedad.lista',[$tipo='AlquilerT']) }}">Duplex</a>

  </div>
</div>

      <div class="dropdown">
  <li ><a href="#" class="dropActive">Alquiler</a></li>
  
  <div class="dropdown-content offset-2">
    <a href="{{ route('propiedad.lista',[$tipo='all']) }}">Todas</a>
    <hr>
    <a href="{{ route('propiedad.lista',[$tipo='Alquiler']) }}">Aparta Estudio</a>
    <a href="{{ route('propiedad.lista',[$tipo='Venta']) }}">Casa</a>
    <a href="{{ route('propiedad.lista',[$tipo='AlquilerT']) }}">Posada</a>

  </div>
</div>

      <div class="dropdown">
  <li ><a href="#" class="dropActive">Alquiler Temporal</a></li>
  
  <div class="dropdown-content offset-2">
    <a href="{{ route('propiedad.lista',[$tipo='all']) }}">Todas</a>
    <hr>
    <a href="{{ route('propiedad.lista',[$tipo='Alquiler']) }}">Apartamento</a>
    <a href="{{ route('propiedad.lista',[$tipo='Venta']) }}">Duplex</a>
    <a href="{{ route('propiedad.lista',[$tipo='AlquilerT']) }}">Casa</a>

  </div>
</div>
        <li><a href="{{ route('blog.index') }}">Blog</a></li>

                <li><a href="{{ route('contactacto.web') }}">Contacto</a></li>
                {{-- <li> <a href="#"><i class="fa-sharp fa-solid fa-phone"></i> 300-555-6789</a> --}}
                </li>
                <a href="{{route('Dashboard')}}"><i class="fa-solid fa-circle-user"></i></a>
                <li>
                    
                </li>
                <li> <a href="{{ route('propiedad.anunciar') }}" class="boton btn btn-primary">Publicar</a></li>
            </ul>
            
            
            <style>
                .menu-vertical{
                    border:1px solid rgba(2, 37, 74, 0.934);
                    border-width: 1px solid rgba(2, 37, 74, 0.934);
                    position: absolute;
                    display: none;
                    list-style: none;
                    width: 200px;
                    background-color: rgb(255, 255, 255);
                }
                
                .menu-vertical li:hover{
                    /* background-color: black; */
                }
                
                .menu-horizontal li:hover .menu-vertical{
                    display: block;
                    
                }
                
                .menu-vertical li a{
                    display: block;
                    color: white;
                    text-decoration: none;
                    padding: 15px 15px 15px 20px;
                }
            </style>
            
        </nav>
        
    </header>
    <div id ="map" class="col-12" style="height: 500px; width: 100%;"> </div> 
    
    
    <div class="buscador" style="margin-top: -5rem;">
        <div class="container">
            <div class="card " style="padding: 2rem;">
                <ul class="nav nav-pills mb-3 offset-4 " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true"  onclick="document.getElementById('tipo').value='En alquiler'">Alquiler</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-venta-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="false" onclick="document.getElementById('tipo').value='En venta'">Venta</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-temporal-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="false" onclick="document.getElementById('tipo').value='En alquiler temporal'">Alquiler Temporal</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        
              <form method="POST" action="{{ route('buscarPropiedad') }}" id="rentar" name="rentar"  role="form" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-3 col-sm-12  pt-2">
                  <div class="form-group">
                   <select class="form-control select2" id="region" name="region">
                </select> 
                  </div>
                </div>


                    <div class="col-lg-3 col-sm-12  pt-2">
                  <div class="form-group">
                   <select class="form-control select2" name="ciudad" id="city">
                </select> 
                  </div>
                </div>


                
                <div class="col-lg-2 col-sm-12 pt-2">
                  <div class="form-group">
                    {{ Form::select('tipo_propiedad',$tipoAll, null,['class' => 'form-control select2' . ($errors->has('tipoPropiedad') ? ' is-invalid' : ''), 'placeholder' => 'tipo de propiedad']) }}
                    
                  </div>
                </div>
                
         

                <div class="col-lg-1 col-sm-12 pt-2">
                  <div class="form-group">
                    
                    {{ Form::select('cuartoNumero',[
                    
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    
                    ],null, ['class' => 'form-control select2' . ($errors->has('estadoticket') ? ' is-invalid' : ''), 'placeholder' => 'Dormitorios']) }}
                  </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                  <div class="form-group">
                    <label for="precio" class="px-3">Precio:</label>
                    <span>{{ $setting->moneda }} </span><output id="outprice" name="outprice" for="price">{{number_format($min,2,".",".")}}</output>
                    
                    <input type="range" id="precio" name="precio" class="mt-4 offset-2" min="{{ $min }}" max="{{ $max }}" value="{{ $min }}" onchange="document.getElementById('outprice').value=new Intl.NumberFormat('de-DE').format(value)">
                  </div>
                </div>
                <input type="hidden" name="tipo" value="renta" id="tipo">
                <div class="col-lg-3 col-sm-12 pt-2 offset-4">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" value="submit" form="rentar" style="width: 100%;">Buscar</button>
                    
                    
                  </div>
                </div>
                
                
              </div>
              
            </form>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        
    </div>
    
    
    
    <div class="container" style="padding-bottom: 5rem;">
        <div class="row">
            <div class="col-12 seccionnosotros">
                <h1 class="tituloseccion">Lista de Propiedades</h1>
                
            </div>
        </div>
        
        <div class="row">
            
            
            @if (sizeof($productsSearch)>0)
            @foreach ($productsSearch as $product )
            
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="tag-wrapper">
                        <div class="row">
                            <div class="col-6">
                                <div class="tag1">Featured</div>
                            </div>
                            <div class="col-3">
                                <div class="tag2">Sales</div>
                            </div>
                            <div class="col-3">
                                <div class="tag3">Active</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tag-wrapper-bottom">
                        <div class="row">
                            <div class="col-7">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $product->direccion }}</span>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-3">
                                <i class="fa-solid fa-video"></i> 1
                                <i class="fa-solid fa-camera"></i> 7
                            </div>
                        </div>
                    </div>
                    @foreach ($product->media as $image)
                    
                    <img src="{{ $image->getUrl() }}" alt="imagen no encontrada">
                    @break
                    
                    @endforeach
                    
                    <div class="contenidocard">
                        <a href="{{route('producto.show', [$product->id])}}" style="text-decoration: none">
                            <h3>
                                {{ $product->name }}
                            </h3>
                        </a>
                        <h4>{{ $setting->moneda }} {{ number_format($product->price,2,".",".")}}</h4>
                        <p>
                            {{ $product->description }}
                        </p>
                        <div class="row iconospropiedad">
                            <div class="col-2"><i class="fa-solid fa-bed"></i> {{ $product->dormitorios }}</div>
                            <div class="col-2"><i class="fa-solid fa-bath"></i>{{ $product->toilet }}</div>
                            <div class="col-3">
                                <i class="fa-regular fa-square"></i> {{ $product->metrosCuadradosC }} ft
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row asesor">
                            <div class="col-6">
                                <img src="https://picsum.photos/200" alt="" style="width: 30px; border-radius: 50%; height: auto" />
                                <span>John Collins</span>
                            </div>
                            <div class="col-6">
                                <a href="#">
                                    <span class="share_list" data-original-title="share">
                                        <i class="fa-solid fa-share-nodes"></i>
                                    </span>
                                </a>
                                
                                <a href="#">
                                    <span class="share_list" data-original-title="share">
                                        <i class="fa-solid fa-heart"></i>
                                    </span>
                                </a>
                                
                                <a href="#">
                                    <span class="share_list" data-original-title="share">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            @else
            
            <div class="alert alert-danger mt-1">
                <p>Lo sentimos no hay propiedades que coincidan con tu busqueda </p>
            </div>
            <div class="alert alert-info mt-1">
                <p>A continuacion listaremos algunas propiedades que quizas puedan interesarte </p>
            </div>
            
            @foreach ($products as $product )
            
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="tag-wrapper">
                        <div class="row">
                            <div class="col-6">
                                <div class="tag1">Featured</div>
                            </div>
                            <div class="col-3">
                                <div class="tag2">Sales</div>
                            </div>
                            <div class="col-3">
                                <div class="tag3">Active</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tag-wrapper-bottom">
                        <div class="row">
                            <div class="col-7">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $product->direccion }}</span>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-3">
                                <i class="fa-solid fa-video"></i> 1
                                <i class="fa-solid fa-camera"></i> 7
                            </div>
                        </div>
                    </div>
                    @foreach ($product->media as $image)
                    
                    <img src="{{ $image->getUrl() }}" alt="imagen no encontrada">
                    @break
                    
                    @endforeach
                    
                    <div class="contenidocard">
                        <a href="{{route('producto.show', [$product->id])}}" style="text-decoration: none">
                            <h3>
                                {{ $product->name }}
                            </h3>
                        </a>
                        <h4>${{ $product->price }}</h4>
                        <p>
                            {{ $product->description }}
                        </p>
                        <div class="row iconospropiedad">
                            <div class="col-2"><i class="fa-solid fa-bed"></i> {{ $product->dormitorios }}</div>
                            <div class="col-2"><i class="fa-solid fa-bath"></i>{{ $product->toilet }}</div>
                            <div class="col-3">
                                <i class="fa-regular fa-square"></i> {{ $product->metrosCuadradosC }} ft
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row asesor">
                            <div class="col-6">
                                <img src="https://picsum.photos/200" alt="" style="width: 30px; border-radius: 50%; height: auto" />
                                <span>John Collins</span>
                            </div>
                            <div class="col-6">
                                <a href="#">
                                    <span class="share_list" data-original-title="share">
                                        <i class="fa-solid fa-share-nodes"></i>
                                    </span>
                                </a>
                                
                                <a href="#">
                                    <span class="share_list" data-original-title="share">
                                        <i class="fa-solid fa-heart"></i>
                                    </span>
                                </a>
                                
                                <a href="#">
                                    <span class="share_list" data-original-title="share">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            
            @endif
            
            
            
            
            
            
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="section">
      <footer class="text-white text-center text-lg-start fondofooter">
      <!-- Grid container -->
      <div class="container p-4">
        <!--Grid row-->
        <div class="row mt-4">
          <!--Grid column-->
          <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4">Contactos</h5>

            <p>
              3755 Commercial St SE Salem, Corner with Sunny Boulevard, 3755 Commercial OR 97302
            </p>
            <p>
              (305) 555-4446
            </p>
            <p>
              (305) 555-4555
            </p>
            <p>
              youremail@gmail.com
            </p>

            <p>
              wpestatetheme
            </p>
            <p>
              WP RESIDENCE
            </p>


          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4">Categorias</h5>
            @foreach ($tipoPropiedad as $item)
                
              <p>
                {{$item->nombre}}
              </p>
            @endforeach
            

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
            <div class="propiedades">
              <h5 class="text-uppercase mb-4">Ultimas Propiedades</h5>
              @foreach ($productFooter  as $product)
                  
              <div class="d-flex foot">
                @foreach ($product->media as $image)
                    
                <img src="{{$image->getUrl()}}" alt="" style="width: 80px; height:80px;">
                @break
                @endforeach
                <div class="textofoot">
                  <h6 style="color: #eaeaea;">{{$product->name}}</h6>
                 <strong>{{ $setting->moneda }}  {{number_format($product->price,2,".",".")}}</strong>

                </div>
              </div>
              @endforeach

              {{-- <div class="d-flex foot">
                <img src="https://picsum.photos/id/54/600/400" alt="" style="width: 80px; height:80px;">
                <div class="textofoot">
                  <h6 style="color: #eaeaea;">Titulo</h6>
                  <strong>$ 860,000</strong>
                </div>

              </div> --}}

            </div>

          </div>

          <div class="mt-4">
            <!-- Facebook -->
            <a type="button" class="btn btn-floating botonfondo btn-lg"><i class="fab fa-facebook-f"></i></a>
            <!-- Dribbble -->
            <a type="button" class="btn btn-floating botonfondo btn-lg"><i class="fab fa-instagram"></i></a>
            <!-- Twitter -->
            <a type="button" class="btn btn-floating botonfondo btn-lg"><i class="fab fa-twitter"></i></a>
            <!-- Google + -->
            <!-- Linkedin -->
          </div>






        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: #001A33; color:rgb(220, 220, 220)">
   Copyrigth@ Todos los derechos reservados . <a href="https://google.com" target="_blank">Desarrollado por Paginas Para Inmobiliarias</a>  

  </div>
  <!-- Copyright -->
  </footer>
    
</div>



</body>

</html>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap");
    
    
   .dropbtn {

   background: none;
  border: 0;

  color: inherit;
  /* cursor: default; */
  font: inherit;
  overflow: visible;
  padding: 0;
  -webkit-user-select: none; /* for button */
   -webkit-appearance: button; /* for input */
     -moz-user-select: none;
      -ms-user-select: none;


      text-transform: uppercase;


    
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 4;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropActive {
    background: #000090;
}

 
    .fondofooter {
        background: #001A33;
    }
    
    .botonfondo {
        background-color: #002547;
        color: #fff;
    }
    
    .foot {
        padding: 1rem;
    }
    
    .foot img {
        border-radius: 10px;
    }
    
    .textofoot {
        padding-left: 1rem;
    }
    
    .cardpropiedad .contenidocard h4 {
        color: #0073e1;
        font-weight: 600;
    }
    
    .iconocard {
        font-size: .7rem;
        font-weight: 600;
    }
    
    .cardpropiedad .contenidocard h3 {
        color: #000;
        font-weight: 600;
        font-size: 1.3rem;
    }
    
    header {
        top: 0;
        left: 0;
        width: 100%;
        justify-content: space-around;
        transition: 0.7s;
        padding: 30px 20px;
        z-index: 10;
    }
    
    
    
    header ul {
        position: relative;
        
        justify-content: center;
        align-items: center;
    }
    
    header ul li {
        list-style: none;
    }
    
    header ul li a {
        position: relative;
        font-family: "Nunito Sans", Sans-serif;
        margin: 0 15px;
        text-decoration: none;
        color: rgb(255, 255, 255);
        letter-spacing: 2px;
        font-weight: 600;
        transition: 0.7s;
    }
    
    .contacto {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        list-style: none;
    }
    
    .contacto a {
        position: relative;
        font-family: "Nunito Sans", Sans-serif;
        margin: 0 15px;
        text-decoration: none;
        color: rgb(255, 255, 255);
        letter-spacing: 2px;
        font-weight: 600;
        transition: 0.7s;
    }
    
    header .logo {
        position: relative;
        transition: 1.5s;
    }
    
    .bannercontacto {
        width: 90%;
        min-height: 200px;
        background-image: url(./img/sketch32-5.svg);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    
    .capacontacto {
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background: rgba(2, 37, 74, 0.934);
    }
    
    
    
    .banner {
        position: relative;
        width: 100%;
        min-height: 500px;
        background-image: url(../img/mapa.png);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    
    .capa {
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background: rgba(2, 37, 74, 0.7);
    }
    
    .contenido {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        color: white;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
    }
    
    .contenido h1 {
        margin: 20px;
        font-size: 3rem;
        font-family: "Montserrat", sans-serif;
        font-weight: 600;
    }
    
    .contenido p {
        font-size: 1.2rem;
        font-family: "Nunito Sans", Sans-serif;
        width: 60%;
        text-align: center;
        justify-content: center;
        align-content: center;
        margin: 0 auto;
    }
    
    header.abajo {
        background-color: #fff;
        box-shadow: 3px 1px 20px 0 rgb(0 110 225 / 8%);
    }
    
    header.abajo ul li a {
        color: #000;
    }
    
    header.abajo .contacto a {
        color: #000;
    }
    
    header.abajo .contacto a i {
        color: #0073e1;
    }
    
    
    
    header.abajo .contacto .boton {
        color: #fff;
        background-color: #0073e1;
    }
    
    
    
    header .contacto .boton {
        color: #fff;
        background-color: #0073e1;
    }
    
    .seccionnosotros {
        margin: 40px auto;
    }
    
    .tituloseccion {
        margin: 20px;
        font-size: 30px;
        font-family: "Nunito Sans", Sans-serif;
        font-weight: 600;
        text-align: left;
        justify-content: left;
        align-content: left;
    }
    
    .parrafoseccion {
        font-size: 1.2rem;
        font-family: "Nunito Sans", Sans-serif;
        width: 60%;
        text-align: center;
        justify-content: center;
        align-content: center;
        margin: 0 auto;
        color: rgb(73, 73, 73);
    }
    
    .icononosotros {
        color: #0073e1;
        font-size: 30px;
    }
    
    .porquenosotros {
        margin: 50px auto;
    }
    
    .porquenosotros h2 {
        font-family: "Nunito Sans", Sans-serif;
        font-weight: 600;
        font-size: 1.5rem;
    }
    
    .porquenosotros p {
        font-family: "Nunito Sans", Sans-serif;
        font-weight: 500;
        font-size: 1rem;
        color: rgb(73, 73, 73);
    }
    
    .btn-nosotros {
        color: rgb(73, 73, 73);
        text-decoration: none;
    }
    
    .btn-nosotros:hover {
        color: rgb(73, 73, 73);
        text-decoration: none;
        font-weight: 600;
        color: #0073e1;
    }
    
    .iconospropiedad {
        color: rgb(117, 117, 117);
    }
    
    .iconospropiedad i {
        color: rgb(117, 117, 117);
    }
    
    .card {
        margin: 10px;
        border: 1px solid #d7d7d7;
        border-radius: 3px;
        box-shadow: 0 10px 31px 0 rgb(7 152 255 / 9%);
        background-color: white;
        transition: 0.3s ease-out;
    }
    
    .cardpropiedad {
        margin: 10px;
        border: 1px solid #d7d7d7;
        border-radius: 3px;
        box-shadow: 0 10px 31px 0 rgb(7 152 255 / 9%);
        background-color: white;
        transition: 0.3s ease-out;
        width: 100%;
        display: flex;
        font-family: "Nunito Sans", Sans-serif;
    }
    
    .testimmonials_starts {
        color: #e1c300;
    }
    
    .cardpropiedad .cardprincipalfoto img {
        height: 100%;
        min-height: 250px;
        width: 100%;
        margin: 0;
        padding: 0px 10px 0px 0px;
        margin-left: -10px;
        border-radius: 3px;
    }
    
    .card:hover {
        box-shadow: 2px 4px 8px 0 rgba(0, 0, 0, 0.15);
    }
    
    .card>img {
        border-radius: 2px;
        width: 100%;
        margin-bottom: 10px;
        height: 260px;
        
    }
    
    .card h3 {
        color: rgb(22, 22, 22);
        font-family: "Nunito Sans", Sans-serif;
        font-weight: 600;
        font-size: 1.4rem;
    }
    
    .card h4 {
        color: #0073e1;
        font-family: "Nunito Sans", Sans-serif;
        font-weight: 600;
        font-size: 1.4rem;
    }
    
    .card h3:hover {
        color: #0073e1;
        font-family: "Nunito Sans", Sans-serif;
        font-weight: 600;
        font-size: 1.4rem;
    }
    
    .card p {
        color: #757575;
        line-height: 1.5;
        padding-top: 10px;
    }
    
    .card .contenidocard {
        padding: 20px;
        margin-bottom: 50px;
    }
    
    .tag-wrapper {
        position: absolute;
        width: 100%;
        padding: 0px 20px;
    }
    
    .tag-wrapper-bottom {
        position: absolute;
        width: 100%;
        padding: 0px 20px;
        bottom: 45%;
        color: #fff;
        margin-bottom: 30px;
    }
    
    .tag1 {
        margin: 10px 0% 100% 0%;
        background-color: rgb(208, 159, 67);
        border-radius: 10px;
        width: fit-content;
        padding: 7px 5px;
        color: #fff;
        font-family: "Nunito Sans", Sans-serif;
        font-size: 0.8rem;
    }
    
    .tagagent {
        
        background-color: rgb(208, 159, 67);
        border-radius: 10px;
        width: fit-content;
        font-weight: 600;
        color: #fff;
        font-family: "Nunito Sans", Sans-serif;
        font-size: 0.8rem;
        padding: 5px;
    }
    
    .tag2 {
        margin: 10px 60%;
        background-color: #0073e1;
        border-radius: 10px;
        width: fit-content;
        padding: 7px 5px;
        color: #fff;
        font-family: "Nunito Sans", Sans-serif;
        font-size: 0.8rem;
        align-items: right;
    }
    
    .tag3 {
        margin: 10px 5%;
        background-color: #0073e1;
        border-radius: 10px;
        width: fit-content;
        padding: 7px 5px;
        color: #fff;
        font-family: "Nunito Sans", Sans-serif;
        font-size: 0.8rem;
        align-items: right;
    }
    
    .asesor {
        position: absolute;
        bottom: 0px;
        left: 20px;
        right: 20px;
        height: auto;
        border-top: 1px solid #eef3f6;
        font-size: 13px;
        margin: 0px 0px 0px 0px;
        padding: 13px 0px;
        color: #8593a9;
        line-height: 16px;
        float: left;
        max-width: 100%;
    }
    
    .asesor span {
        color: #000;
        font-weight: 600;
        font-family: "Nunito Sans", Sans-serif;
    }
    
    .share_list {
        width: 30px;
        height: 30px;
        margin-left: 10px;
        float: right;
        cursor: pointer;
        background-repeat: no-repeat;
        background-image: url(css/css-images/unitshare.png);
        background-position: 7px 8px;
        border: 1px solid #eef3f6;
        border-radius: 2px;
        
    }
    
    .share_list:hover {
        width: 30px;
        height: 30px;
        margin-left: 10px;
        float: right;
        cursor: pointer;
        background-repeat: no-repeat;
        background-image: url(css/css-images/unitshare.png);
        background-position: 7px 8px;
        border: 1px solid #eef3f6;
        border-radius: 2px;
        background-color: #0073e1;
        
    }
    
    .share_list i {
        margin: 25% 25%;
        color: #919191;
    }
    
    .share_list i {
        margin: 25% 25%;
        
    }
    
    .fondocontacto {
        background-color: #03144a91;
    }
    
    .contactosection {
        
        
        padding: 2.5rem;
        position: relative;
        width: 100%;
        min-height: 686px;
        background-image: url(../img/header.jpg);
        
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    
    .titulocontactosection {
        align-items: center;
        align-content: center;
        text-align: center;
        padding-top: 4rem;
        padding-bottom: 0;
    }
    
    .formcontactosection {
        align-items: center;
        align-content: center;
        text-align: center;
        padding: 1rem 4em 4rem 4rem;
    }
    
    nav {
        background: #2fcdcd00;
        height: 80px;
        width: 100%;
    }
    
    .enlace {
        position: absolute;
        padding: 20px 50px;
    }
    
    .logo {
        height: 40px;
    }
    
    nav ul {
        float: right;
        margin-right: 20px;
    }
    
   nav ul li {
    display: inline-block;
    line-height: 30px;
    margin: 0 5px;
  }
    
    nav ul li a {
        color: rgb(17, 17, 17);
        font-size: 14px;
        padding: 7px 5px;
        border-radius: 3px;
        text-transform: uppercase;
    }
    
    li a.active,
    li a:hover {
        background: #000090;
        transition: .5s;
    }
    
    .checkbtn {
        font-size: 30px;
        color: #fff;
        float: right;
        line-height: 80px;
        margin-right: 40px;
        cursor: pointer;
        display: none;
    }
    
    #check {
        display: none;
    }
    
    section {
        background: url(fondo.jpg) no-repeat;
        background-size: cover;
        background-position: center center;
        height: calc(100vh - 80px);
    }
    
    @media (max-width: 952px) {
        .enlace {
            padding-left: 20px;
        }
        
        nav ul li a {
            font-size: 16px;
        }
    }
    
    @media (max-width: 858px) {
        .checkbtn {
            display: block;
        }
        
        
        
        ul {
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #2c3e50;
            left: -100%;
            text-align: center;
            transition: all .5s;
        }
        
        nav ul li {
            display: block;
            margin: 50px 0;
            line-height: 30px;
        }
        
        nav ul li a {
            font-size: 20px;
        }
        
        
        
        li a:hover,
        li a.active {
            background: none;
            color: rgb(0, 106, 255);
        }
        
        #check:checked~ul {
            left: 0;
        }
    }
</style>

@if (sizeof($productsSearch) >0)
@include('frontend.functionmapsSearch')
@else
@include('frontend.functionmaps')
    
@endif


<script type="text/javascript">
    window.addEventListener("scroll", function () {
        var header = document.querySelector("header");
        
        header.classList.toggle("abajo", window.scrollY > 0);
    });
    
    
    
    $(document).ready(function() {
            //-------------------------------SELECT CASCADING-------------------------//
            var selectedCountry = (selectedRegion = selectedCity = "");

            // This is a demo API key that can only be used for a short period of time, and will be unavailable soon. You should rather request your API key (free)  from http://battuta.medunes.net/
            var BATTUTA_KEY = "df576e94f48f79e79c64010875385e0d";
            // Populate country select box from battuta API
            url =
                "https://battuta.medunes.net/api/region/co/all/?key=" +
                BATTUTA_KEY +
                "&callback=?";

            // EXTRACT JSON DATA.
            $.getJSON(url, function(data) {

            
              

                $("#region option").remove();

                $.each(data, function(index, value) {

                    console.log(value);
                // APPEND OR INSERT DATA TO SELECT ELEMENT.
                $("#region").append(
                    '<option value="' + value.region + '">' + value.region + "</option>"
                );
                });
            });
            // Country selected --> update region list .
          
            // Region selected --> updated city list




               $("#region").on("change", function() {
                selectedRegion = this.options[this.selectedIndex].text;
                // Populate country select box from battuta API
                countryCode = 'co';
                region = $("#region").val();
                // console.log(countryCode + " - " + region);
                url =
                "https://battuta.medunes.net/api/city/" +
                countryCode +
                "/search/?region=" +
                region +
                "&key=" +
                BATTUTA_KEY +
                "&callback=?";
                $.getJSON(url, function(data) {
                // console.log(data);
                $("#city option").remove();
                $.each(data, function(index, value) {
                    // APPEND OR INSERT DATA TO SELECT ELEMENT.
                    $("#city").append(
                    '<option value="' + value.city + '">' + value.city + "</option>"
                    );
                });
                });
            });
  

                
          });
    
    
    
    
    
    // In your Javascript (external.js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2({
                theme: "classic"
            });
        });
        
        
        
    </script>
    
    
    
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inmobiliaria producsssto</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link rel="stylesheet" href="{{asset('css/main.css')}}">



</head>

<body>
  <!-- <header>
    
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <a href="#" class="enlace">
        <img src="./img/logo.png" alt="" class="logo" width="100%" height="auto" />
      </a>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Propiedades</a></li>
        <li><a href="#">Servicios</a></li>
        <li><a href="#">Agentes</a></li>
        <li><a href="#">Busqueda</a></li>
        <li><a href="#">Contacto</a></li>
        <li> <a href="#"><i class="fa-sharp fa-solid fa-phone"></i> 300-555-6789</a>
        </li>
        <a href="#"><i class="fa-solid fa-circle-user"></i></a>
        <li>
          
        </li>
        <li> <a href="#" class="boton btn btn-primary">Anunciar</a></li>
      </ul>
      
      
      
      
    </nav>
    
    
    
  </header> -->

  <div class="row">
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-5 text-center" style="z-index: 4">
      <p>{{ $message }}</p>
    </div>
    @elseif($message = Session::get('error'))
    <div class="alert alert-danger mt-5 text-center" style="z-index: 4">
      <p>{{ $message }}</p>
    </div>
    @endif

  </div>

  {{--<section class="modal">
    <div class="modal_container">
      <div class="row">
        <div class="col-7">
          <!-- <img src="img/featured_property_large-1110x623.jpg" alt="" style="width: 100%; height: 100%;"> -->
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ $product->media[0]->getUrl() }}" class="d-block w-100" style="height: 550px" alt="...">

              </div>
              <div class="carousel-item">
                <img src="{{ $product->media[1]->getUrl() }}" class="d-block w-100" style="height: 550px" alt="...">

              </div>
              <div class="carousel-item">
                <img src="{{ $product->media[2]->getUrl() }}" class="d-block w-100" style="height: 550px" alt="...">

              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        </div>
        <div class="col-5">

          <div class="col-12" style="padding-left: 1rem; padding-right: 3rem; padding-bottom: 3rem; padding-top: 1rem;">
            <a href="#" class="modal-close btn btn-danger" style="margin-left:100%;">X</a>
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <form method="POST" action="{{ route('store.user-contacto') }}" role="form" enctype="multipart/form-data">
              @csrf
              <input type="text" class="form-control mb-2" required name="name" placeholder="Nombre" style="border-radius: 1px;">
              <input type="text" class="form-control mb-2" required name="email" placeholder="Correo" style="border-radius: 1px;">
              <input type="text" class="form-control mb-2" required name="telefono" placeholder="Telefono" style="border-radius: 1px;">
              <input type="hidden" name="propiedad_id" value="{{ $product->id }}" class="form-control mb-2" required name="telefono" placeholder="Telefono" style="border-radius: 1px;">

              <textarea name="mensaje" placeholder="Mensaje" required id="" rows="5" style="width: 100%; border:1px solid #d5d5d5;padding: 0.375rem .75rem;"></textarea>
              <button type="submit" class="btn btn-primary w-100 mt-2" style="font-weight: 600; border-radius: 1px;">Enviar
                Correo</button>
            </form>
            <div class="row mt-2">
              <div class="col-6 pt-2">
                <a href="#" class="btn btn-outline-primary w-100" style="font-weight: 600; border-radius: 1px;">
                  <i class="fa-solid fa-phone"></i>
                  Llamar
                </a>
              </div>
              <div class="col-6 pt-2">



                <a href="https://api.whatsapp.com/send?phone=04124980849&text=Hola%20,te%20asesoramos%20por
                  %20whatsapp%20gestiona%20tu%20compra%20por%20este%20canal" target="_blank" class="btn btn-outline-primary w-100" style="font-weight: 600; border-radius: 1px;">
                  <i class="fab fa-whatsapp"></i>
                  Whatsapp
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>--}}

  {{--<div id="carouselExampleControls2" class="carousel slide slidermovil" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ $product->media[0]->getUrl() }}" class="d-block w-100" style="height: 300px" alt="...">

      </div>
      <div class="carousel-item">
        <img src="{{ $product->media[0]->getUrl() }}" class="d-block w-100" style="height: 300px" alt="...">

      </div>
      <div class="carousel-item">
        <img src="{{ $product->media[1]->getUrl() }}" class="d-block w-100" style="height: 300px;" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>--}}

  {{--<div class="container-fluid slidertotal">
    <div class="row">
      <div class="col-6" style="padding-right: 0;
      padding-left: 0;">
         @foreach ($product->media as $image)
        
        <img src="{{ $product->media }}" alt="imagen no encontrada" style="height: 500px; width:100%;">
        @break

        @endforeach 

        <img src="{{ $product->media[4]->getUrl() }}" alt="imagen no encontrada" style="height: 500px; width:100%;">

      </div>
      <div class="col-6">
        <div class="row">
          <div class="col-6" style="padding-right: 0;
          padding-left: 0;">
            <a href="#" class="hero-cta">

              <img src="{{ $product->media[0]->getUrl() }}" alt="imagen no encontrada" style="height: 250px; width:100%; padding:0px;">
            </a>

          </div>
          <div class="col-6" style="padding-right: 0;
        padding-left: 0;">
            <a href="#" class="hero-cta">
              <img src="{{ $product->media[1]->getUrl() }}" alt="" style="height: 250px; width:100%;">

            </a>


          </div>
          <div class="col-6" style="padding-right: 0;
      padding-left: 0;">
            <a href="#" class="hero-cta">
              <img src="{{ $product->media[2]->getUrl() }}" alt="" style="height: 250px; width:100%;">
            </a>


          </div>
          <div class="col-6" style="padding-right: 0;
    padding-left: 0;">
            <a href="#" class="hero-cta">

              <div>

                <img src="{{ $product->media[3]->getUrl() }}" alt="" style="height: 250px; width:100%;">


              </div>

            </a>


          </div>
        </div>
      </div>
    </div>
  </div>--}}
  {{-- cierra header img --}}



  <div style="background-color: #fbfbfb;">

    <div class="container pb-5">
      <div class="row">
        <div class="col-12 seccionnosotros">
          <h1 class="fw-bold">{{$product->name}}</h1>
          {{-- direccion de propiedad --}}
          <p class="text-secondary fs-3"><i class="fa-solid fa-location-dot"></i> {{$product->direccion}}</p>
          <hr>
          <div class="d-flex justify-content-between">
            <h1 class="text-primary">{{ $setting->moneda }}{{number_format($product->price,2,".",".")}}/mes </h1>
            <div style="text-align:right;">
              <a href="#" class="btn btn-secondary"><i class="fa-solid fa-share-nodes"></i> </i>Compartir</a>
              <a href="#" class="btn btn-secondary"><i class="fa-solid fa-heart"></i> </i>Favorito</a>
              <a href="#" class="btn btn-secondary"><i class="fa-solid fa-print"></i> </i>Imprimir</a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-8 col-xs-12 mt-5">
            <div class="card border-0 p-5">
              <div class="row">
                <div class="col-12">
                  <h4>Descripción general</h4>
                  <p class="mb-0">Actualizado el: 11 de Octubre 2022</p>
                </div>

                <div class="d-flex justify-content-between">
                  <div class="text-center">
                    <i class="fa-solid fa-bed fs-4"></i>
                    <p class="mb-0">{{$product->dormitorios}} Camas</p>
                  </div>

                  <div class="text-center">
                    <i class="fa-solid fa-bath fs-4"></i>
                    <p class="mb-0"> {{$product->toilet}} Baños</p>
                  </div>

                  <div class="text-center">
                    <i class="fa-solid fa-car fs-4"></i>
                    <p class="mb-0"> {{$product->cocheras}} Garaje</p>
                  </div>

                  <div class="text-center">
                    <i class="fa-solid fa-house"></i>
                    <p class="mb-0">{{$product->metrosCuadradosC}} ft</p>
                  </div>
                  <div class="text-center">
                    <i class="fa-regular fa-calendar"></i>
                    <p class="mb-0"> 1950</p>
                  </div>
                </div>
              </div>

            </div>
            <div class="card border-0 p-5">

              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Descripción</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Dirección</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Detalles</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-caracteristicas-tab" data-bs-toggle="pill" data-bs-target="#pills-caracteristicas" type="button" role="tab" aria-controls="pills-caracteristicas" aria-selected="false">Caracteristicas</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-fotos-tab" data-bs-toggle="pill" data-bs-target="#pills-fotos" type="button" role="tab" aria-controls="pills-fotos" aria-selected="false">Fotos</button>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                  <p class="p-5">{{$product->description}}</p>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                  <div class="row p-5">
                    <div class="col-4">
                      <p><strong>Direccion:</strong> {{$product->direccion}}</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Ciudad:</strong> {{$product->ciudad}}</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Pais:</strong> {{$product->pais}}</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Codigo Postal:</strong> falta codigo postal</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Departamento:</strong> {{$product->region}}</p>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                  <div class="row p-5">
                    <div class="col-4">
                      <p><strong>Propiedad ID:</strong> {{$product->id}}</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Tamaño:</strong> {{$product->metrosCuadradosC}} ft</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Baños:</strong> {{$product->toilet}}</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Años:</strong> Texto</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Material:</strong> Texto</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Precio:</strong> {{number_format($product->price,2,".",".")}}</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Habitaciones:</strong> {{$product->dormitorios}}</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Garaje:</strong> {{$product->cocheras}}</p>
                    </div>
                    <div class="col-4">
                      <p><strong>Expensas:</strong> {{$product->expensas}}</p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-caracteristicas" role="tabpanel" aria-labelledby="pills-caracteristicas-tab" tabindex="0">
                  <div class="row p-5">

                    @foreach ($product->amenities as $ameniti )
                    <div class="col-5">
                      @if(isset($ameniti->amenitiesCheck->icon))
                      <p> <i class="{{$ameniti->amenitiesCheck->icon}}"></i> {{$ameniti->amenitiesCheck->name }}</p>
                      @else
                      <p> <i class="fa-solid fa-house"></i> {{$ameniti->amenitiesCheck->name }}</p>
                      @endif
                    </div>
                    @endforeach

                  </div>
                </div>
                <div class="tab-pane fade" id="pills-fotos" role="tabpanel" aria-labelledby="pills-fotos-tab" tabindex="0">
                  <img src="https://wpresidence.net/wp-content/uploads/2015/01/floorplan_2d.jpg" alt="" style="width: 100%;">
                </div>
              </div>
            </div>


            {{-- cierra de descripcion  --}}
            <div class="card border-0 p-5">
              <h5>Video</h5>
              <video width="auto" controls>
                <source src="{{$product->lonkVideo}}" type="video/mp4">
                Your browser does not support HTML video.
              </video>
            </div>


            <div class="card border-0 p-5">
              <input type="hidden" name="latitud" id="latitud" value="{{$product->latitud}}">
              <input type="hidden" name="longitud" id="longitud" value="{{$product->longitud}}">
              <h5>Mapa</h5>
              <div id="mapa"> </div>
            </div>


            <div class="card border-0 p-5">
              <h5>Opiniones</h5>

              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-6">
                      <div class="contenidocard" style="padding-top:2rem; margin-bottom: 0!important;">
                        <img src="img/person-500x328.jpg" alt="exposed brick wall in a hipster cafe" style="height: 90px;  width:90px; padding-bottom: 10px;" />
                        <h3>Carlos David</h3>
                        <h6>Comprador</h6>
                        <div class="testimmonials_starts"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p>
                          Estoy interesado en esta propiedad
                        </p>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="contenidocard" style="padding-top:2rem; margin-bottom: 0!important;">
                        <img src="img/person-500x328.jpg" alt="exposed brick wall in a hipster cafe" style="height: 90px;  width:90px; padding-bottom: 10px;" />
                        <h3>Carlos David</h3>
                        <h6>Comprador</h6>
                        <div class="testimmonials_starts"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p>
                          Estoy interesado en esta propiedad
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="row pb-5 pt-5">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <h3>Anuncios Similares</h3>
              </div>
            </div>

            <div class="row">
              @foreach ($products as $product)
              <div class="col-12 col-lg-6 col-sm-6">
                <div class="card bg-white border-0 my-1 position-relative">
                  @foreach ($product->media as $image)
                  <img src="{{asset($image->getUrl()) }}" alt="imagen no encontrada" class="card-img-top">
                  @break
                  @endforeach
                  <div class="card-body-propiety p-3">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text"><i class="bi bi-geo-alt-fill"></i>{{ $product->direccion }}</p>
                  </div>
                  <div class="card-footer px-3 pt-3">
                    <p class="fs-5 fw-bold text-successs-emphasis">{{ $setting->moneda }} {{number_format($product->price,2,".",".")}}</p>
                  </div>
                  <div class="position-absolute top-10 start-90 translate-middle" style="z-index: 1;">
                    <div class="bg-success rounded p-2" style="width: 95px;">
                      <span class="text-white">EN VENTA</span>
                    </div>
                  </div>
                  <a href="{{route('producto.show', [$product->id])}}" class="properties-item p-3 d-none">
                    <div class="mt-5 pt- text-white">
                      <p class="text-white fs-7 mb-1"> {{ $product->description }}</p>
                      <div class="d-flex">
                        <p class="text-white me-1"><i class="fa-solid fa-bed"></i> {{ $product->dormitorios }}</p>
                        <p class="text-white me-1"><i class="fa-solid fa-bath"></i> {{ $product->toilet }}</p>
                        <p class="text-white me-1"><i class="fa-regular fa-square"></i> {{ $product->metrosCuadradosC.'ft' }} </p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              @endforeach
            </div>

          </div>

          <div class="col-lg-4 col-xs-12 mt-5">
            <div class="tab-container sticky-top border-0">
              {{-- <ul class="options" style="cursor: pointer;">
      <li id="option1" class="option option-active">
        Contacto
      </li>
      <li id="option2" class="option">
        Reservar Visita
      </li>
    </ul> --}}

              <div class="contents">
                <div id="content1" class="content content-active">
                  <div class="row">
                    @if (isset($product->agente))
                    <div class="text-center mt-3">
                      <img src="../img/person-500x328.jpg" alt="" class="w-50 rounded">
                      <h4>{{ $product->agente->user->name }}</h4>
                      <p class="text-primary mb-0">Agente</p>
                    </div>
                    @endif

                    <div class="col-12 p-5 pt-2">
                      <hr>
                      <a href="#" class="btn btn-primary w-100 fw-bold mb-2">PROGRAMAR UNA
                        VISITA</a>
                      <form method="POST" action="{{ route('store.user-contacto') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control mb-2" name="name" placeholder="Nombre">
                        <input type="text" class="form-control mb-2" name="email" placeholder="Correo">
                        <input type="text" class="form-control mb-2" name="telefono" placeholder="Telefono">
                        <textarea name="mensaje" id="" placeholder="Mensaje" rows="5" class="form-control mb-2"></textarea>

                        <input type="hidden" name="propiedad_id" value="{{ $product->id }}" class="form-control mb-2" required name="telefono" placeholder="Telefono">
                        @if (isset($product->agente))
                        <input type="hidden" name="agente_id" value="{{ $product->agente->user_id }}" class="form-control mb-2" required name="telefono" placeholder="Telefono">

                        @endif

                        <button type="submit" class="btn btn-primary w-100 fw-bold" >Enviar Correo</button>
                      </form>

                      <div class="row">
                        <div class="col-6 pt-2">
                          <a href="#" class="btn btn-outline-primary w-100 fw-bold">
                            <i class="fa-solid fa-phone"></i>
                            Llamar
                          </a>
                        </div>
                        <div class="col-6 pt-2">
                          <a href="https://api.whatsapp.com/send?phone=04124980849&text=Hola%20,te%20asesoramos%20por
              %20whatsapp%20gestiona%20tu%20compra%20por%20este%20canal" target="_blank" class="btn btn-outline-primary w-100 fw-bold">
                            <i class="fab fa-whatsapp"></i>
                            Whatsapp
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="content2" class="content">
                  <div class="row">
                    <div class="col-12" style="padding-left: 3rem; padding-right: 3rem; padding-bottom: 3rem; padding-top: 1rem;">
                      <!-- <a href="#" class="btn btn-primary w-100"
        style="font-weight: 600; border-radius: 0px; border:#0ABFF7; background:#0ABFF7;">PROGRAMAR UNA
        VISITA</a> -->
                      <form action="#" class="pt-2">
                        <input type="date" class="form-control mb-2" placeholder="Nombre" style="border-radius: 1px;">
                        <div class="row" style="padding-bottom: 10px;">
                          <div class="col-6 pt-2">
                            <a href="#" class="btn btn-outline-primary w-100" style="font-weight: 600; border-radius: 1px;">
                              <i class="fa-solid fa-phone"></i>
                              En persona
                            </a>
                          </div>
                          <div class="col-6 pt-2">
                            <a href="#" class="btn btn-outline-primary w-100" style="font-weight: 600; border-radius: 1px;">
                              <i class="fab fa-whatsapp"></i>
                              Video Chat
                            </a>
                          </div>
                        </div>
                        <input type="time" class="form-control mb-2" placeholder="Tu nombre" style="border-radius: 1px;">
                        <input type="text" class="form-control mb-2" placeholder="Tu nombre" style="border-radius: 1px;">
                        <input type="text" class="form-control mb-2" placeholder="Tu correo" style="border-radius: 1px;">
                        <input type="text" class="form-control mb-2" placeholder="Tu telefono" style="border-radius: 1px;">

                        <textarea name="" id="" rows="5" style="width: 100%; border:1px solid #d5d5d5;"></textarea>
                        <a href="#" class="btn btn-primary w-100" style="font-weight: 600; border-radius: 1px;">Enviar
                          Correo</a>
                      </form>

                      <div class="row">
                        <div class="col-6 pt-2">
                          <a href="#" class="btn btn-outline-primary w-100" style="font-weight: 600; border-radius: 1px;">
                            <i class="fa-solid fa-phone"></i>
                            Llamar
                          </a>
                        </div>
                        <div class="col-6 pt-2">
                          <a href="#" class="btn btn-outline-primary w-100" style="font-weight: 600; border-radius: 1px;">
                            <i class="fab fa-whatsapp"></i>
                            Whatsapp
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
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
              @foreach ($productFooter as $product)

              <div class="d-flex foot">
                @foreach ($product->media as $image)

                <img src="{{$image->getUrl()}}" alt="" style="width: 80px; height:80px;">
                @break
                @endforeach
                <div class="textofoot">
                  <h6 style="color: #eaeaea;">{{$product->name}}</h6>
                  <strong>{{ $setting->moneda }} {{number_format($product->price,2,".",".")}}</strong>

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





</body>

</html>
{{-- script map --}}

<script>
  function initmap() {
    var latitud = document.getElementById('latitud').value;
    var longitud = document.getElementById('longitud').value;
    // console.log(latitud);
    // console.log(longitud);

    var coord = {
      lat: parseFloat(latitud),
      lng: parseFloat(longitud)
    };
    console.log(coord);
    var map = new google.maps.Map(document.getElementById('mapa'), {
      zoom: 10,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    })
  };
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=initmap"></script>


<script>
  const option1 = document.getElementById('option1')
  const option2 = document.getElementById('option2')
  const content1 = document.getElementById('content1')
  const content2 = document.getElementById('content2')

  let chose = 1

  const changeOption = () => {
    chose == 1 ? (
        option1.classList.value = 'option option-active',
        content1.classList.value = 'content content-active'
      ) :
      (
        option1.classList.value = 'option',
        content1.classList.value = 'content'
      )

    chose == 2 ? (
      option2.classList.value = 'option option-active',
      content2.classList.value = 'content content-active'
    ) : (
      option2.classList.value = 'option',
      content2.classList.value = 'content'
    )
  }

  option1.addEventListener('click', () => {
    chose = 1
    changeOption()
  })

  option2.addEventListener('click', () => {
    chose = 2
    changeOption()
  })
</script>


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
    -webkit-user-select: none;
    /* for button */
    -webkit-appearance: button;
    /* for input */
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
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #f1f1f1
  }

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

  .tab-container {
    width: 100%;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.15);
    border-radius: 5px;
    overflow: hidden;
    background: #fff;
  }

  .options {
    display: flex;
    width: 100%;
    height: 15%;
    list-style: none;
    background: rgb(246, 246, 246);
    padding: 5px 0px 0;
    font-family: "Nunito Sans", Sans-serif;
  }

  .option {
    flex-grow: 1;
    text-align: center;
    line-height: 60px;
    color: #000;
    background: rgb(246, 246, 246);
    border-radius: 5px 5px 0px 0px;
    font-family: "Nunito Sans", Sans-serif;
  }

  /* .btn {
    flex-grow: 1;
    text-align: center;
    line-height: 60px;
    color: rgb(255, 255, 255);
    background: #0a41f7;
    font-weight: 600;

    font-family: "Nunito Sans", Sans-serif;
  } */

  .option-active {
    background: #fff !important;
    font-weight: 700;
    font-family: "Nunito Sans", Sans-serif;
  }

  .option-active2 {
    background: rgb(255, 255, 255) !important;
    color: rgb(0, 0, 0);
    font-weight: 700;
    font-family: "Nunito Sans", Sans-serif;
  }

  .contents {
    width: 100%;
    height: 85%;
  }

  .content {
    width: 100%;
    height: 100%;
    color: #000;
    background-color: #fff;
    display: none;
  }

  .content2 {
    width: 100%;
    height: 100%;
    color: #000;
    background-color: #fff;
    display: none;
  }

  .content-active {
    background-color: #fff;
    display: block;
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
    position: relative;
    width: 100%;
    min-height: 686px;
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
    min-height: 686px;
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
    margin: 0px;
    font-size: 40px;
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

  .slidermovil {
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
    .tab-container {
      display: block;
    }

    .slidermovil {
      display: block;
    }

    .slidertotal {
      display: none;
    }

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

<script type="text/javascript">
  window.addEventListener("scroll", function() {
    var header = document.querySelector("header");

    header.classList.toggle("abajo", window.scrollY > 0);
  });
</script>

<script>
  const openModal = document.querySelector('.hero-cta');
  const modal = document.querySelector('.modal');
  const closeModal = document.querySelector('.modal-close');


  openModal.addEventListener('click', (e) => {
    e.preventDefault();
    modal.classList.add('modalshow');
  });

  closeModal.addEventListener('click', (e) => {
    e.preventDefault();
    modal.classList.remove('modalshow');
  });
</script>
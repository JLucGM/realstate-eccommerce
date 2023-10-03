@php
$html_tag_data = [];
$title = $product->name;
$description= $title
@endphp

@include('frontend.header')
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<!-- Demo styles -->
<style>
  html,
  body {
    position: relative;
    height: 100%;
  }

  .swiper {
    width: 100%;
    height: 60%;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    /* background: #fff; */
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>

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

<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    @foreach($images as $image)
    <div class="swiper-slide">
      <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#{{ $image->id }}">
        <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $image->name) }}" class="w-100 mb-2" alt="Imagen de la propiedad">
      </button>
    </div>
    @endforeach
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-pagination"></div>
</div>

@foreach($images as $image)
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $image->id }}">
Launch static backdrop modal{{ $image->id }}
</button>--}}

<!-- Modal -->
<div class="modal fade" id="{{ $image->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $image->name) }}" class="w-100 mb-2" alt="Imagen de la propiedad">
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- <div style="background-color: #fbfbfb;"> -->

<div class="container bg-white sbg-primary p-5 my-5">
  <div class="row">
    <div class="col-6">
      <h4 class="fw-bold">{{$product->name}}</h4>
      <p class="text-secondary mb-0"><i class="fa-solid fa-location-dot"></i> {{$product->direccion}}</p>
      <p class="text-secondary">{{$product->tipopropiedad->nombre}} </p>

      <h5><span class="badge bg-secondary">{{$product->status}}</span></h5>
    </div>
    <div class="col-6">
      <h4 class="text-primary float-end">{{ $setting->moneda.' '.number_format($product->price,2,".",".")}} </h4>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-xs-12 p-0">
      <div class="card bg-white border-0 p-5">
        <div class="row">

          <div class="d-flex justify-content-between">
            <!-- <div class="text-center">
              <p class="mb-0 fw-bold">Tipo de propiedad</p>
              <p class="mb-0">{{$product->tipopropiedad->nombre}} </p>
            </div> -->
            <div class="text-center">

              <p class="mb-0 fw-bold"><i class="fa-solid fa-bed fs-4 me-2"></i> {{$product->dormitorios}}</p>
              <p>Habitaciones</p>
            </div>

            <div class="text-center">
              <p class="mb-0 fw-bold"><i class="fa-solid fa-bath fs-4 me-2"></i> {{$product->toilet}}</p>
              <p>Baños</p>
            </div>

            <div class="text-center">
              <p class="mb-0 fw-bold"><i class="fa-solid fa-car fs-4 me-2"></i> {{$product->cocheras}}</p>
              <p>Garaje</p>
            </div>

            <div class="text-center">
              <p class="mb-0 fw-bold"><i class="fa-solid fa-house fs-4 me-2"></i> {{$product->metrosCuadradosC}}</p>
              <p>m<sup>2</sup> construidos</p>
            </div>

            <div class="text-center">
              <p class="mb-0 fw-bold"><i class="fa-solid fa-ruler-combined fs-4 me-2"></i> {{$product->metrosCuadradosT}}</p>
              <p>m<sup>2</sup> totales</p>
            </div>
          </div>
        </div>
      </div>

      <!-- INFORMACION DE LA PROPIEDAD -->
      <div class="card border-0">
        <ul class="nav nav-pills nav-fill mb-3 bg-secondary" style="--bs-bg-opacity: .3;" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link py-3 fw-bold rounded-0 text-black active " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Descripción</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link py-3 fw-bold rounded-0 text-black" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Dirección</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link py-3 fw-bold rounded-0 text-black" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Detalles</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link py-3 fw-bold rounded-0 text-black" id="pills-caracteristicas-tab" data-bs-toggle="pill" data-bs-target="#pills-caracteristicas" type="button" role="tab" aria-controls="pills-caracteristicas" aria-selected="false">Caracteristicas</button>
          </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active p-5" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <h5>Descripción</h5>
            <hr class="mb-5">
            <p class="">{{$product->description}}</p>
          </div>

          <div class="tab-pane fade p-5" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <h5>Dirección</h5>
            <hr class="mb-5">
            <div class="row ">
              <div class="col-4">
                <p><strong>Direccion:</strong> {{$product->direccion}}</p>
              </div>
              <div class="col-4">
                @foreach($ciudades as $ciudad)
                @if($ciudad->id == $product->ciudad)
                <p><strong>Ciudad:</strong> {{$ciudad->name}}</p>
                @break
                @endif
                @endforeach
              </div>
              <div class="col-4">
                @foreach($estados as $estado)
                @if($estado->id == $product->region)
                <p><strong>Estado:</strong> {{$estado->name}}</p>
                @break
                @endif
                @endforeach

              </div>
              <div class="col-4">
                @foreach($paises as $pais)
                @if($pais->id == $product->pais)
                <p><strong>País:</strong>{{$pais->name}}</p>
                @break
                @endif
                @endforeach
              </div>
              <!-- <div class="col-4">
                <p><strong>Codigo Postal:</strong> falta codigo postal</p>
              </div> -->
            </div>

            <div class="card border-0">
              <input type="hidden" name="latitud" id="latitud" value="{{$product->latitud}}">
              <input type="hidden" name="longitud" id="longitud" value="{{$product->longitud}}">
              <div id="mapa"> </div>
            </div>

          </div>

          <div class="tab-pane fade p-5" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <h5>Detalles</h5>
            <hr class="mb-5">

            <table class="table">
              <tbody>
                <tr>
                  <td><p><strong>Precio:</strong> {{ $setting->moneda.' '.number_format($product->price,2,".",".")}}</p></td>
                  <td><p><strong>M<sup>2</sup> construidos:</strong> {{$product->metrosCuadradosC}} ft</p></td>
                </tr>
                <tr>
                  <td><p><strong>Baños:</strong> {{$product->toilet}}</p></td>
                  <td><p><strong>Habitaciones:</strong> {{$product->dormitorios}}</p></td>
                </tr>
                <tr>
                  <td><p><strong>Garaje:</strong> {{$product->cocheras}}</p></td>
                  <td><p><strong>Expensas:</strong> {{$product->expensas}}</p></td>
                </tr>
              </tbody>
            </table>

          </div>

          <div class="tab-pane fade p-5" id="pills-caracteristicas" role="tabpanel" aria-labelledby="pills-caracteristicas-tab" tabindex="0">
            <h5>Caracteristicas</h5>
            <hr class="mb-5">
            <div class="row">
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


      <!-- <div class="card border-0 p-5">
        <input type="hidden" name="latitud" id="latitud" value="{{$product->latitud}}">
        <input type="hidden" name="longitud" id="longitud" value="{{$product->longitud}}">
        <h5>Mapa</h5>
        <div id="mapa"> </div>
      </div> -->


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

    <div class="col-lg-4 col-xs-12 ps-2 p-0">
      <div class="tab-container sticky-top bg-white border-0">
        <div class="contents">
          <div id="content1" class="content content-active">
            <div class="row">
              @if (isset($product->agente))
              <div class="text-center mt-3">
                <img src="../img/person-500x328.jpg" alt="" class="w-50 rounded">
                <h4>{{ $product->agente->user->name }}</h4>
                <!-- <p class="text-primary mb-0">Agente</p> -->
              </div>
              @endif

              <div class="col-12 p-5 pt-2">
                <!-- <hr>
                  <a href="#" class="btn btn-primary w-100 fw-bold mb-2">PROGRAMAR UNA
                    VISITA</a> -->
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

                  <button type="submit" class="btn btn-primary w-100 fw-bold">Enviar Correo</button>
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
<!-- </div> -->

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 2,
    spaceBetween: 3,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>

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

@include('frontend.footer')
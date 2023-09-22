@include('frontend.header')

<!-- SLIDER -->
<div class="container-fluid p-0">
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach($slides as $slide)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }} ">
        <img src="{{ asset('image/sliders/'.$slide->image) }}" class="d-block w-100 img-fluid" alt="{{$slide->name}}">
        <div class="carousel-caption pb-5 bg-primsary rounded" style="background: rgb(0,0,0); background: linear-gradient(0deg, rgba(0,0,0,0.3841911764705882) 37%, rgba(0,0,0,0.19091386554621848) 100%);">
          <h5>{{ $slide->title }}</h5>
          <p>{{ $slide->texto }}</p>
        </div>
      </div>

      @endforeach
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

<div class="col-9 mx-auto bg-white p-3" style="--bs-bg-opacity: 1;">
  <form method="POST" action="{{ route('buscarPropiedad') }}" id="rentar" name="rentar" role="form" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-4 col-md-2 mb-3">
        <label class="form-label">Pais</label>
        <select class="form-control form-control-sm" name="pais" id="paisSelect">
          @foreach($paises as $pais)
          <option value="{{ $pais->id }}">{{ $pais->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-4 col-md-2 mb-3">
        <label class="form-label">Estado</label>
        <select class="form-control form-control-sm" id="estadoSelect" name="region">
          <option value="">Seleccione un estado</option>
          <!-- Aquí se cargarán las opciones de los estados en función del país seleccionado -->
        </select>
      </div>

      <div class="col-4 col-md-2 mb-3">
        <label class="form-label">Ciudad</label>
        <select class="form-control form-control-sm" id="ciudadSelect" name="ciudad">
          <option value="">Seleccione una ciudad</option>
          <!-- Aquí se cargarán las opciones de las ciudades en función del estado seleccionado -->
        </select>
      </div>

      <div class="col-4 col-md-2 mb-3">
        <label for="" class="form-label d-block">Tipo</label>
        {{ Form::select('tipo_propiedad',$tipoAll, null,['class' => 'form-select select2s form-control-sm' . ($errors->has('tipoPropiedad') ? ' is-invalid' : ''), 'placeholder' => 'tipo de propiedad']) }}
      </div>

      <div class="col-4 col-md-2 mb-3">
        <label for="" class="form-label d-block">Habitaciones</label>
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
                    
                    ],null, ['class' => 'form-select select2s form-control-sm' . ($errors->has('estadoticket') ? ' is-invalid' : ''), 'placeholder' => 'Dormitorios']) }}
      </div>

      <div class="col-4 col-md-2 mb-3">
        <label for="" class="form-label d-block">Precio</label>
        <span class="text-secondary">{{ $setting->moneda }} </span>
        <output class="form-labels fs-6" id="outprice" name="outprice" for="price">{{number_format($min,2,".",".")}}</output>
        <input type="range" id="precio" name="precio" class="form-range mt-2" min="{{ $min }}" max="{{ $max }}" value="{{ $min }}" onchange="document.getElementById('outprice').value=new Intl.NumberFormat('de-DE').format(value)">
      </div>

      <input type="hidden" name="tipo" value="renta" id="tipo">

      <div class="text-center mb-3">
        <button type="submit" class="btn btn-warning px-5 fw-bold" value="submit" form="rentar">VER RESULTADOS</button>
      </div>
    </div>
  </form>
</div>

{{--<div class="row">
  @if ($message = Session::get('success'))
  <div class="alert alert-success mt-5 text-center" style="z-index: 4">
    <p>{{ $message }}</p>
  </div>
  @elseif($message = Session::get('error'))
  <div class="alert alert-danger mt-5 text-center" style="z-index: 4">
    <p>{{ $message }}</p>
  </div>
  @endif
</div>--}}


<ul class="nav nav-pills my-3 mt-5 d-flex justify-content-center" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Recientes</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Destacados</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

    <!-- TAB PROPIEDADES RECIENTES -->
    <div class="container">
      <div class="row">
        <div class="col-12 text-center px-5">
          <h1 class="text-capitalize fw-bold"> Propiedades recientes</h1>
          <p class="my-4">
            Estas son las últimas propiedades en la categoría Ventas. Puede
            crear la lista utilizando el "último código abreviado de listado" y
            mostrar elementos por categorías específicas.
          </p>
        </div>
      </div>

      <div class="row">

        @foreach ($products as $product)
        <div class="col-12 col-lg-4 col-sm-6">
          <div class="card bg-white border-0 my-1 position-relative">
            @foreach ($product->media as $image)
            <img src="{{asset('product/'.$image->name) }}" alt="imagen no encontrada" class="card-img-top">
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
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

    <!-- PROPIEDADES DESTACADAS -->
    <div class="container">
      <div class="row">
        <div class="col-12 text-center px-5">
          <h1 class="text-capitalize fw-bold">Propiedades Destacadas</h1>
          <p class="my-4">
            Estas son las últimas propiedades en la categoría Ventas. Puede
            crear la lista utilizando el "último código abreviado de listado" y
            mostrar elementos por categorías específicas.
          </p>
        </div>
      </div>
      <div class="row">

        @foreach ($productsDestacados as $product )
        <div class="col-12 col-lg-4 col-sm-6">
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
  </div>
</div>


<!-- PORQUE ELEGIRNOS -->
<div class="container my-5">
  <div class="row">
    <div class="col-12 text-center">
      <h1 class="text-capitalize fw-bold">{{ $info->title_info }}</h1>
      <p class="">
        {{ $info->select_us }}
      </p>
    </div>
  </div>
  <div class="row py-4">
    <div class="col-sm-12 col-lg-3 ">
      <i class="{{ $info->icon_first }} fs-1 mb-5"></i>
      <h2>Vende tu casa</h2>
      <p>
        {{ $info->sell_home }}
      </p>
    </div>

    <div class="col-sm-12 col-lg-3 ">
      <i class="{{ $info->icon_second }} fs-1 mb-5"></i>
      <h2>Alquila tu casa</h2>
      <p>
        {{ $info->rent_home }}
      </p>
    </div>

    <div class="col-sm-12 col-lg-3 ">
      <i class="{{ $info->icon_thrid }} fs-1 mb-5"></i>
      <h2>Compra una casa</h2>
      <p>
        {{ $info->buy_home }}
      </p>
    </div>

    <div class="col-sm-12 col-lg-3 ">
      <i class="{{ $info->icon_fourth }} fs-1 mb-5"></i>
      <h2>Marketing Gratuito</h2>
      <p>
        {{ $info->marketing_free }}
      </p>
    </div>
  </div>
</div>


<!-- EQUIPO DE TRABAJO -->
<div class="container my-5">
  <div class="row">
    <div class="col-12 text-center px-5">
      <h1 class="text-capitalize fw-bold">Nuestros Agentes</h1>
      <p class="my-4">
        Estas son las últimas propiedades en la categoría Ventas. Puede
        crear la lista utilizando el "último código abreviado de listado" y
        mostrar elementos por categorías específicas.
      </p>
    </div>
  </div>
  <div class="row">

    @foreach($vendedorAgente as $agente)
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card border-0 position-relative">
        <div class="position-absolute top-50 start-0 translate-middle-y">
          <div class="row">
            <div class="col-7">
              <span class="badge bg-secondary ms-2">1 anuncio</span>
            </div>
            <div class="col-6">
            </div>
          </div>
        </div>
        <img src="img//person3-500x328.jpg" alt="exposed brick wall in a hipster cafe" />

        <div class="card-content py-2">
          <h3 class="text-center">{{ $agente->name }}</h3>
          <h6 class="text-center">{{ $agente->getRoleNames()[0] }}</h6>
          <p>
            Whether it is working with a first time homebuyer, a luxury home listing or a seasoned inv ...
          </p>
        </div>

        <div class="card-footer">
          <div class="d-flex justify-content-between">
            <div class="d-flex">
              <a class="" href="https://{{ $agente->link_twitter }}" target="_blank">
                <span class="share_list rounded-circle" data-original-title="share">
                  <i class="fa-brands fa-twitter"></i>
                </span>
              </a>

              <a class="" href="https://{{ $agente->link_facebook }}" target="_blank">
                <span class="share_list rounded-circle" data-original-title="share">
                  <i class="fa-brands fa-facebook-f"></i>
                </span>
              </a>

              <a class="" href="https://{{ $agente->link_instagram}}" target="_blank">
                <span class="share_list rounded-circle" data-original-title="share">
                  <i class="fa-brands fa-instagram"></i>
                </span>
              </a>
            </div>

            <div class="d-flex">
              <a class="" href="#">
                <span class="share_list rounded-circle" data-original-title="share" style="   float: right!important; ">
                  <i class="fa-solid fa-share-nodes"></i>
                </span>
              </a>

              <a class="" href="#">
                <span class="share_list rounded-circle" data-original-title="share" style="   float: right!important; ">
                  <i class="fa-solid fa-heart"></i>
                </span>
              </a>

              <a class="" href="#">
                <span class="share_list rounded-circle" data-original-title="share" style="   float: right!important; ">
                  <i class="fa-solid fa-plus"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>


<div class="container my-4">
  <div class="row pb-4">
    <div class="col-12 text-center">
      <h1 class="text-capitalize fw-bold">Nuestros Testimonios</h1>
    </div>
  </div>

  <div class="row">
    @foreach ($testimonios as $t )
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card border-0">
        <div class="d-flex justify-content-center">
          <div class="contenidocard mb-0 p-4">
            <img src="{{ asset('image/testimonio/'.$t->image) }}" class="rounded-circle" alt="exposed brick wall in a hipster cafe" style="height: 90px; width:90px;" />
            <p class="fs-5 mb-0">{{ $t->name }}</p>
            <!-- <p class="fs-6 mb-0">Cliente</p> -->
          </div>
        </div>
        <div class="row">
          <div class="col-12 p-4">
            <p class="mb-0">
              {{ $t->testimonio }}
            </p>
            <!-- <div class="text-warning">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>



<div class="container">
  <div class="card border-0 m-5">

    <div class="text-center">
      <h1 class="fw-bold">Contacta Con Nuestro Equipo</h1>
      <p>Nuestro Expertos Agentes Inmobiliaros estan esperando porti para brindarte toda ayuda posible</p>
    </div>

    <form method="POST" action="{{ route('store.user-contacto') }}" role="form" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-lg-6 col-sm-12  pt-2">
          <div class="form-group">
            <input type="text" required class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
          </div>
        </div>
        <div class="col-lg-6 col-sm-12 pt-2">
          <div class="form-group">
            <input type="number" required class="form-control" name="telefono" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telefono">
          </div>
        </div>
        <div class="col-lg-6 col-sm-12  pt-2">
          <div class="form-group">
            <input type="email" required class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo">
          </div>
        </div>
        <div class="col-lg-6 col-sm-12 pt-2">
          <div class="form-group">
            <input type="text" required class="form-control" name="direccion" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Direccion">
          </div>
        </div>

        <div class="col-12  pt-2">
          <div class="form-group">
            <input type="text" required class="form-control" name="observaciones" id="text" placeholder="Mensaje">
          </div>
        </div>
      </div>

      <div class="d-grid gap-2 mt-4">
        <button type="submit" class="btn btn-warning fw-bold">ENVIAR</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  // Select dependiente de municipio, hereda de estado
  $(function() {
    $('#paisSelect').on('change', onSelectProjectChange);
  });

  function onSelectProjectChange() {
    var project_id = $(this).val();
    console.log(project_id);
    if (!project_id)
      $('#estadoSelect').html(html_select);
    $.get('pais/' + project_id + '/estado', function(data) {
      var html_select = '<option value="">Seleccione su estado</option>'
      for (var i = 0; i < data.length; ++i)
        html_select += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
      $('#estadoSelect').html(html_select);
      console.log(html_select);
      console.log($('#estadoSelect').html(html_select));
    });

  }

  $(function() {
    $('#estadoSelect').on('change', onSelectProjectChanges);
  });

  function onSelectProjectChanges() {
    var project_id2 = $(this).val();
    console.log(project_id2);
    if (!project_id2)
      $('#ciudadSelect').html(html_select2);
    $.get('estado/' + project_id2 + '/ciudad', function(data) {
      var html_select2 = '<option value="">Seleccione su ciudad1</option>'
      for (var a = 0; a < data.length; ++a)
        html_select2 += '<option value="' + data[a].id + '">' + data[a].name + '</option>';
      $('#ciudadSelect').html(html_select2);
      console.log(html_select2);
      console.log($('#ciudadSelect').html(html_select2));
    });

  }
</script>
@include('frontend.footer')
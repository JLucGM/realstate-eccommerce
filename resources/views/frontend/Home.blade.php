@php
$html_tag_data = [];
$title = 'Inicio';
$description= $title
@endphp

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

<div class="col-9 mx-auto p-3">
  <form method="GET" action="{{ route('buscarPropiedad') }}" id="rentar" name="rentar" role="form" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-4 col-md-2 mb-3">
        <label class="form-label">Pais</label>
        <select class="form-control " name="pais" id="paisSelect">
          <option value="">Seleccione un país</option>
          @foreach($paises as $pais)
          <option value="{{ $pais->id }}">{{ $pais->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-4 col-md-2 mb-3">
        <label class="form-label">Estado</label>
        <select class="form-control " id="estadoSelect" name="region">
          <option value="">Seleccione un estado</option>
          <!-- Aquí se cargarán las opciones de los estados en función del país seleccionado -->
        </select>
      </div>

      <div class="col-4 col-md-2 mb-3">
        <label class="form-label">Ciudad</label>
        <select class="form-control " id="ciudadSelect" name="ciudad">
          <option value="">Seleccione una ciudad</option>
          <!-- Aquí se cargarán las opciones de las ciudades en función del estado seleccionado -->
        </select>
      </div>

      <div class="col-4 col-md-2 mb-3">
        <label for="" class="form-label">Tipo</label>
        {{ Form::select('tipo_propiedad',$tipoAll, null,['class' => 'form-select ' . ($errors->has('tipoPropiedad') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de propiedad']) }}
      </div>

      <div class="col-4 col-md-2 mb-3">
        <label for="" class="form-label">Habitaciones</label>
        {{ Form::number('cuartoNumero',null, ['class' => 'form-control ' . ($errors->has('estadoticket') ? ' is-invalid' : ''), 'placeholder' => 'Habitaciones']) }}
      </div>

      <div class="col-4 col-md-2 mb-3">
        <label for="" class="form-label d-block">Precio {{ $setting->monedaSetting->denominacion }}</label>
        <input type="text" id="precio" name="precio" class="form-control" value="{{ old('precio') }}" placeholder="Precio">
      </div>


      <input type="hidden" name="tipo" value="renta" id="tipo">

      <div class="text-center mb-3">
        <button type="submit" class="btn btn-warning px-5 fw-bold" value="submit" form="rentar">VER RESULTADOS</button>
      </div>
    </div>
  </form>
</div>

<!-- PROPIEDADES RECIENTES -->
<div class="container mt-4">
  <div class="row">
    <div class="col-12 text-start pb-4">
      <h3 class="text-uppercase fw-bold"> Propiedades recientes</h3>
    </div>
  </div>

  <div class="row">

    @foreach ($products as $product)
    <div class="col-12 col-lg-4 col-sm-6">
      <a href="{{route('producto.show', [$product->id])}}" class="card btns text-decoration-none p-0 shadow-sm border-0 my-1 position-relative">

        <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" class="card-img-top rounded-bottom" style="height: 250px; background-size: cover;" alt="Imagen de la propiedad">

        <div class="card-body p-3">
          <h5 class="card-title link-dark fw-bold">{{ $product->name }}</h5>
          <p class="card-text text-secondary mb-0 fs-7"><i class="bi bi-geo-alt-fill me-2 fs-6 "></i>{{ $product->direccion }}</p>

          <table class="table table-borderless">
            <thead>
            <tbody>
              <tr>
                <td>
                  <p class="link-secondary mb-0 fs-7"><i class="fa-solid fa-bed me-2 fs-6"></i>{{ $product->dormitorios }} Habitaciones</p>
                </td>
                <td>
                  <p class="link-secondary mb-0 fs-7"><i class="fa-solid fa-toilet me-2 fs-6"></i>{{ $product->toilet }} Baños</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="link-secondary mb-0 fs-7"><i class="fa-solid fa-ruler-combined me-2 fs-6"></i>{{ $product->metrosCuadradosT }} m<sup>2</sup> totales</p>
                </td>
                <td>
                  <p class="link-secondary mb-0 fs-7"><i class="fa-solid fa-car me-2 fs-6"></i>{{ $product->cocheras }} Estacionamiento</p>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="card-footer rounded-bottom bg-white px-3 pt-3">
          <p class="fs-6 fw-bold link-dark">{{ $setting->monedaSetting->denominacion.' '.number_format($product->price,2,".",".")}}</p>
        </div>
        <div class="position-absolute top-10 start-90 translate-middle" style="z-index: 1;">
          <div class="bg-success rounded p-2 ">
            <span class="text-white fs-7 mb-0 text-nowrap">{{ $product->status }}</span>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>

<!-- PROPIEDADES DESTACADAS -->
<div class="container mt-4">
  <div class="row">
    <div class="col-12 text-start pb-4">
      <h3 class="text-uppercase fw-bold">Propiedades Destacadas</h3>
    </div>
  </div>

  <div class="row">
    @foreach ($productsDestacados as $product )
    <div class="col-12 col-lg-4 col-sm-6">
      <a href="{{route('producto.show', [$product->id])}}" class="card btns text-decoration-none p-0 shadow-sm border-0 my-1 position-relative">

        <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" class="card-img-top rounded-bottom" style="height: 250px; background-size: cover;" alt="Imagen de la propiedad">

        <div class="card-body p-3">
          <h5 class="card-title link-dark fw-bold">{{ $product->name }}</h5>
          <p class="card-text text-secondary mb-0 fs-7"><i class="bi bi-geo-alt-fill me-2 fs-6 "></i>{{ $product->direccion }}</p>

          <table class="table table-borderless">
            <thead>
            <tbody>
              <tr>
                <td>
                  <p class="link-secondary mb-0 fs-7"><i class="fa-solid fa-bed me-2 fs-6"></i>{{ $product->dormitorios }} Habitaciones</p>
                </td>
                <td>
                  <p class="link-secondary mb-0 fs-7"><i class="fa-solid fa-toilet me-2 fs-6"></i>{{ $product->toilet }} Baños</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="link-secondary mb-0 fs-7"><i class="fa-solid fa-ruler-combined me-2 fs-6"></i>{{ $product->metrosCuadradosT }} m<sup>2</sup> totales</p>
                </td>
                <td>
                  <p class="link-secondary mb-0 fs-7"><i class="fa-solid fa-car me-2 fs-6"></i>{{ $product->cocheras }} Estacionamiento</p>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="card-footer rounded-bottom bg-white px-3 pt-3">
          <p class="fs-6 fw-bold link-dark">{{ $setting->monedaSetting->denominacion.' '.number_format($product->price,2,".",".")}}</p>
        </div>
        <div class="position-absolute top-10 start-90 translate-middle" style="z-index: 1;">
          <div class="bg-success rounded p-2 ">
            <span class="text-white fs-7 mb-0 text-nowrap">{{ $product->status }}</span>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>

<!-- PORQUE ELEGIRNOS -->
@if($setting->status_section_one == 1)
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
      <i class="{{ $info->icon_first }} fs-1 p-0 m-0"></i>
      <h2 class="mt-5">{{ $info->title_first }}</h2>
      <p>
        {{ $info->sell_home }}
      </p>
    </div>

    <div class="col-sm-12 col-lg-3 ">
      <i class="{{ $info->icon_second }} fs-1 p-0 m-0"></i>
      <h2 class="mt-5">{{ $info->title_second  }}</h2>
      <p>
        {{ $info->rent_home }}
      </p>
    </div>

    <div class="col-sm-12 col-lg-3 ">
      <i class="{{ $info->icon_thrid }} fs-1 p-0 m-0"></i>
      <h2 class="mt-5">{{ $info->title_thrid  }}</h2>
      <p>
        {{ $info->buy_home }}
      </p>
    </div>

    <div class="col-sm-12 col-lg-3 ">
      <i class="{{ $info->icon_fourth }} fs-1 p-0 m-0"></i>
      <h2 class="mt-5">{{ $info->title_fourth  }}</h2>
      <p>
        {{ $info->marketing_free }}
      </p>
    </div>
  </div>
</div>
@endif

<!-- EQUIPO DE TRABAJO -->
@if($setting->status_section_two == 1)
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
      <div class="card border-0 shadow-sm position-relative">
        <img class="profile rounded" alt="profile" src="{{asset('img/profile/'.$agente->avatar)}}" />

        <div class="card-content py-2">
          <h3 class="text-center">{{ $agente->name.' '.$agente->last_name}}</h3>
          <h6 class="text-center">{{-- $agente->getRoleNames()[0] --}}</h6>
          <table class="table table-borderless mx-2">
            <tbody>
              <tr>
                <th class="d-flex align-items-center"><i class="fa-solid fa-at me-2"></i>
                  <p class="font-normal m-0">{{ $agente->email }}</p>
                </th>
              </tr>
              <tr>
                <th class="d-flex"><i class="fa-solid fa-phone me-2"></i>
                  <p class="font-normal m-0">{{ $agente->whatsapp }}</p>
                </th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endif

@if($setting->status_section_three == 1)
<div class="container my-4">
  <div class="row pb-4">
    <div class="col-12 text-center">
      <h1 class="text-capitalize fw-bold">Nuestros Testimonios</h1>
    </div>
  </div>

  <div class="row">
    @foreach ($testimonios as $t )
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card shadow-sm border-0">
        <div class="card-content">
          <table class="table table-borderless mx-2">
            <tbody>
              <tr>
                <td class="text-center"><img src="{{ asset('image/testimonio/'.$t->image) }}" class="rounded-circle" style="height: 120px; width:120px;" /></td>
              </tr>
              <tr>
                <td>{{ $t->name }}</td>
              </tr>
              <tr>
                <td>"{{ $t->testimonio }}"</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endif

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
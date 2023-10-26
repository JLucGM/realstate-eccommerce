@php
$html_tag_data = [];
$title = 'Resultado de busqueda';
$description= $title
@endphp

@include('frontend.header')

<!-- <div id="map" class="col-12" style="height: 500px; width: 100%;"> </div> -->
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

<div class="container" style="padding-bottom: 5rem;">
    <div class="row">

        @if (sizeof($productsSearch)>0)
        @foreach ($productsSearch as $product )

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
        @else

        <div class="alert alert-danger mt-1">
            <p>Lo sentimos, no hay propiedades que coincidan con tu busqueda. </p>
        </div>
        <!-- <div class="alert alert-info mt-1">
            <p>A continuacion listaremos algunas propiedades que quizas puedan interesarte </p>
        </div> -->

        @foreach ($products as $product )

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
        @endif

        {{ $products->links() }}
    </div>
</div>

@if (sizeof($productsSearch) >0)
@include('frontend.functionmapsSearch')
@else
@include('frontend.functionmaps')

@endif

@include('frontend.footer')
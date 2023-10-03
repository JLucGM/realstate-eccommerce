@php
$html_tag_data = [];
$title = 'Propiedades';
$description= $title
@endphp
@include('frontend.header')

<div class="container px-5 mb-3">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
        <h3 class="fw-bold text-uppercase">{{$title}}</h3>
      </div>

      {{--<div class="col-12 mx-auto p-3">
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
      </div>--}}

      <div class="row mb-3">
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
              <p class="fs-6 fw-bold link-dark">{{ $setting->moneda.' '.number_format($product->price,2,".",".")}}</p>
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
      {{ $products->links() }}
    </div>


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
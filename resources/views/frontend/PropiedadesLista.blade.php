@include('frontend.header')

<div class="container-fluid px-5">
  <div class="row">
    <div class="col-12 col-lg-8">
      <div class="col-12">
        <h1 class="">Propiedades</h1>
      </div>

      <div class="row">
        @foreach ($products as $product )
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

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>

    </div>

    <!-- SECCION DE FILTRO -->
    <div class="col-12 col-lg-4">
      <div class="bg-white m-3 p-4 me-5" style="--bs-bg-opacity: .6;">
        <form method="POST" action="{{ route('buscarPropiedad') }}" id="rentar" name="rentar" role="form" enctype="multipart/form-data">
          @csrf
          <div class="ronw">
            <div class="mb-3">
              <label for="" class="text-secondary d-block">REGIÓN DE LA PROPIEDAD</label>
              <select class="form-select select2s" id="region" name="region">
              </select>
            </div>

            <div class="mb-3">
              <label for="" class="text-secondary d-block">CIUDAD DE LA PROPIEDAD</label>
              <select class="form-select select2s" name="ciudad" id="city">
              </select>
            </div>

            <div class="mb-3">
              <label for="" class="text-secondary d-block">TIPO DE PROPIEDAD</label>
              {{ Form::select('tipo_propiedad',$tipoAll, null,['class' => 'form-select select2s' . ($errors->has('tipoPropiedad') ? ' is-invalid' : ''), 'placeholder' => 'tipo de propiedad']) }}
            </div>

            <div class="mb-3">
              <label for="" class="text-secondary d-block">NÚMERO DE HABITACIONES</label>
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
                    
                    ],null, ['class' => 'form-select select2s' . ($errors->has('estadoticket') ? ' is-invalid' : ''), 'placeholder' => 'Dormitorios']) }}
            </div>

            <div class="mb-3">
              <label for="" class="text-secondary d-block">PRECIO</label>
              <span>{{ $setting->moneda }} </span>
              <output class="text-secondary" id="outprice" name="outprice" for="price">{{number_format($min,2,".",".")}}</output>
              <input type="range" id="precio" name="precio" class="form-range mt-2" min="{{ $min }}" max="{{ $max }}" value="{{ $min }}" onchange="document.getElementById('outprice').value=new Intl.NumberFormat('de-DE').format(value)">
            </div>

            <input type="hidden" name="tipo" value="renta" id="tipo">

            <div class="d-grid gap-2 mb-3">
              <button type="submit" class="btn btn-warning" value="submit" form="rentar">VER RESULTADOS</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@include('frontend.footer')

@include('frontend.functionmaps')
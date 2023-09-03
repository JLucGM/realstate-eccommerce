@include('frontend.header')

<div class="banner text-center text-white">
  <h1 class="pt-5 fw-bold">Contacto</h1>
</div>

<div class="bannercontacto">
  <div class="capacontacto">
    <div class="container">
      <div class="row">

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-5">
          <p>{{ $message }}</p>
        </div>
        @elseif($message = Session::get('error'))
        <div class="alert alert-danger mt-5">
          <p>{{ $message }}</p>
        </div>
        @endif
      </div>

      <div class="row py-5">
        <div class="col-lg-8 col-sm-12">
          <h1 class="tituloseccion">Mantente en contacto con nosotros</h1>
          <p>Nuestro Expertos Agentes Inmobiliaros estan esperando porti para brindarte toda ayuda posible</p>

          <div class="">
            <form method="POST" action="{{ route('store.user-contacto') }}" role="form" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-6 col-sm-12 pt-2">
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
                    <input type="text" required class="form-control" name="mensaje" id="text" placeholder="Mensaje">
                  </div>
                </div>
              </div>

              <div class="d-grid gap-2 my-3">
                <button type="submit" class="btn btn-warning">ENVIAR</button>
              </div>
            </form>
          </div>
          <div class="col-lg-6 col-sm-12">

          </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
          <div class="propiedades">
            <h5 class="text-uppercase mb-4"> Otras Propiedades</h5>

            @foreach ($productFooter as $p )

            <div class="d-flex foot">
              @foreach ($p->media as $image)
              <img src="{{$image->getUrl()}}" alt="" style="width: 80px; height:80px;">
              @break
              @endforeach
              <div class="textofoot">
                <h6 style="color: #eaeaea;">{{ $p->nombre }}</h6>
                <strong>{{ $setting->moneda }} {{ number_format($p->price,2,".",".") }}</strong>
              </div>
            </div>

            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('frontend.footer')
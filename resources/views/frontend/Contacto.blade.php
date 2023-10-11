@php
$html_tag_data = [];
$title = 'Contacto';
$description= $title
@endphp

@include('frontend.header')

<div class="banner text-center text-white">
  <h1 class="pt-5 fw-bold">{{$title}}</h1>
</div>

<div class="container ">

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

  <div class="row my-3 rounded shadow-sm bg-white">
    <div class="col-12">
      <div class="text-center">
        <h1 class="fw-bold">Mantente en contacto con nosotros</h1>
        <p>Nuestro Expertos Agentes Inmobiliaros estan esperando porti para brindarte toda ayuda posible</p>
      </div>
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
              <input type="text" required class="form-control" name="apellido" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="apellido">
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
          <div class="col-lg-12 col-sm-12 pt-2">
            <div class="form-group">
              <input type="text" required class="form-control" name="direccion" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Dirección de interes">
            </div>
          </div>

          <div class="col-12  pt-2">
            <div class="form-group">
              <input type="text" required class="form-control" name="observaciones" id="text" placeholder="Mensaje">
            </div>
          </div>
        </div>

        <div class="d-grid gap-2 my-3">
          <button type="submit" class="btn btn-warning fw-bold">ENVIAR</button>
        </div>
      </form>
    </div>

  </div>

</div>

@include('frontend.footer')
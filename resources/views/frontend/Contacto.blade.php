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
    <div class="alert alert-danger mt-5 ">
      <p class="text-center">{{ $message }}</p>
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
              <input type="text" class="form-control {{ ($errors->has('name') ? ' is-invalid' : '') }}" name="name" placeholder="Nombre">
              {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
          <div class="col-lg-6 col-sm-12 pt-2">
            <div class="form-group">
              <input type="text" class="form-control {{ ($errors->has('apellido') ? ' is-invalid' : '') }}" name="apellido" placeholder="apellido">
              {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
          <div class="col-lg-6 col-sm-12 pt-2">
            <div class="form-group">
              <input type="text" class="form-control {{ ($errors->has('telefonoContacto1') ? ' is-invalid' : '') }}" name="telefonoContacto1" placeholder="Telefono">
              {!! $errors->first('telefonoContacto1', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
          <div class="col-lg-6 col-sm-12  pt-2">
            <div class="form-group">
              <input type="email" class="form-control {{ ($errors->has('email') ? ' is-invalid' : '') }}" name="email" placeholder="Correo">
              {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
          <div class="col-lg-12 col-sm-12 pt-2">
            <div class="form-group">
              <input type="text" class="form-control {{ ($errors->has('direccion') ? ' is-invalid' : '') }}" name="direccion" placeholder="Dirección de interes">
              {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>

          <div class="col-12  pt-2">
            <div class="form-group">
              <input type="text" class="form-control {{ ($errors->has('observaciones') ? ' is-invalid' : '') }}" name="observaciones" id="text" placeholder="Mensaje">
              {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
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
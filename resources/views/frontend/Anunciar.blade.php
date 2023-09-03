@include('frontend.header')

<div class="container py-5">
  <div class="row ">
    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-5">
      <p>{{ $message }}</p>
    </div>
    @elseif($message = Session::get('error'))
    <div class="alert alert-danger mt-5">
      <p>{{ $message }}</p>
    </div>
    @endif
    <div class="col-12 col-lg-6">
      <h1 class="text-dark">Publica Tu Inmueble</h1>
      <p class="text-dark" style="width:94%;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis repellendus ea consequatur maxime. Architecto aliquam, a, consequuntur rerum repellendus accusantium libero dolorum quae eligendi commodi numquam, quis velit? Tempora, quibusdam.</p>
    </div>
    <div class="col-12 col-lg-6">
      <div class="card p-5">
        <div class="formcontactosection">
          <form method="POST" action="{{ route('store.user-anunciar') }}" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <h3 class="text-center">Registrate para publicar tu inmueble</h3>
              <div class="col-lg-6 col-sm-12  pt-2">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 pt-2">
                <div class="form-group">
                  <input type="number" class="form-control" name="telefono" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telefono">
                </div>
              </div>
              <div class="col-lg-6 col-sm-12  pt-2">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo">
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 pt-2">
                <div class="form-group">
                  <input type="text" class="form-control" name="direccion" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Direccion">
                </div>
              </div>

              <div class="col-12  pt-2">
                <div class="form-group">
                  <input type="text" class="form-control" name="mensaje" id="text" placeholder="Mensaje">
                </div>
              </div>
            </div>

            <div class="col-12 pt-4">
              <button type="submit" class="btn btn-primary" style="width: 100%;">Enviar</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@include('frontend.footer')
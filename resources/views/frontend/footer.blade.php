<div class="container-fluid fondofmooter">
  <div class="container">
    <footer class="py-5">
      <div class="row">
        <div class="col-md-4 mb-3">
          <a class="btn" href="{{ route('home') }}">
            <img src="{{ asset('image/' . $setting->logo_empresa) }}" alt="{{$setting->name}}" class="logo" width="60px" height="auto" />
          </a>
          <p>{{$setting->description}}</p>

        </div>
        <div class="col-6 col-md-2 mb-3">
          <h5>Propiedades</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="{{ route('propiedad.lista',[$tipo='all']) }}" class="nav-link p-0 text-body-secondary">Todos</a></li>
            <li class="nav-item mb-2"><a href="{{ route('propiedad.lista',[$tipo='Alquiler']) }}" class="nav-link p-0 text-body-secondary">Alquiler</a></li>
            <li class="nav-item mb-2"><a href="{{ route('propiedad.lista',[$tipo='Venta']) }}" class="nav-link p-0 text-body-secondary">Venta</a></li>
            <li class="nav-item mb-2"><a href="{{ route('propiedad.lista',[$tipo='AlquilerT']) }}" class="nav-link p-0 text-body-secondary">Alquiler temporal</a></li>
          </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
          <h5>Useful Links</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Nosotros</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Servicios</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
          </ul>
        </div>

        <div class="col-md-4 offset-md- mb-3">
          <h5>Detalles de contacto</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2 "><a href="#" class="nav-link p-0 text-body-secondary"><i class="fa-solid fa-location-dot me-2"></i>{{$setting->direccion}}</a></li>
            <li class="nav-item mb-2"><a href="tel:{{$setting->telefono}}" class="nav-link p-0 text-body-secondary"><i class="fa-solid fa-phone me-2"></i>{{$setting->telefono}}</a></li>
            <li class="nav-item mb-2"><a href="mailto:{{$setting->email}}" class="nav-link p-0 text-body-secondary"><i class="fa-regular fa-envelope me-2"></i>{{$setting->email}}</a></li>
          </ul>
        </div>
      </div>

      <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <div class="">
          <p>© 2023 <a class="link-offset-2 link-underline link-underline-opacity-0 text-decoration-none" href="https://softandnet.com" target="_blank">Softandnet.</a> All right reserved.</p>
        </div>
        <div class="">

          <div class="d-flex">
            @if(isset($setting->facebook))
            <a class="btn fw-bold" href="{{$setting->facebook}}"><i class="bi bi-facebook"></i> </a>
            @endif
            @if(isset($setting->twitter))
            <a class="btn fw-bold" href="{{$setting->twitter}}"><i class="bi bi-twitter"></i></a>
            @endif
            @if(isset($setting->instagram))
            <a class="btn fw-bold" href="{{$setting->instagram}}"><i class="fa-brands fa-instagram"></i></a>
            @endif
            @if(isset($setting->linkedin))
            <a class="btn fw-bold" href="{{$setting->linkedin}}"><i class="fa-brands fa-linkedin"></i></a>
            @endif
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<script type="text/javascript">
  // In your Javascript (external.js resource or <script> tag)
  $(document).ready(function() {
    $('.select2').select2({
      theme: "classic"
    });
  });
</script>

</body>

</html>
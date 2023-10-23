<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$title}}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <!-- <script src="{{asset('js/enable-push.js')}}"></script> -->

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body class="text-bg-light">
  <!-- <div class="d-flex justify-content-between px-5 pt-3">
    <div class="d-flex">
      <a class="btn fw-bold" href="#">
        <i class="bi bi-facebook"></i> </a>
      <a class="btn fw-bold" href="#">
        <i class="bi bi-twitter"></i>
      </a>
      <a class="btn fw-bold" href="#">
        <i class="bi bi-google"></i>
      </a>
    </div>

    <div>
      <a href="#" class="btn"><i class="fa-sharp fa-solid fa-phone"></i> 300-555-6789</a>
    </div>

  </div> -->

  <nav class="navbar navbar-expand-lg bg-white py-0 sticky-top" data-bs-theme="dark" style="z-index: 2;">
    <div class="container-fluid px-5">

      <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <a class="btn" href="{{ route('home') }}">
          <img src="{{ asset('image/' . $setting->logo_empresa) }}" alt="{{$setting->name}}" class="logo" width="60px" height="auto" />
        </a>
        <ul class="navbar-nav ms-auto mt-2 pb-2 mb-lg-0">
          <li class="nav-item " style="margin-left: 25px;">
            <a class="btn nav-link " href="{{ route('home') }}">
              Inicio
            </a>
          </li>
          <li class="nav-item dropdown" style="margin-left: 25px;">
            <a class="btn nav-link dropdown-toggle " href="#" data-bs-toggle="dropdown" aria-expanded="false">
              Propiedades
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item " href="{{ route('propiedad.lista',[$tipo='all']) }}">Todos</a></li>
              <li><a class="dropdown-item " href="{{ route('propiedad.lista',[$tipo='Alquiler']) }}">Alquiler</a></li>
              <li><a class="dropdown-item " href="{{ route('propiedad.lista',[$tipo='Venta']) }}">En venta</a></li>
              <li><a class="dropdown-item " href="{{ route('propiedad.lista',[$tipo='AlquilerT']) }}">Alquiler temporal</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="btn nav-link " href="{{ route('blog.index') }}">
              Blog
            </a>
          </li>

          <li class="nav-item">
            <a class="btn nav-link " href="{{ route('contactacto.web') }}">
              Contacto
            </a>
          </li>
        </ul>

        {{--<a href="{{ route('propiedad.anunciar') }}" class="btn btn-outline-primary">Publicar</a>--}}
        @if(auth()->check())
        <!-- Mostrar ciertas cosas si el usuario está logueado -->
        <a href="{{route('Dashboard')}}" class="btn btn-primary ms-1 rounded-pill">Panel</a>
        @else
        <!-- Mostrar otras cosas si el usuario no está logueado -->
        <a href="{{route('login')}}" class="btn ms-1 nav-link"><i class="fa-regular fa-circle-user fs-4"></i></a>
        @endif

      </div>
    </div>
  </nav>
@php
$html_tag_data = [];
$title = $post->name;
$description= $title
@endphp

@include('frontend.header')

<div class="container mt-2">

  <div class="bg-white rounded-top shadow-sm">

    <h2 class="card-title text-start p-3 m-0 fw-bold">{{ $post->name }}</h2>
    <div class="px-3">{!! $post->extract !!}</div>
    <div class="float-start px-3 py-5">
      <div class="d-flex align-items-center">
        <p class="mb-0 text-black me-1">Por: </p>
        <p class="mb-0 text-secondary"> {{$post->user->name }}</p>
      </div>
      <p class="mb-0 text-secondary">{{ $post->created_at->format('d/m/Y') }}</p>
    </div>
    <img src="{{ asset('img/posts/' . $post->img) }}" class="img-fluid card-img-top  rounded mx-auto " alt="{{ $post->name }}">
  </div>

  <div class="row ">
    <div class="col-lg-8 col-12">
      <div class="card border-0 bg-white shadow-sm mb-3 p-0 my-3">
        <div class="card-body">
          <div class="px-2">{!! $post->body !!}</div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-12">

      <div class="my-3">
        <div class="border-0 bg-white shadow-sm rounded p-3">
          <h6 class="fw-bold px-3">Entradas recientes</h6>
          <div class="card my-1 border-0">
            @foreach ($postsSide as $post)
            <div class="card-body">
              <a href="{{ route('blog.show',$post) }}" class="card-title fw-bold">{{$post->name}}</a>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="border-0 bg-white shadow-sm rounded p-3">
        <h6 class="fw-bold px-3">Propiedades recientes</h6>
        @foreach ($products as $product)
        <a href="{{route('producto.show', [$product->id])}}" class="card text-decoration-none p-0  border-0 rounded-4 my-1 position-relative">
          <div class="card border-0 mb-3">
            <div class="row g-0">
              <div class="col-md-4 align-self-center">
                <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" class="img-fluid rounded-start" alt="{{$product->portada}}">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h6 class="card-title link-dark fw-bold">{{ $product->name }}</h6>
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
              </div>
            </div>
          </div>
        </a>
        @endforeach
      </div>

      {{--<div class="my-4">
        <h6 class="fw-bold">Categorias</h6>
        <ul class="list-group list-group-flush text-primary">
          @foreach ($categorias as $category)
          <li class="list-group-item">
            <a class="btn text-primary" href="#">{{ $category->name }}</a>
          </li>
          @endforeach
        </ul>
      </div>--}}
    </div>
  </div>
</div>

@include('frontend.footer')
@php
$html_tag_data = [];
$title = 'Blog';
$description= $title
@endphp

@include('frontend.header')

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
    <div class="col-12 seccionnosotros">
    </div>
  </div>



  <div class="row">
    <div class="col-lg-8 col-12">
      <div class="row d-md-flex ">
        @foreach ($posts as $post)
        <div class="col-12 mt-3">
          <div class="card border-0 rounded shadow-sm">
            <div class="row g-0">
            <a class="btn p-0 m-0 border-0" href="{{ route('blog.show',$post) }}">
              <img src="{{ asset('img/posts/'.$post->img) }}" style="width: 100%; " class="card-img-top rounded-bottom" alt="{{$post->name}}">
            </a>
              <div class="card-body ">
                <a class="btn px-0" href="{{ route('blog.show',$post) }}">
                  <h3 class="fw-bold">{{$post->name}}</h3>
                </a>
                {{--@foreach ($post->tags as $tag)
                <span class="badge rounded-pill ">ss{{$tag->name}}</span>
                @endforeach--}}

                {!!$post->extract!!}
              </div>
              <div class="card-footer bg-white d-flex justify-content-between fs-7">
                <div class="float-start">
                  <p class="mb-0 text-black"><i class="bi bi-pencil"></i> {{ $post->user->name }}</p>
                  <p class="mb-0 text-black"><i class="bi bi-tag fs-6"></i> {{$post->category->name}}</p>
                </div>
                <div class="float-end">
                  <p class="mb-0 text-black"><i class="bi bi-calendar"></i> {{ $post->created_at->format('d/m/Y') }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
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
    </div>
  </div>
</div>

@include('frontend.footer')
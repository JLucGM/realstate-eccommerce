@php
$html_tag_data = [];
$title = $post->name;
$description= $title
@endphp

@include('frontend.header')

<section class="p-5 mt-5 ">
  <div class="card border-0 p-1  mb-5 ">
    <div class="d-flex my-3">
      <div class="me-2">
        <p class="text-white bg-secondary mb-0 p-3">
          {{$post->created_at}}
        </p>
      </div>
      <div class="d-block">
        <a class="btn" href="{{ route('blog.show',$post) }}">
          <h4 class="card-title fw-bold">{{$post->name}}</h4>
        </a>
        <p class="ms-3 mb-0">Autor: {{ $post->user->name }}</p>
      </div>
    </div>

    <div class="row ">
      <div class="col-12">
        <img src="{{ asset('img/posts/' . $post->img) }}" class="img-fluid card-img-top   mx-auto " alt="{{ $post->name }}">
      </div>
      <div class="col-sm-12 d-lg-none d-md-block">
        <div class="card-body px-5">
          <h3 class="card-title text-center">{{ $post->name }}</h3>
          <div>{!! $post->extract !!}</div>
          <p class="text-warning fst-italic"> {{ $post->created_at }} / {{ $post->user->name }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row ">
    <div class="col-lg-9 col-12">
      <div class="card p-1 border-white mb-3 ">
        <div class="card-body mt-5">
          <div>{!! $post->body !!}</div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-12">

      <div class="my-4">
        <h3 class="fw-bold">REDES SOCIALES</h3>
        <div class="d-flex justify-content-between border p-3">
          <a href="#"><i class="bi bi-facebook fs-3 text-success"></i></a>
          <a href=""><i class="bi bi-twitter fs-3 text-success"></i></a>
          <a href=""><i class="bi bi-instagram fs-3 text-success"></i></a>
        </div>
      </div>

      <div class="my-4">
        <h3 class="fw-bold">CATEGORÍAS</h3>
        <ul class="list-group list-group-flush text-primary">
          @foreach ($categorias as $category)
          <li class="list-group-item">
            <a class="btn text-primary" href="#">{{ $category->name }}</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>

@include('frontend.footer')
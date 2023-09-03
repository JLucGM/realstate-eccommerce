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
    <div class="col-lg-9 col-12">
      <h1 class="fw-bold">Blog</h1>

      <div class="row d-md-flex ">
        @foreach ($posts as $post)
        <div class="col-12 my-5 mx-50   ">
          <div class="col">
            <div class="card border-0 ">
              <div class="row g-0">
                <div class=" col-lg-12 col-md-12 col-sm-12 ">
                  <div class="d-flex my-3">
                    <div class=" me-2">
                      <p class="bg-secondary text-white mb-0 p-3">
                        {{$post->created_at->format('d/m/Y')}}
                      </p>
                    </div>
                    <div class="d-block">
                      <a class="btn" href="{{ route('blog.show',$post) }}"><h4 class="card-title fw-bold">{{$post->name}}</h4></a>
                      <p class="ms-3 mb-0">Autor: {{ $post->user->name }}</p>
                    </div>
                  </div>
                  <img src="{{ asset('img/posts/'.$post->img) }}" style="width: 100%; " class="card-img-top" alt="{{$post->name}}">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12  ">
                  <div class="card-body ">
                    @foreach ($post->tags as $tag)
                    <span class="badge rounded-pill bg-{{$tag->color}}">{{$tag->name}}</span>
                    @endforeach

                    <p class="card-text">{!!$post->extract!!}</p>
                    <div class="justify-content-start">
                      <a href="{{ route('blog.show',$post) }}" class="btn btn-outline-secondary">Leer más</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>

        </div>


        @endforeach
        <div class="mt-4">
          {{$posts->links()}}
        </div>
      </div>

    </div>
    <div class="col-lg-3 col-12">
      <div class="my-3">
        <h3 class="fw-bold">REDES SOCIALES</h3>
        <div class="d-flex justify-content-between border p-3">
          <a href="#"><i class="bi bi-facebook fs-3 text-success"></i></a>
          <a href=""><i class="bi bi-twitter fs-3 text-success"></i></a>
          <a href=""><i class="bi bi-instagram fs-3 text-success"></i></a>
        </div>
      </div>

      <div class="my-3">
        <h3 class="fw-bold">ÚLTIMAS PÚBLICACIONES</h3>
        <div class="border p-3">
          @foreach ($posts as $post)
          <div class="card my-1 border-0">
            <div class="card-body">
              <h5 class="card-title fw-bold">{{$post->name}}</h5>
              <p class="text-muted mb-0 fs-7">
                {{$post->created_at}}
              </p>
              <p class="card-text text-muted">{!!$post->extract!!}</p>
              <a href="{{ route('blog.show',$post) }}" class="btn btn-outline-secondary">Leer más</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      
    </div>
  </div>
</div>

@include('frontend.footer')
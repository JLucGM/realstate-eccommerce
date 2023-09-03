@extends('layouts.welcome')

@section('content')
    <section class="bg-texture    mb-5 py-5">
        <div class="container">
            <h2 class="text-center text-white">Categoria</h2>
            <h3 class="text-center text-warning text-card ">{{$category->name}}</h3>
            <div class="row d-md-flex my-4">
                <div class="col-12 h4 text-white my-5">El blog de PdAcademy</div>
                @foreach ($posts as $post)
                <div class="col-md-4 my-5 mx-50 ">
                    <div class="col">
                        <div class="card shadow shadow-lg bg-transparen ">
                            <img src="{{ asset('img/posts/'.$post->img) }}" style="width: 100%;" class="card-img-top"
                                alt="...">
                            <div class="card-body ">
                                @foreach ($post->tags as $tag)
                                <span class="badge rounded-pill bg-{{$tag->color}}">{{$tag->name}}</span>
                                @endforeach
                                <h4 class="card-title ">{{$post->name}}</h4>
                                <div class="row justify-content-center mt-5">
                                    <a href="{{ route('blog.show',$post) }}" class="col-3 btn btn-warning mx-3">ver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="mt-4">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection

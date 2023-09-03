@php
    $html_tag_data = [];
    $title = 'Lista de slides';
    $description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/products.list.js"></script>
@endsection

@section('content')
   

     


        <div class="card">

             <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                               <h1>
                                {{"Lista de Post"}}
                                </h1> 
                            </span>

                             <div class="float-right">
                                <a href="{{route('posts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{"Agregar nuevo" }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                  

                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>


                            <td width="10px"> <a class="btn btn-success btn-sm" href="{{route('posts.edit',$post)}}">Editar</a></td>


                            <td width="10px"> <form action="{{route('posts.destroy',$post)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form></td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection

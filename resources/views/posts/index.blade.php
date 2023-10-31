@php
$html_tag_data = [];
$title = 'Lista de posts';
$description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#tabla-posts');
    });
</script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between">
                    <h2>{{$title}}</h2>

                    <a href="{{route('posts.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">{{"Crear" }}</a>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <table class="table table-striped table-hover" id="tabla-posts">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Autor</th>
                                <th>Status</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->user->name.' '.$post->user->last_name}}</td>
                                <td>
                                    @if($post->status == 1)
                                    <span class="badge bg-info">Borrador</span>
                                    @else($post->status == 2)
                                    <span class="badge bg-success">Publicado</span>
                                    @endif
                                </td>

                                <td class="text-end">
                                    <form action="{{route('posts.destroy',$post)}}" method="POST">
                                        @csrf
                                        <a class="btn btn-success btn-sm" href="{{route('posts.edit',$post)}}"><i class="fa fa-fw fa-edit"></i></a>
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-fw fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
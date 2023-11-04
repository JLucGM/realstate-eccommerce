@php
$html_tag_data = [];
$title = 'Lista de tags';
$description= 'Ecommerce Customer List Page'
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
        new DataTable('#tabla-tags');
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
                    @can('admin.tags.create')
                    <a class="btn btn-success" href="{{ route('tags.create') }}">
                        Crear
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover" id="tabla-tags">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nombre</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$tag->name}}</td>

                                <td class="text-end">
                                    <form action="{{route('tags.destroy',$tag)}}" method="POST">
                                        @can('admin.tags.edit')
                                        <a class="btn btn-success btn-sm" href="{{route('tags.edit',$tag)}}"><i class="fa fa-fw fa-edit"></i></a>
                                        @endcan
                                        @csrf
                                        @method('delete')
                                        @can('admin.tags.delete')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-fw fa-trash"></i></button>
                                        @endcan
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
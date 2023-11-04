@php
$html_tag_data = [];
$title = 'Lista de Testimonio';
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
        new DataTable('#tabla-testimonio');
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h1>{{$title}}</h1>

                        @can('admin.testimonios.create')
                        <a href="{{ route('testimonios.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                            {{ 'Crear' }}
                        </a>
                        @endcan
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabla-testimonio">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Testimonio</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonios as $testimonio)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><img src="/image/testimonio/{{$testimonio->image}}" style=" width: 70px; height:50px"></td>
                                    <td>{{ $testimonio->name }}</td>
                                    <td>{{ $testimonio->testimonio }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('testimonios.destroy',$testimonio->id) }}" method="POST">
                                            @can('admin.testimonios.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('testimonios.edit',$testimonio->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('admin.testimonios.delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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
</div>
@endsection
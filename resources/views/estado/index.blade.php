@php
$html_tag_data = [];
$title = 'Lista de estado';
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
        new DataTable('#tabla-estado');
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">

                    <h2>{{ $title }}</h2>

                    @can('admin.estados.create')
                    <a href="{{ route('estados.create') }}" class="btn btn-primary btn-sm">
                        Crear
                    </a>
                    @endcan

                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabla-estado">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Pais perteneciente</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estados as $estado)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $estado->name }}</td>
                                    <td>{{ $estado->paise->name }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('estados.destroy',$estado->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('estados.show',$estado->id) }}"><i class="fa fa-fw fa-eye"></i></a>--}}
                                            @can('admin.estados.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('estados.edit',$estado->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('admin.estados.delete')
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
@php
$html_tag_data = [];
$title = 'Lista de ciudades';
$description= 'Lista de ciudades'
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
        new DataTable('#tabla-ciudades');
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
                    @can('admin.ciudades.create')
                    <a href="{{route('city.create')}}" class="btn btn-primary btn-sm float-right" data-placement="left">
                        {{"Crear" }}
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
                        <table class="table table-striped table-hover" id="tabla-ciudades">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Estado perteneciente</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ciudades as $city)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>
                                        @if ($city->estados != null)
                                        {{ $city->estados->name }}
                                        @endif
                                    </td>

                                    <td class="text-end">
                                        <form action="{{ route('city.delete',$city->id) }}" method="GET">
                                            @can('admin.ciudades.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('city.edit',$city->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            @csrf
                                            @can('admin.ciudades.delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
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
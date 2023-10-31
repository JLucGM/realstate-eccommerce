@php
$html_tag_data = [];
$title = 'Lista de contactos';
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
        new DataTable('#tabla-contacto');
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
                    <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm">{{ "Crear"}}</a>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabla-contacto">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Origen</th>
                                    <th>Status</th>
                                    <th class="text-end">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactos as $contacto)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $contacto->email }}</td>
                                    <td>{{ $contacto->name.' '. $contacto->apellido }}</td>
                                    <td>{{ $contacto->telefonoContacto1 }} </br> {{ $contacto->telefonoContacto2 }}</td>
                                    <td>{{ $contacto->origen }}</td>
                                    <td>{{ $contacto->status }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('contactos.destroy',$contacto->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary" href="{{ route('contactos.show',$contacto->id) }}"><i data-acorn-icon="eye" class="icon" data-acorn-size="10"></i></a>
                                            <a class="btn btn-sm btn-success" href="{{ route('contactos.edit',$contacto->id) }}"><i data-acorn-icon="edit" class="icon" data-acorn-size="10"></i></a>
                                            <a class="btn btn-sm btn-warning" href="{{ route('contactos-propiedad.index',$contacto->id) }}"><i data-acorn-icon="home-garage" class="icon" data-acorn-size="10"></i></a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i data-acorn-icon="bin" class="icon" data-acorn-size="10"></i></button>
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
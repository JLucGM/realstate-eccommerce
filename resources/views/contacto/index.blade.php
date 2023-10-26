@php
$html_tag_data = [];
$title = 'Lista de productos';
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
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">

                    <span id="card_title">
                        <h2>Lista de Contactos</h2>
                    </span>

                    <div class="">
                        <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm">
                            {{ "Agregar Nuevo"}}
                        </a>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Origen</th>
                                    <th>Status</th>
                                    <th>Acciones</th>

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
            {!! $contactos->links() !!}
        </div>
    </div>
</div>
@endsection
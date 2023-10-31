@php
$html_tag_data = [];
$title = 'Seguimiento de contacto por propiedad';
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
        new DataTable('#tabla-contacto-propiedad');
    });
</script>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card_title">{{ $title }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contactos-propiedads.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('contactos-propiedad.form')

                    </form>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabla-contacto-propiedad">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Contacto</th>
                                    <th>Tipo de relación</th>
                                    <th>Propiedad de interes</th>
                                    <th>Observaciones</th>
                                    <th class="text-end">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactosPropiedads as $contactosPropiedad)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $contactosPropiedad->contacto->name.' '.$contactosPropiedad->contacto->apellido }}</td>
                                    <td>{{ $contactosPropiedad->tipoRelacion }}</td>
                                    <td>{{ $contactosPropiedad->product->name }}</td>
                                    <td>{{ $contactosPropiedad->observaciones }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('contactos-propiedads.destroy',$contactosPropiedad->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('contactos-propiedads.show',$contactosPropiedad->id) }}"><i data-acorn-icon="eye" class="icon" data-acorn-size="10"></i></a>--}}
                                            <a class="btn btn-sm btn-success" href="{{ route('contactos-propiedads.edit',$contactosPropiedad->id) }}"><i data-acorn-icon="edit" class="icon" data-acorn-size="10"></i></a>
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
        {!! $contactosPropiedads->links() !!}
    </div>
</div>
@endsection
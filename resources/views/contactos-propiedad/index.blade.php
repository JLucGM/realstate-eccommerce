@php
$html_tag_data = [];
$title = 'Contacto por propiedad';
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
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Contacto</th>
                                    <th>Tipo de relación</th>
                                    <th>Propiedad de interes</th>
                                    <th>Observaciones</th>

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

                                    <td>
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
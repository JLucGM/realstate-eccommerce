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
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Contacto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('contactos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $contacto->name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $contacto->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $contacto->email }}
                        </div>
                        <div class="form-group">
                            <strong>Telefonocontacto1:</strong>
                            {{ $contacto->telefonoContacto1 }}
                        </div>
                        <div class="form-group">
                            <strong>Telefonocontacto2:</strong>
                            {{ $contacto->telefonoContacto2 }}
                        </div>
                        <div class="form-group">
                            <strong>Origen:</strong>
                            {{ $contacto->origen }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $contacto->status }}
                        </div>
                        <div class="form-group">
                            <strong>Pais:</strong>
                            {{ $contacto->pais }}
                        </div>
                        <div class="form-group">
                            <strong>Region:</strong>
                            {{ $contacto->region }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad:</strong>
                            {{ $contacto->ciudad }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $contacto->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $contacto->observaciones }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

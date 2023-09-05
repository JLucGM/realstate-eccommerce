@php
$html_tag_data = [];
$title = 'Información del contacto';
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
                    <h2 id="card_title">{{$title}}</h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Nombre de contacto:</strong>
                                {{ $contacto->name.' '. $contacto->apellido}}
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $contacto->email }}
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Teléfono de contacto 1:</strong>
                                {{ $contacto->telefonoContacto1 }}
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Teléfono de contacto 2:</strong>
                                {{ $contacto->telefonoContacto2 }}
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Origen:</strong>
                                {{ $contacto->origen }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Status:</strong>
                                {{ $contacto->status }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Pais:</strong>
                                {{ $contacto->pais }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Región:</strong>
                                {{ $contacto->region }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Ciudad:</strong>
                                {{ $contacto->ciudad }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Direccion:</strong>
                                {{ $contacto->direccion }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Observaciones:</strong>
                                {{ $contacto->observaciones }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
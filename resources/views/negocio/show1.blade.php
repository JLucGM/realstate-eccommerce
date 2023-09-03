@php
    $html_tag_data = [];
    $title = 'ver negocio';
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
                            <span class="card-title">Detalle del negocio</span>
                        </div>
                       
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $negocio->name }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $negocio->status }}
                        </div>
                        <div class="form-group">
                            <strong>Presupuestototal:</strong>
                            {{ $negocio->presupuestoTotal }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidaddormitorios:</strong>
                            {{ $negocio->cantidadDormitorios }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidadbaños:</strong>
                            {{ $negocio->cantidadBaños }}
                        </div>
                        <div class="form-group">
                            <strong>Contacto Id:</strong>
                            {{ $negocio->contacto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Propiedad Id:</strong>
                            {{ $negocio->propiedad_id }}
                        </div>
                        <div class="form-group">
                            <strong>Agente Id:</strong>
                            {{ $negocio->agente_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

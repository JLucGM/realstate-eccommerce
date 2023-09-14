@php
$html_tag_data = [];
$title = 'Detalles del estado';
$description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h2 class="card-title">{{$title}}</h2>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estado->name }}
                        </div>
                        <div class="form-group">
                            <strong>Pais Id:</strong>
                            {{ $estado->pais_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@php
$html_tag_data = [];
$title = 'Crear mensaje';
$description= 'Crea mensaje'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')

@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                          <span id="card_title">
                               <h2>
                                {{"Crear Mensaje de Soporte"}}
                                </h2> 
                            </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mensajes-soportes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('mensajes-soporte.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@php
    $html_tag_data = [];
    $title = 'Crear Paises';
    $description= 'Crear Paises'
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

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">
                            <h2>Crear Paises</h2>

                            </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('paises.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('paises.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

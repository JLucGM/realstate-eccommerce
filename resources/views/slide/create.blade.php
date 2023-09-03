@php
    $html_tag_data = [];
    $title = 'Crear slides';
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

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h1>
                        <span class="card-title">Crear Slide</span>

                        </h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('slides.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('slide.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

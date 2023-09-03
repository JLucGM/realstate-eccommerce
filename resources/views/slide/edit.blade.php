@php
    $html_tag_data = [];
    $title = 'Editar slides';
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
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h2>
                        <span class="card-title">Editar Slide</span>

                        </h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('slides.update', $slide->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('slide.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

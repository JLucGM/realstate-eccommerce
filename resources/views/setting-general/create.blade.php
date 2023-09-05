@php
    $html_tag_data = [];
    $title = 'Crear configuración';
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
                          <span id="card_title">
                               <h2>
                                {{$title}}
                                </h2> 
                            </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('setting-generals.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('setting-general.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

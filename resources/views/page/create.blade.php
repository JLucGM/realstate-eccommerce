@php
$html_tag_data = [];
$title = 'Crear página';
$description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">{{$title}}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pages.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('page.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

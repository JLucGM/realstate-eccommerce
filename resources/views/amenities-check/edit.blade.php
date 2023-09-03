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
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span id="card_title">
                               <h2>
                                {{"Editar Comodidad"}}
                                </h2> 
                            </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('amenities-checks.update', $amenitiesCheck->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('amenities-check.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

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

@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>crear post</h1>
            </div>
        </div>
    </div>
</section>
<div class="content px-3">
    @includeif('partials.errors')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'posts.store','autocomplete'=>'off','files'=>true]) !!}
            @include('posts.partials.form')

            <div class="box-footer mt20 offset-4 mt-3">
                <button class="btn_style" type="submit" class="form-submit">Guardar</button>

            </div>
        </div>
    </div>
</div>
@endsection

<script>
    //cambiar imagen


    function CambiarImagen(event) {
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById('picture').setAttribute('src', event.target.result);
        };

        reader.readAsDataURL(file);

    }
</script>
<style>
    .image-wrapper {
        position: relative;
        padding-bottom: 56.25%;

    }

    .image-wrapper img {
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>
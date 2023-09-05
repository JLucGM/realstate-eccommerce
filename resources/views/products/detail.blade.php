@php
$html_tag_data = [];
$title = 'Actualizar propiedad';
$description= 'Detalles de productos'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="/css/vendor/quill.bubble.css" />
<link rel="stylesheet" href="/css/vendor/select2.min.css" />
<link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
<link rel="stylesheet" href="/css/vendor/tagify.css" />
<link rel="stylesheet" href="/css/vendor/dropzone.min.css" />
@endsection

@section('js_vendor')
<script src="/js/vendor/imask.js"></script>
<script src="/js/vendor/quill.min.js"></script>
<script src="/js/vendor/quill.active.js"></script>
<script src="/js/vendor/select2.full.min.js"></script>
<script src="/js/vendor/tagify.min.js"></script>
<script src="/js/vendor/dropzone.min.js"></script>
@endsection

@section('js_page')
<script src="/js/cs/dropzone.templates.js"></script>
<script src="/js/pages/products.detail.js"></script>
@endsection

@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row g-0">
            <!-- Title Start -->
            <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                </div>
            </div>
            <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <div class="row">
        <div class="col-12">
            <h2 class="small-title">Información de la propiedad</h2>
            <!-- Product Info Start -->
            <div class="mb-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('product.update',['id'=>$product->id])}}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nombre de la propiedad</label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}" />
                            </div>
                            <div class="mb-3 w-100">
                                <label class="form-label">Categoria</label>
                                <select class="form-select" id="categoria" name="category">
                                    @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">M2 Totales</label>
                                <input class="form-control" type="text" name="metrosCuadradosT" value="{{$product->metrosCuadradosT}}" placeholder="M2 Totales" required>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Precio $</label>
                                <input type="text" name="price" class="form-control" value="{{$product->price}}" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea name="description" class="form-control">{{$product->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Detalles</label>
                                <textarea name="details" class="form-control">{{$product->details}}</textarea>
                            </div>

                            <!-- Price End -->
                            <button class="btn btn-primary" type="submit" class="form-submit">
                                Guardar cambios
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">

            <!-- Gallery Start -->
            <div class="mb-5">
                <h2 class="small-title">Galeria de la propiedad</h2>
                <div class="card">
                    <div class="card-body">
                        <form class="" action="{{route('pjson.images',['id' => $product->id])}}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                @foreach($images as $image)
                                <div class="col-md-3">
                                    <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $image) }}" class="w-100" alt="Imagen de la propiedad">
                                </div>
                                @endforeach
                            </div>

                            <input class="form-control" type="file" name="image[]" label="image" id="image" multiple>

                            <div class="text-center">
                                <p class="mt-3">{{$message}}</p>
                            </div>
                            <button type="submit" class="btn btn-primary" id="">
                                Guardar cambios
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Gallery End -->
    </div>
</div>

@endsection
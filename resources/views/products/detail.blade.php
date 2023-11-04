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
    <div class="row">
        <div class="col-8">
            <!-- Product Info Start -->
            <div class="mb-5">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('product.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                            <h2 class="small-title">Información de la propiedad</h2>
                            @method('PATCH')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nombre de la propiedad</label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tipo de propiedad</label>
                                <!-- <input class="form-control" type="text" list="t_propisedades" name="tipoPropiedad_id" placeholder="Tipo de propiedad"> -->
                                <select class="form-control" id="t_propiedades" name="t_propiedades">
                                    @foreach ($tipoPropiedad as $item)
                                    <option value="{{$item->id}}" {{ $item->id == $product->tipoPropiedad_id ? 'selected' : '' }}>{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Estado</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="{{$product->status}}">{{$product->status}}</option>
                                        <option value="En venta">En venta</option>
                                        <option value="En alquiler">En alquiler</option>
                                        <option value="En alquiler temporal">En alquiler temporal</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Estado actual</label>
                                    <select class="form-control" name="statusActual" id="statusActual">
                                        <option value="{{$product->statusActual}}">{{$product->statusActual}}</option>

                                        <option value="En venta">En venta</option>
                                        <option value="En alquiler">En alquiler</option>
                                        <option value="En alquiler temporal">En alquiler temporal</option>
                                        <option value="Vendido">Vendido</option>
                                        <option value="Alquilado">Alquilado</option>
                                        <option value="Alquilado temporalmente">Alquilado temporalmente</option>
                                        <option value="Reservado">Reservado</option>
                                    </select>
                                </div>
                            </div>

                            {{--<div class="mb-3">
                                <label class="form-label">Categoria</label>
                                <select class="form-select" id="categoria" name="category">
                                    @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}" {{ $categoria->id == $product->category ? 'selected' : '' }}>{{$categoria->name}}</option>
                            @endforeach
                            </select>
                    </div>--}}

                    <div class="row">

                        <div class="col-12 col-md-3">
                            <label class="form-label">Precio</label>
                            <input class="form-control" type="number" name="price" value="{{$product->price}}" placeholder="Precio" required>
                        </div>
                        <div class="col-12 col-md-3">
                            <label class="form-label">Publicar propiedad</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="publicar" value="1" id="flexSwitchCheckDefault" {{ $product->publicar ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckDefault">Si</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción del inmueble</label>
                            <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notas del cliente</label>
                            <textarea name="details" class="form-control">{{$product->details}}</textarea>
                        </div>

                    </div>


                    <h1 class="my-3 small-title">Detalles de la propiedad</h1>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label class="form-label">Dormitorios</label>
                            <input class="form-control" type="number" name="dormitorios" value="{{$product->dormitorios}}" placeholder="Dormitorios" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Ambientes</label>
                            <input class="form-control" type="number" name="ambientes" value="{{$product->ambientes}}" placeholder="Ambientes" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Baños</label>
                            <input class="form-control" type="number" name="toilet" value="{{$product->toilet}}" placeholder="Baños" required>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12 col-md-4">
                            <label class="form-label">M2 Totales</label>
                            <input class="form-control" type="text" name="metrosCuadradosT" value="{{$product->metrosCuadradosT}}" placeholder="M2 Totales" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">M2 Cubiertos</label>
                            <input class="form-control " type="number" name="metrosCuadradosC" value="{{$product->metrosCuadradosC}}" placeholder="M2 Cubiertos" required>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label class="form-label">¿Propiedad a estrenar?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estrenar" id="yes" value="1" {{ $product->estrenar == 1 ? 'checked' : '' }} required>
                                <label class="form-check-label" for="yes">
                                    Si
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estrenar" id="no" value="0" {{ $product->estrenar == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="no">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label">Expensas</label>
                            <input class="form-control" type="number" name="expensas" value="{{ $product->expensas}}" placeholder="Expensas" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Cocheras</label>
                            <input class="form-control" type="number" name="cocheras" value="{{ $product->cocheras}}" placeholder="Cocheras" required>
                        </div>

                        <h1 class="my-3 small-title">Ubicación de la propiedad</h1>

                        <div class="row mt-2">
                            <div class="col-12 col-md-4">
                                <label class="form-label">Pais</label>
                                <select class="form-control {{ ($errors->has('pais') ? ' is-invalid' : '') }}" name="pais" id="paisSelect">
                                    <option value="{{ $product->pais}}">@foreach($paises as $pais)
                                        @if($pais->id == $product->pais)
                                        {{$pais->name}}
                                        @break
                                        @endif
                                        @endforeach
                                    </option>
                                    @foreach($paises as $pais)
                                    <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Estado</label>
                                <select class="form-control {{ ($errors->has('region') ? ' is-invalid' : '') }}" id="estadoSelect" name="region">
                                    <option value="{{$product->region}}">
                                        @foreach($estado as $estad)
                                        @if($estad->id == $product->region)
                                        {{$estad->name}}
                                        @break
                                        @endif
                                        @endforeach
                                    </option>
                                    <!-- Aquí se cargarán las opciones de los estados en función del país seleccionado -->
                                </select>
                                {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label">Ciudad</label>
                                <select class="form-control {{ ($errors->has('ciudad') ? ' is-invalid' : '') }}" id="ciudadSelect" name="ciudad">
                                    <option value="{{$product->ciudad}}">
                                        @foreach($ciudades as $ciudad)
                                        @if($ciudad->id == $product->ciudad)
                                        {{$ciudad->name}}
                                        @break
                                        @endif
                                        @endforeach
                                    </option>
                                    <!-- Aquí se cargarán las opciones de las ciudades en función del estado seleccionado -->
                                </select>
                                {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Latitud</label>
                                <input class="form-control {{ ($errors->has('latitud') ? ' is-invalid' : '') }}" type="text" id="latitud" name="latitud" value="{{$product->latitud}}" placeholder="Latitud">
                                {!! $errors->first('latitud', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Longitud</label>
                                <input class="form-control {{ ($errors->has('longitud') ? ' is-invalid' : '') }}" type="text" id="longitud" name="longitud" value="{{$product->longitud}}" placeholder="Longitud">
                                {!! $errors->first('longitud', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                    </div>


                    <div class=" my-2">
                        <label class="form-label">Ingrese una dirección</label>
                        <div class="input-group">

                            <input class="form-control {{ ($errors->has('direccion') ? ' is-invalid' : '') }}" type="text" name="direccion" value="{{$product->direccion}}" placeholder="Ingresar direccion">
                        </div>
                        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                        <div id="emailHelp" class="form-text">Presione "Buscar" para ubicar su dirección en el mapa.</div>
                    </div>

                    <div class="form-group col-md-6">
                        {{ Form::label('agenteVendedor_id', 'Asignar agente inmobiliario', ['class' => 'form-label']) }}
                        <!-- ROLE VENDEDOR -->
                        {{ Form::select('agenteVendedor_id', $asignado, old('agenteVendedor_id'), ['class' => 'form-control' . ($errors->has('agenteVendedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Asignar agente']) }}
                        {!! $errors->first('agenteVendedor_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>


                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit" class="form-submit">
                            Guardar cambios
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4">

        <!-- Gallery Start -->
        <div class="mb-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="small-title">Galeria de la propiedad</h2>
                    <form class="" action="{{route('pjson.images',['id' => $product->id])}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="mb-2">

                            <label class="form-label">Portada</label>
                            <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $product->portada) }}" class="w-100 mb-2" alt="Imagen de la propiedad">
                            <input class="form-control" type="file" name="portada" label="image" id="image" multiple>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Galeria</label>
                            <div class="row">
                                @foreach($images as $image)
                                <div class="col-md-4">
                                    <img src="{{ asset('img/product/product_id_' . $product->id . '/' . $image->name) }}" class="w-100 mb-2" alt="Imagen de la propiedad">
                                </div>
                                {{$image->id}}
                                @endforeach
                            </div>
                            <input class="form-control" type="file" name="image[]" label="image" id="image" multiple>
                        </div>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // Select dependiente de municipio, hereda de estado
    $(function() {
        $('#paisSelect').on('change', onSelectProjectChange);
    });

    function onSelectProjectChange() {
        var project_id = $(this).val();
        console.log(project_id);
        if (!project_id)
            $('#estadoSelect').html(html_select);
        $.get('/pais/' + project_id + '/estado', function(data) {
            var html_select = '<option value="">Seleccione un estado</option>'
            for (var i = 0; i < data.length; ++i)
                html_select += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
            $('#estadoSelect').html(html_select);
            console.log(html_select);
            console.log($('#estadoSelect').html(html_select));
        });

    }

    $(function() {
        $('#estadoSelect').on('change', onSelectProjectChanges);
    });

    function onSelectProjectChanges() {
        var project_id2 = $(this).val();
        console.log(project_id2);
        if (!project_id2)
            $('#ciudadSelect').html(html_select2);
        $.get('/estado/' + project_id2 + '/ciudad', function(data) {
            var html_select2 = '<option value="">Seleccione una ciudad</option>'
            for (var a = 0; a < data.length; ++a)
                html_select2 += '<option value="' + data[a].id + '">' + data[a].name + '</option>';
            $('#ciudadSelect').html(html_select2);
            console.log(html_select2);
            console.log($('#ciudadSelect').html(html_select2));
        });

    }
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create(document.querySelector('#description'), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertMedia' ],
        mediaEmbed: {
            previewsInData: true
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

    ClassicEditor
    .create(document.querySelector('#details'), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertMedia' ],
        mediaEmbed: {
            previewsInData: true
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
</script>
@endsection
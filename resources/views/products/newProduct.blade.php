@php
$html_tag_data = [];
$title = 'Crear propiedad';
$description= $title
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
{{-- <script src="/js/cs/checkall.js"></script> --}}
{{-- <script src="/js/pages/customers.list.js"></script> --}}
@endsection

@section('content')

<!-- Title and Top Buttons Start -->
<!-- Customers List Start -->
<div class="container p-3 rounded" style="background-color: #1d1d1d;">
    <div class="card">
        <div class="card-header">
            <h1>{{$title}}</h1>
        </div>

        <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <h1 class="my-3 small-title">Información de la propiedad</h1>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label class="form-label">Nombre del producto</label>
                        <input class="form-control {{ ($errors->has('name') ? ' is-invalid' : '') }}" type="text" name="name" value="{{ old('name') }}" placeholder="Titulo de propiedad">
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Tipo de propiedad</label>
                        <select class="form-control" name="tipoPropiedad_id" id="t_propiedades">
                            @foreach ($tipoPropiedad as $item)
                            <option value="{{$item->id}}" {{ old('tipoPropiedad_id') == $item->id ? 'selected' : '' }}>{{ $item->nombre }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="En venta" {{ old('status') == 'En venta' ? 'selected' : '' }}>En venta</option>
                            <option value="En alquiler" {{ old('status') == 'En alquiler' ? 'selected' : '' }}>En alquiler</option>
                            <option value="En alquiler temporal" {{ old('status') == 'En alquiler temporal' ? 'selected' : '' }}>En alquiler temporal</option>
                        </select>

                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Status actual</label>
                        <select class="form-control" name="statusActual" id="statusActual">
                            <option value="En venta" {{ old('statusActual') == 'En venta' ? 'selected' : '' }}>En venta</option>
                            <option value="En alquiler" {{ old('statusActual') == 'En alquiler' ? 'selected' : '' }}>En alquiler</option>
                            <option value="En alquiler temporal" {{ old('statusActual') == 'En alquiler temporal' ? 'selected' : '' }}>En alquiler temporal</option>
                            <option value="Vendido" {{ old('statusActual') == 'Vendido' ? 'selected' : '' }}>Vendido</option>
                            <option value="Alquilado" {{ old('statusActual') == 'Alquilado' ? 'selected' : '' }}>Alquilado</option>
                            <option value="Alquilado temporalmente" {{ old('statusActual') == 'Alquilado temporalmente' ? 'selected' : '' }}>Alquilado temporalmente</option>
                            <option value="Reservado" {{ old('statusActual') == 'Reservado' ? 'selected' : '' }}>Reservado</option>
                        </select>

                    </div>
                </div>

                <div class="row">
                    <!-- SELECT OCULTO -->
                    <select class="form-control" name="moneda" hidden>
                        <option value="{{$SettingGeneral->moneda}}">{{$SettingGeneral->monedaSetting->denominacion}}</option>
                    </select>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Precio</label>
                        <input class="form-control {{ ($errors->has('price') ? ' is-invalid' : '') }}" type="number" name="price" value="{{ old('price') }}" placeholder="Precio">
                        {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    @if(auth()->user()->roles->contains('name', 'super Admin'))
                    <div class="form-group col-md-6">
                        {{ Form::label('agenteVendedor_id', 'Asignar agente inmobiliario', ['class' => 'form-label']) }}
                        <!-- ROLE VENDEDOR -->
                        {{ Form::select('agenteVendedor_id', $asignado, old('agenteVendedor_id'), ['class' => 'form-control' . ($errors->has('agenteVendedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Asignar agente']) }}
                        {!! $errors->first('agenteVendedor_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    @else()
                    <input type="text" value="{{auth()->user()->id}}" name="agenteVendedor_id" hidden>
                    @endif


                    <div class="col-12 col-md-3">
                        <label class="form-label">¿Destacado?</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="destacado" value="1" id="inputDestacado" {{ old('destacado') ? 'checked' : '' }}>
                            <label class="form-check-label" for="inputDestacado">Si</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="form-label">Publicar la propiedad</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="publicar" value="1" id="inputPublicar" {{ old('publicar') ? 'checked' : '' }}>
                            <label class="form-check-label" for="inputPublicar">Si</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Descripción del inmueble</label>
                        <textarea class="form-control {{ ($errors->has('description') ? ' is-invalid' : '') }}" id="description" type="text" name="description" placeholder="Descripción">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12">
                        <label class="form-label">Descripción breve</label>
                        <textarea class="form-control {{ ($errors->has('details') ? ' is-invalid' : '') }}" type="text" name="details" id="details" placeholder="Notas del cliente">{{ old('details') }}</textarea>
                        {!! $errors->first('details', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                </div>

                <h1 class="my-3 small-title">Detalles de la propiedad</h1>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <label class="form-label">Dormitorios</label>
                        <input class="form-control {{ ($errors->has('dormitorios') ? ' is-invalid' : '') }}" type="number" name="dormitorios" value="{{ old('dormitorios') }}" placeholder="Dormitorios">
                        {!! $errors->first('dormitorios', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">Ambientes</label>
                        <input class="form-control {{ ($errors->has('ambientes') ? ' is-invalid' : '') }}" type="number" name="ambientes" value="{{ old('ambientes') }}" placeholder="Ambientes">
                        {!! $errors->first('ambientes', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">Baños</label>
                        <input class="form-control {{ ($errors->has('toilet') ? ' is-invalid' : '') }}" type="number" name="toilet" value="{{ old('toilet') }}" placeholder="Baños">
                        {!! $errors->first('toilet', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <label class="form-label">M<sup>2</sup> totales</label>
                        <input class="form-control {{ ($errors->has('metrosCuadradosT') ? ' is-invalid' : '') }}" type="number" name="metrosCuadradosT" value="{{ old('metrosCuadradosT') }}" placeholder="M2 Totales">
                        {!! $errors->first('metrosCuadradosT', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">M<sup>2</sup> cubiertos</label>
                        <input class="form-control {{ ($errors->has('metrosCuadradosC') ? ' is-invalid' : '') }}" type="number" name="metrosCuadradosC" value="{{ old('metrosCuadradosC') }}" placeholder="M2 Cubiertos">
                        {!! $errors->first('metrosCuadradosC', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">Expensas (Condominio)</label>
                        <input class="form-control {{ ($errors->has('expensas') ? ' is-invalid' : '') }}" type="number" name="expensas" value="{{ old('expensas') }}" placeholder="Expensas">
                        {!! $errors->first('expensas', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">Cocheras</label>
                        <input class="form-control {{ ($errors->has('cocheras') ? ' is-invalid' : '') }}" type="number" name="cocheras" value="{{ old('cocheras') }}" placeholder="Cocheras">
                        {!! $errors->first('cocheras', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">¿Propiedad a estrenar?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estrenar" id="yes" value="1" {{ old('estrenar') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="yes">
                                Si
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estrenar" id="no" value="0" {{ old('estrenar') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="no">
                                No
                            </label>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    
                </div>

                
                <h1 class="my-3 small-title">Imagenes</h1>
                <div class="mb-3">
                    <label class="form-label" for="portada">Subir portada</label>
                    <input type="file" class="form-control {{ ($errors->has('portada') ? ' is-invalid' : '') }}" name="portada" label="portada" id="portada" multiple>
                    {!! $errors->first('portada', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="image">Subir imagenes de galeria</label>
                    <input type="file" class="form-control {{ ($errors->has('image') ? ' is-invalid' : '') }}" name="image[]" label="image" id="image" multiple>
                    {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <h1 class="my-3 small-title">Comodidades</h1>

                <div class="mb-3">
                    <div class="row">
                        @foreach ($amenitiesCheck as $am)
                        <div class="col-6">
                            <input type="checkbox" name="comodidades[]" class=" form-check-input" id="{{$am->id}}" value="{{$am->id}}" {{ old($am->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{$am->id}}">
                                {{$am->name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    {!! $errors->first('comodidades', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <h1 class="my-3 small-title">Ubicación de la propiedad</h1>

                <div class="row mt-2">
                    <div class="col-12 col-md-4">
                        <label class="form-label">Pais</label>
                        <select class="form-control {{ ($errors->has('pais') ? ' is-invalid' : '') }}" name="pais" id="paisSelect">
                            <option value="">Seleccione un pais</option>
                            @foreach($paises as $pais)
                            <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">Estado</label>
                        <select class="form-control {{ ($errors->has('region') ? ' is-invalid' : '') }}" id="estadoSelect" name="region">
                            <option value="">Seleccione un estado</option>
                            <!-- Aquí se cargarán las opciones de los estados en función del país seleccionado -->
                        </select>
                        {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">Ciudad</label>
                        <select class="form-control {{ ($errors->has('ciudad') ? ' is-invalid' : '') }}" id="ciudadSelect" name="ciudad">
                            <option value="">Seleccione una ciudad</option>
                            <!-- Aquí se cargarán las opciones de las ciudades en función del estado seleccionado -->
                        </select>
                        {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12 col-md-6">
                        <label class="form-label">Latitud</label>
                        <input class="form-control {{ ($errors->has('latitud') ? ' is-invalid' : '') }}" type="text" id="latitud" name="latitud" value="{{ old('latitud') }}" placeholder="Latitud">
                        {!! $errors->first('latitud', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Longitud</label>
                        <input class="form-control {{ ($errors->has('longitud') ? ' is-invalid' : '') }}" type="text" id="longitud" name="longitud" value="{{ old('longitud') }}" placeholder="Longitud">
                        {!! $errors->first('longitud', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>

                <div class="buscador my-2">
                    <label class="form-label">Ingrese una dirección</label>
                    <div class="input-group">

                        <input class="form-control {{ ($errors->has('direccion') ? ' is-invalid' : '') }}" type="text" name="direccion" id="direccion" value="{{ old('direccion') }}" placeholder="Ingresar direccion">
                        <button type="button" class="btn btn-outline-success" id="buscar">Buscar</button>
                    </div>
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                    <div id="emailHelp" class="form-text">Presione "Buscar" para ubicar su dirección en el mapa.</div>
                </div>

                <div id="map" class="col-12" style="height: 500px; width: 100%;"> </div>
            </div>
            <div class="card-footer">
                <div class="mt-2">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>

            </div>
        </form>
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
        $.get('pais/' + project_id + '/estado', function(data) {
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
        $.get('estado/' + project_id2 + '/ciudad', function(data) {
            var html_select2 = '<option value="">Seleccione una ciudad</option>'
            for (var a = 0; a < data.length; ++a)
                html_select2 += '<option value="' + data[a].id + '">' + data[a].name + '</option>';
            $('#ciudadSelect').html(html_select2);
            console.log(html_select2);
            console.log($('#ciudadSelect').html(html_select2));
        });

    }
</script>

<!-- MAPA -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2zAA0lz2WIp9qYBZd671LqbUaFok9LMc&callback=initMap" async defer></script>

<!-- Customers List End -->
<script>
    var map;
    let selectValor;
    var p;

    function initMap() {
        // const coords = { lat: 20.5866641, lng: -100.3863976 };  
        let lat = 20.5866641;
        let lng = -100.3863976;
        let coords = {
            lat: lat,
            lng: lng
        };

        map = new google.maps.Map(document.getElementById("map"), {
            center: coords,
            zoom: 15,
        });

        let infoWindow = new google.maps.InfoWindow({
            content: "Clic en el mapa para ubicar la propiedad.",
            position: coords,
        });
        infoWindow.open(map);
        map.addListener("click", (mapsMouseEvent) => {
            // marker.setMap(null);
            infoWindow.close();
            infoWindow = new google.maps.InfoWindow({
                position: mapsMouseEvent.latLng,
            });
            $("#latitud").val(mapsMouseEvent.latLng.lat());
            $("#longitud").val(mapsMouseEvent.latLng.lng());
            // $("#alt").val(15);
            // infoWindow.setContent(
            //     "Ubicar propiedad aquí."
            // );
            // infoWindow.open(map);

            // Marcador de google

            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: {
                    lat: mapsMouseEvent.latLng.lat(),
                    lng: mapsMouseEvent.latLng.lng()
                }
            });
        });


        function localizar(elemento, direccion) {


            var geocoder = new google.maps.Geocoder();

            var map = new google.maps.Map(document.getElementById(elemento), {
                zoom: 16,
                scrollwheel: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            geocoder.geocode({
                'address': direccion
            }, function(results, status) {
                if (status === 'OK') {
                    var resultados = results[0].geometry.location,
                        resultados_lat = resultados.lat(),
                        resultados_long = resultados.lng();

                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    var mensajeError = "";
                    if (status === "ZERO_RESULTS") {
                        mensajeError = "No hubo resultados para la dirección ingresada.";
                    } else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
                        mensajeError = "Error general del mapa.";
                    } else if (status === "INVALID_REQUEST") {
                        mensajeError = "Error de la web. Contacte con Name Agency.";
                    }
                    alert(mensajeError);
                }
            });



            infoWindow.open(map);
            map.addListener("click", (mapsMouseEvent) => {
                // console.log("entro");
                infoWindow.close();
                infoWindow = new google.maps.InfoWindow({
                    position: mapsMouseEvent.latLng,
                });
                $("#latitud").val(mapsMouseEvent.latLng.lat());
                $("#longitud").val(mapsMouseEvent.latLng.lng());
                // $("#alt").val(15);
                // infoWindow.setContent(
                //     "Ubicar propiedad aquí."
                // );
                // infoWindow.open(map);

                // Marcador de google

                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: {
                        lat: mapsMouseEvent.latLng.lat(),
                        lng: mapsMouseEvent.latLng.lng()
                    }
                });
            });

        }

        let buscar = document.getElementById('buscar');
        let direccion = document.getElementById('direccion');

        buscar.addEventListener('click', () => {
            // console.log(direccion.value);
            localizar("map", direccion.value);
        });
    }
    // FINAL MAPS
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>

    ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertMedia'],
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
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertMedia'],
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
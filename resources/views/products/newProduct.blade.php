@php
$html_tag_data = [];
$title = 'Registrar propiedad';
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
                        <input class="form-control" type="text" name="name" value="" placeholder="Titulo de propiedad" required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Tipo de propiedad</label>
                        <!-- <input class="form-control" type="text" list="t_propiedades" name="tipoPropiedad_id" placeholder="Tipo de propiedad"> -->
                        <select class="form-control" name="tipoPropiedad_id" id="t_propiedades">
                            <!-- <option label="Tipo de propiedad"></option> -->
                            @foreach ($tipoPropiedad as $item)
                            <option value="{{$item->id}}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label class="form-label">Estado</label>
                        <select class="form-control" name="status" id="status">
                            <option value="En venta">En venta</option>
                            <option value="En alquiler">En alquiler</option>
                            <option value="En alquiler temporal">En alquiler temporal</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Estado actual</label>
                        <select class="form-control" name="statusActual" id="statusActual">
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

                <div class="row">
                    <!-- <div class="col-12 col-md-3">
                        <label class="form-label">Moneda</label> -->
                        <!-- <input class="form-control" type="text" list="monedas" name="moneda" placeholder="Moneda"> -->
                        <select class="form-control" name="moneda"  hidden>
                            <option value="{{$SettingGeneral->moneda}}">{{$SettingGeneral->monedaSetting->denominacion}}</option>
                         </select>
                    <!--</div> -->


                    {{--<div class="col-12 col-md-3">
                        <label class="form-label">Categoria</label>
                        <!-- <input class="form-control" type="text" list="categoria" name="category" placeholder="categoria"> -->
                        <select class="form-control" name="category" id="categoria">
                            @foreach ($categorias as $ca)
                            <option value="{{$ca->id}}">{{ $ca->name }}</option>
                            @endforeach
                        </select>
                    </div>--}}

                    <div class="col-12 col-md-6">
                        <label class="form-label">Precio</label>
                        <input class="form-control" type="number" name="price" value="" placeholder="Precio" required>
                    </div>

                    @hasrole('super Admin')

                    <div class="form-group col-md-6">
                        {{ Form::label('agenteVendedor_id','Asignar agente inmobiliario',['class'=>'form-label'])  }}
                        <!-- ROLE VENDEDOR -->
                        {{ Form::select('agenteVendedor_id',$asignado, null,['class' => 'form-control' . ($errors->has('agenteVendedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Asignar agente']) }}
                        {!! $errors->first('agenteVendedor_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">¿Destacado?</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="destacado" value="1" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Si</label>
                        </div>
                    </div>
                    @endhasrole

                    <div class="col-12 col-md-3">
                        <label class="form-label">Publicar la propiedad</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="publicar" value="1" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Si</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Descripción del inmueble</label>
                        <textarea class="form-control" type="text" name="description" value="" placeholder="Descripción" required></textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Notas del cliente</label>
                        <textarea class="form-control" type="text" name="details" value="" placeholder="Notas del cliente" required></textarea>
                    </div>

                </div>

                <h1 class="my-3 small-title">Detalles de la propiedad</h1>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <label class="form-label">Dormitorios</label>
                        <input class="form-control" type="number" name="dormitorios" value="" placeholder="Dormitorios" required>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">Ambientes</label>
                        <input class="form-control" type="number" name="ambientes" value="" placeholder="Ambientes" required>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">Baños</label>
                        <input class="form-control" type="number" name="toilet" value="" placeholder="Baños" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <label class="form-label">M2 Totales</label>
                        <input class="form-control " type="number" name="metrosCuadradosT" value="" placeholder="M2 Totales" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">M2 Cubiertos</label>
                        <input class="form-control " type="number" name="metrosCuadradosC" value="" placeholder="M2 Cubiertos" required>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">¿Propiedad a estrenar?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estrenar" id="yes" value="1" required>
                            <label class="form-check-label" for="yes">
                                Si
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estrenar" id="no" value="0">
                            <label class="form-check-label" for="no">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <label class="form-label">Expensas</label>
                        <input class="form-control" type="number" name="expensas" value="" placeholder="Expensas" required>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">Cocheras</label>
                        <input class="form-control" type="number" name="cocheras" value="" placeholder="Cocheras" required>
                    </div>
                </div>

                <h1 class="my-3 small-title">Comodidades</h1>

                @foreach ($amenities as $am)

                <button class="s_amenities btn btn-outline-dark my-3" type="button">{{$am->name}}
                    <svg fill="#FFFFFF" class="btn_pregunta" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                        <path id="XMLID_225_" d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393  c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393  s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z" />
                    </svg>
                </button>

                <div class="form-check linea_grid border-1" id="lineaGrid">
                    @foreach ($amenitiesCheck as $amCh)
                    @if ($am->id == $amCh->amenities_id)
                    <input type="checkbox" class="checks form-check-input" id="{{$amCh->id}}" value="{{$amCh->name}}">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{$amCh->name}}
                    </label>

                    @endif
                    @endforeach
                    {{--<p>{{$am->name}}</p>

                    <select class="form-select" multiple aria-label="Default select example">
                        @foreach ($amenitiesCheck as $amCh)
                        @if ($am->id == $amCh->amenities_id)
                        <option id="{{$amCh->id}}" value="{{$amCh->name}}">{{$amCh->name}}</option>
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$amCh->name}}
                        </label>


                        @endif
                        @endforeach
                    </select>--}}
                </div>
                @endforeach

                <input class="form-control" style="position:absolute; filter:opacity(0); transform:translateX(-5000px);" type="text" name="comodidades" id="ghostJson">

                <h1 class="my-3 small-title">Imagenes</h1>
                <div class="mb-3">
                    <label class="form-label" for="portada">Subir portada</label>
                    <input type="file" class="form-control" name="portada" label="portada" id="portada" multiple>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="image">Subir imagenes de galeria</label>
                    <input type="file" class="form-control" name="image[]" label="image" id="image" multiple>
                </div>


                <div class="row mt-2">
                    <div class="col-12 col-md-6">
                        <label class="form-label">Videos</label>
                        <select class="form-control" name="videoTipo" id="sitioVideo">
                            <option value="YouTube">YouTube</option>
                            <option value="Vimeo">Vimeo</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Link del video</label>
                        <input class="form-control" type="text" name="linkVideo" value="" placeholder="Link del video">
                        <!-- <span> Añadir youtube o vimeo url, ej. https://www.youtube.com/watch?v=video_id</span> -->
                    </div>
                </div>

                <h1 class="my-3 small-title">Ubicación de la propiedad</h1>

                <div class="row mt-2">
                    <div class="col-12 col-md-4">
                        <label class="form-label">Pais</label>
                        <select class="form-control" name="pais" id="paisSelect">
                            <option value="">Seleccione un pais</option>
                            @foreach($paises as $pais)
                            <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">Estado</label>
                        <select class="form-control" id="estadoSelect" name="region">
                            <option value="">Seleccione un estado</option>
                            <!-- Aquí se cargarán las opciones de los estados en función del país seleccionado -->
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">Ciudad</label>
                        <select class="form-control" id="ciudadSelect" name="ciudad">
                            <option value="">Seleccione una ciudad</option>
                            <!-- Aquí se cargarán las opciones de las ciudades en función del estado seleccionado -->
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12 col-md-6">
                        <label class="form-label">Latitud</label>
                        <input class="form-control" type="text" id="latitud" name="latitud" value="" placeholder="Latitud" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Longitud</label>
                        <input class="form-control" type="text" id="longitud" name="longitud" value="" placeholder="Longitud" required>
                    </div>
                </div>

                <div class="buscador my-2">
                    <label class="form-label">Ingrese una dirección</label>
                    <input class="form-control" type="text" name="direccion" id="direccion" value="" placeholder="Ingresar direccion">
                    <div id="emailHelp" class="form-text">Presione "Buscar" para ubicar su dirección en el mapa.</div>
                    <button type="button" class="btn btn-success my-2" id="buscar">Buscar</button>
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

<script>
    // CHECKBOXES
    let lineaGrid = document.querySelectorAll('.linea_grid');
    let ghostJson = document.getElementById('ghostJson');
    let json;
    let element = [];
    let array = [];
    let id;

    for (let i = 0; i < lineaGrid.length; i++) {
        lineaGrid[i].addEventListener('click', (e) => {
            console.log(e);

            console.log("hola");
            if (e.target.checked == true) {
                element = e.target.value;
                console.log(element);
                id = e.target.id;
                tmp = {
                    'id': id,
                    'elemento': element
                };
                array.push(tmp);
            } else {
                for (let i = 0; i < array.length; i++) {
                    if (e.target.id == array[i].id) {
                        array.splice(i, 1);
                    }
                }
            }
            console.log(array);
            json = JSON.stringify(array);
            console.log(json);
            ghostJson.value = json;


        });

    }


    let s_amenities = document.querySelectorAll('.s_amenities');
    let btn_pregunta = document.querySelectorAll('.btn_pregunta');
    let texto = document.querySelectorAll('.linea_grid');

    for (let i = 0; i < s_amenities.length; i++) {

        s_amenities[i].addEventListener('click', (e) => {
            if (btn_pregunta[i].style.transform == "rotate(0deg)") {
                alldropclosed(e);
                setTimeout(() => {
                    texto[i].style.transitionDuration = "0.2s";
                }, 100);
            } else {
                dropBottom(i);
                setTimeout(() => {
                    texto[i].style.transitionDuration = "0s";
                }, 100);
            }
        });

        alldropclosed(i);
    }

    function alldropclosed(e) {
        for (let i = 0; i < s_amenities.length; i++) {
            btn_pregunta[i].style.transform = "rotate(-90deg)";
            texto[i].style.filter = "opacity(0)";
            texto[i].style.position = "absolute";
            texto[i].style.transform = "translateY(-200px)";
            texto[i].style.zIndex = "-1";
        }
    }

    function dropBottom(e) {
        for (let i = 0; i < s_amenities.length; i++) {
            texto[i].style.filter = "opacity(0)";
            texto[i].style.position = "absolute";
            texto[i].style.transform = "translateY(-200px)";
            texto[i].style.zIndex = "-1";
            btn_pregunta[i].style.transform = "rotate(-90deg)";

        };
        texto[e].style.filter = "opacity(1)";
        texto[e].style.position = "relative";
        texto[e].style.transform = "translateY(0px)";
        texto[e].style.zIndex = "0";
        btn_pregunta[e].style.transform = "rotate(0deg)";

    };
</script>
<script>
    document.getElementById("image").addEventListener('change', CambiarImagen);

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
    .btn_pregunta {
        width: 10px;
        margin-left: 10px;
        transform: rotate(-90deg);
        z-index: 1;
    }

    .linea_grid::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: transparent;
    }

    .linea_grid::-webkit-scrollbar {
        width: 6px;
        background-color: transparent;
    }

    .linea_grid::-webkit-scrollbar-thumb {
        background-color: #000000;
    }

    /* .check {
        margin-right: -90px;
        transform: translateY(5px);
    } */
</style>

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
                console.log("entro");
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
            console.log(direccion.value);
            localizar("map", direccion.value);
        });
    }
    // FINAL MAPS
</script>

@endsection
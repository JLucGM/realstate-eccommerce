@php
$html_tag_data = [];
$title = 'Agregar propiedad';
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
<h1>{{$title}}</h1>
<h1 class="success">{{$message}}</h1>
<div class="container p-2 rounded" style="background-color: #1d1d1d;">
    <div class="card">
        <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
            @csrf

            <h1 class="mb-1">Información de la propiedad</h1>
            <div class="mt-1">
                <div class="col-12 col-md-12">
                    <label>Ficha del cliente</label>
                    <textarea class="form-control" type="text" name="details" value="" placeholder="Ficha del cliente / Notas" required></textarea>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 col-md-6">
                    <label class="form-label">Nombre del producto</label>
                    <input class="form-control" type="text" name="name" value="" placeholder="Titulo de propiedad" required>
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label">Tipo de propiedad</label>
                    <input class="form-control" type="text" list="t_propiedades" name="tipoPropiedad_id" placeholder="Tipo de propiedad">
                    <datalist id="t_propiedades">
                        <option label="Tipo de propiedad"></option>
                        @foreach ($tipoPropiedad as $item)
                        <option value="{{$item->id}}">{{ $item->nombre }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>

            <div class="mt-2">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" type="text" name="description" value="" placeholder="Descripción" required></textarea>
            </div>

            <div class="row mt-2">
                <div class="col-12 col-md-6">
                    <label class="form-label">Estado</label>
                    <select class="form-control" name="status" id="estado">
                        <option value="En venta">En venta</option>
                        <option value="En alquiler">En alquiler</option>
                        <option value="En alquiler temporal">En alquiler temporal</option>
                    </select>
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label">Estado actual</label>
                    <select class="form-control" name="statusActual" id="estado">
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

            <div class="row mt-2">
                <div class="col-12 col-md-3">
                    <label class="form-label">Moneda</label>
                    <input class="form-control" type="text" list="monedas" name="moneda" placeholder="Moneda">
                    <datalist id="monedas">
                        <option label="Tipo de propiedad"></option>
                        @foreach ($monedas as $item)
                        <option value="{{$item->denominacion}} {{$item->tipo}}"></option>
                        @endforeach
                    </datalist>
                </div>

                <div class="col-12 col-md-3">
                    <label class="form-label">Categoria</label>
                    <input class="form-control" type="text" list="categoria" name="category" placeholder="categoria">
                    <datalist id="categoria">
                        <option label="Tipo de propiedad"></option>
                        @foreach ($categorias as $ca)
                        <option value="{{$ca->id}}">{{ $ca->name }}</option>
                        @endforeach
                    </datalist>
                </div>

                <div class="col-12 col-md-3">
                    <label class="form-label">Precio</label>
                    <input class="form-control" type="number" name="price" value="" placeholder="Precio" required>
                </div>

                <div class="col-12 col-md-3">
                    <label class="form-label">Publicar el precio</label>
                    <input class=" mt-2" type="checkbox" name="publicar" value="1">
                </div>
            </div>

            <h1 class="mb-1">Detalles de la propiedad</h1>

            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    <label class="form-label">Dormitorios</label>
                    <input class="form-control mt-2" type="number" name="dormitorios" value="" placeholder="Dormitorios" required>
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label">Ambientes</label>
                    <input class="form-control mt-2" type="number" name="ambientes" value="" placeholder="Ambientes" required>
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label">Baños</label>
                    <input class="form-control mt-2" type="number" name="toilet" value="" placeholder="Baños" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    <label class="form-label">M2 Totales</label>
                    <input class="form-control  mt-2" type="number" name="metrosCuadradosT" value="" placeholder="M2 Totales" required>
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label">M2 Cubiertos</label>
                    <input class="form-control  mt-2" type="number" name="metrosCuadradosC" value="" placeholder="M2 Cubiertos" required>
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label mt-2" style="display:flex; gap: 10%;">Propiedad a estrenar?</label>
                    <span style="transform: translateY(10px);"><input style="width: 20px;" class="" type="radio" name="estrenar" id="yes" value="1" required>Si</span>
                    <span style="transform: translateY(10px);"><input style="width: 20px;" class="" type="radio" name="estrenar" id="no" value="0">No</span>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    <label class="form-label">Expensas</label>
                    <input class="form-control" type="number" name="expensas" value="" placeholder="Expensas" required>
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label">Cocheras</label>
                    <input class="form-control" type="number" name="cocheras" value="" placeholder="Cocheras" required>
                </div>
            </div>

            <h1 class="my-3">Comodidades</h1>

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

            <!-- <div class="container">

            <label>Imagenes</label>
            <input type="file" name="image[]" label="image" id="image" multiple>
        </div> -->

        <div class="input-group mb-3">
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

            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    <label class="form-label">Pais</label>
                    <select class="form-control" name="pais" id="country">
                    </select>
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label">Region</label>
                    <select class="form-control" name="region" id="region">
                    </select>
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label">Ciudad</label>
                    <select class="form-control" name="ciudad" id="city">
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 col-md-6">
                    <label class="mt-1">Latitud</label>
                    <input class="form-control" type="text" id="latitud" name="latitud" value="" placeholder="Latitud" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="mt-1">Longitud</label>
                    <input class="form-control" type="text" id="longitud" name="longitud" value="" placeholder="Longitud" required>
                </div>
            </div>


            <div class="buscador my-2">
                <label>Ingrese una dirección</label>
                <input class="form-control mt-2" type="text" name="direccion" id="direccion" value="" placeholder="Ingresar direccion">
                <button type="button" class="btn btn-success my-2" id="buscar">Buscar</button>
            </div>

            <div id="map" class="col-12" style="height: 500px; width: 100%;"> </div>

            @hasrole('super Admin')

            <div class="form-group col-sm-6 mb-4 mt-3">
                {{ Form::label('agenteVendedor_id','Asignar agente',['class'=>'form-label mb-4'])  }}
                {{ Form::select('agenteVendedor_id',$asignado, null,['class' => 'form-control' . ($errors->has('agenteVendedor_id') ? ' is-invalid' : ''), 'placeholder' => 'asignar']) }}
                {!! $errors->first('agenteVendedor_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            @endhasrole


            <div class="box-footer mt20 offset-4">
                <button class="btn btn-primary btn-lg" type="submit">Guardar</button>

            </div>
        </form>
    </div>
</div>
<script>
    let yes = document.getElementById('yes');
    let no = document.getElementById('no');
    let antiguedad = document.getElementById('antiguedad');

    yes.addEventListener('click', (e) => {
        antiguedad.style.filter = "opacity(0)";
        antiguedad.style.position = "absolute";
        antiguedad.style.transform = "scale(0)";
        setTimeout(() => {
            antiguedad.style.transitionDuration = "0.5s";
        }, 100);
    });
    no.addEventListener('click', (e) => {
        antiguedad.style.filter = "opacity(1)";
        antiguedad.style.position = "relative";
        antiguedad.style.transform = "scale(1)";
        setTimeout(() => {
            antiguedad.style.transitionDuration = "0s";
        }, 100);
    });
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
    #antiguedad {
        filter: opacity(0);
        position: absolute;
        transform: scale(0);
        transition-duration: 0.5s;
    }
</style>
<style>
    .centrar {
        display: flex;
        justify-content: center;
        animation: girar 5s linear infinite;
        filter: opacity(0.1);
    }

    /* #logo_svg {
        position: absolute;
        width: 50%;
        text-align: center;
        z-index: 0;

    } */

    /* @keyframes girar{
                         0%,100%{
                             transform: rotateY(0deg):
                         }
                         50%{
                             transform: rotateY(360deg):
                         }
                        } */

    @keyframes girar {
        0% {
            transform: rotateY(0deg);
        }

        50% {
            transform: rotateY(90deg);

        }

        100% {
            transform: rotateY(0deg);

        }
    }

    .btn_pregunta {
        width: 10px;
        margin-left: 10px;
        transform: rotate(-90deg);
        z-index: 1;
    }

    /* .s_amenities {
        width: 280px;
        background: none;
        border: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.405);
        border-right: 1px solid rgba(255, 255, 255, 0.405);
        color: white;
        border-radius: 5%;
        height: 60px;
        z-index: 1;
    } */

    /* #amenities {
        display: flex;
        grid-auto-columns: 1fr;
        gap: 0%;
        height: auto;
        overflow: hidden;
    } */

    /* .linea_grid {
        /* display: grid;*/
    /* width: 100%; */
    /* display: grid; */
    /* grid-template-columns: repeat(auto-fill, 450px); */
    /* grid-template-columns: 1fr; */
    /* flex-direction: column; */
    /* justify-content: center;
        gap: 2%;
        transition-duration: 0.2s;
        height: auto;
        padding: 5% 0;
        overflow-y: scroll;
        overflow-x: hidden; 
    } */

    @media (max-width:992px) {
        /* .linea_grid {
            width: auto;
            position: absolute;
            background: #4e4e4e36;
            display: flex;
            flex-direction: column;
            padding: 0% 0;
            justify-content: end;
            align-items: left;
        } */

        /* .contenedor input{
                                width: 70% !important;
                                height: 22px;
                                margin-top: -2vh;
                            } */
        /* #amenities {
            display: flex;
            flex-direction: column;
            grid-auto-columns: 1fr;
            gap: 0%;
            height: auto;
            overflow: hidden;
        } */

        /* .s_amenities {
            width: 280px;
            background: none;
            border: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.405);
            border-right: 1px solid rgba(255, 255, 255, 0.405);
            color: white;
            border-radius: 5%;
            height: 35px;
            z-index: 1;
        } */
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

    .check {
        margin-right: -90px;
        transform: translateY(5px);
    }
</style>
<style>
    .flex {
        display: flex;
        gap: 2%;
        width: 100%;
    }

    /* .c_completo{
                        width: 100% !important;
                    } */
    /* .c_completo2 {
        width: 90% !important;
    } */

    /* .c_largo {
        width: 100% !important;
        height: 100px !important;
    } */

    /* .contenedor{
                        width: 80vw;
                        height: auto;
                        background: red; 
                    } */
    /* .contenedor .card {
        width: 100%;
        height: 100%;
        background: none;
        background: var(--background-theme); */
    /* padding: 2%;
        border-radius: 3%;
        margin-top: 2vh;
        place-content: center; */
    /* } */

    .contenedor .card form {
        display: flex;
        flex-direction: column;
        gap: 1%;
        margin-top: 1vh;

    }

    /* .contenedor input {
        width: 50%;
        height: 22px;
        margin-top: -2vh;
    } */

    /* h2 {
        font-size: 1.5vh;
    } */

    /* select {
        width: 50% !important;
        height: 22px !important;
        margin-top: -2vh !important;
    } */

    .btn_style {
        background: var(--primary);
        width: 50%;
        height: 100%;
        transition-duration: 0.5s;
        font-size: 20px;
    }

    .btn_style:hover {
        background: var(--dark);
        width: 50%;
        height: 100%;
    }

    /* @media (max-width:992px) {
        .contenedor {
            width: 90vw;
            height: auto;
            /* background: red; */
    /* }
    } */

    */
</style>

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


    $(document).ready(function() {
        //-------------------------------SELECT CASCADING-------------------------//
        var selectedCountry = (selectedRegion = selectedCity = "");

        // This is a demo API key that can only be used for a short period of time, and will be unavailable soon. You should rather request your API key (free)  from http://battuta.medunes.net/
        var BATTUTA_KEY = "df576e94f48f79e79c64010875385e0d";
        // Populate country select box from battuta API
        url =
            "https://battuta.medunes.net/api/country/all/?key=" +
            BATTUTA_KEY +
            "&callback=?";

        // EXTRACT JSON DATA.
        $.getJSON(url, function(data) {
            console.log(data);
            $.each(data, function(index, value) {
                // APPEND OR INSERT DATA TO SELECT ELEMENT.
                $("#country").append(
                    '<option value="' + value.code + '">' + value.name + "</option>"
                );
            });
        });
        // Country selected --> update region list .
        $("#country").change(function() {
            selectedCountry = this.options[this.selectedIndex].text;
            countryCode = $("#country").val();
            // Populate country select box from battuta API
            url =
                "https://battuta.medunes.net/api/region/" +
                countryCode +
                "/all/?key=" +
                BATTUTA_KEY +
                "&callback=?";
            $.getJSON(url, function(data) {
                $("#region option").remove();
                $.each(data, function(index, value) {
                    // APPEND OR INSERT DATA TO SELECT ELEMENT.
                    $("#region").append(
                        '<option value="' + value.region + '">' + value.region + "</option>"
                    );
                });
            });
        });
        // Region selected --> updated city list
        $("#region").on("change", function() {
            selectedRegion = this.options[this.selectedIndex].text;
            // Populate country select box from battuta API
            countryCode = $("#country").val();
            region = $("#region").val();
            // console.log(countryCode + " - " + region);
            url =
                "https://battuta.medunes.net/api/city/" +
                countryCode +
                "/search/?region=" +
                region +
                "&key=" +
                BATTUTA_KEY +
                "&callback=?";
            $.getJSON(url, function(data) {
                // console.log(data);
                $("#city option").remove();
                $.each(data, function(index, value) {
                    // APPEND OR INSERT DATA TO SELECT ELEMENT.
                    $("#city").append(
                        '<option value="' + value.city + '">' + value.city + "</option>"
                    );
                });
            });
        });
        // city selected --> update location string
        $("#city").on("change", function() {
            selectedCity = this.options[this.selectedIndex].text;
            $("#location").html(
                "Locatation: Country: " +
                selectedCountry +
                ", Region: " +
                selectedRegion +
                ", City: " +
                selectedCity
            );
        });
    });
</script>


@endsection
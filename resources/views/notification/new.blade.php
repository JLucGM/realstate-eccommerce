@php
    $html_tag_data = [];
    $title = 'Crear Notificacion';
    $description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@if(Auth()->check())

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/customers.list.js"></script>
@endsection
@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')
            <div class="card card-default">
                <div class="card-header">
                    <h1 class="card-title">Crear Notificacion</h1>
                </div>
                <div class="card-body">
                    {{-- content --}}

                    <div class="box box-info padding-1">
                        <div class="box-body row">
                            {{-- <div class="mb-5">
                                <button onclick="startFCM()"class="btn btn-danger btn-flat">
                                    Permitir Notificacion
                                </button>
                            </div> --}}
                            {{-- <div class="col-4"></div> --}}

                            <div class="col-sm-7">

                            <form method="POST" action="{{ route('send.web-notification') }}"  role="form" enctype="multipart/form-data">
                                <div class="form-group col-sm-6 mb-4">
                                @csrf
                                    {{Form::label('title', 'Titulo', ['class'=>'mb-4'])}}
                                    {{Form::text('title',null, ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group col-sm-6 mb-4">
                                    {{Form::label('body', 'Descripción', ['class'=>'mb-4'])}}
                                    {{Form::text('body',null, ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group col-sm-6 mb-4">
                                    {{Form::label('link', 'Enlace', ['class'=>'mb-4'])}}
                                    {{Form::text('link',null, ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group col-sm-6 mb-4">
                                    {{Form::label('date', 'Fecha de Lanzamiento', ['class'=>'mb-4'])}}
                                    {{-- {{ Form::datetimeLocal('date', null,['class' => 'form-control']) }} --}}
                                    <input type="datetime-local" class="form-control" name="date" id="date" my-date-format="Y-m-d H:i">
                                </div>
                            </div>
                                
                            <div class="col-sm-4">
                                <div class="form-group  mb-5 mt-2">
                                    <img src="/img/seo/default.png" id="picture" alt="10" srcset="" width="150" class=" mb-1 img-thumbnail">

                                    {{Form::label('icon', 'Subir Icon', ['class'=>'mb-4'])}}
                                    <input type="file" name="icon" class="" id="icon">
                                </div>

                                
                            </div>
                                                    <div class="box-footer mt20 offset-4">
                                
      <button class="btn btn-primary btn-lg text-white" type="submit" class="form-submit">Guardar</button>

    </div>
                            {{-- {!! Form::submit('Guardar', ['class' => 'btn_style mt-5 offset-2 form-submit']) !!} --}}
                        
                        </div>
                   


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <script>
    let inicio = document.getElementById('inicio');
    setTimeout(() => {
        inicio.click();
    }, 500);
</script> --}}

{{-- FCM --}}
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyB2OvMYM6PArnwEEvVoFr9WUQMp1NIL8TY",
        authDomain: "test-web-push-6bd0c.firebaseapp.com",
        // databaseURL: 'https://test-web-push-6bd0c-default-rtdb.firebaseio.com/',
        projectId: "test-web-push-6bd0c",
        storageBucket: "test-web-push-6bd0c.appspot.com",
        messagingSenderId: "873557969264",
        appId: "1:873557969264:web:6a789fefda70e88254a7b5",
        measurementId: "G-H3LS7VMM54"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function startFCM() {
        messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function (response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("store.token") }}',
                    type: 'POST',
                    data: {
                        token: response
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token stored.');
                    },
                    error: function (error) {
                        alert(error);
                    },
                });
            }).catch(function (error) {
                alert(error);
            });
    }
    
    messaging.onMessage(function (payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            link: payload.notification.link,
            // de aqui toma el icon la notificacion
            icon: payload.notification.icon,
        };
        new Notification(title, options);
        // console.log(title);
        console.log(payload);
    }); 
</script>--}}
{{-- script for image --}}
<script>
    
    
            document.getElementById("icon").addEventListener('change',CambiarImagen);
            function CambiarImagen(event) {
                var file= event.target.files[0];
                var reader = new FileReader();
                reader.onload = (event)=>{
                    document.getElementById('picture').setAttribute('src',event.target.result);
                };
                reader.readAsDataURL(file);
            }

           
</script>

@endsection


@else

{{-- <a id="inicio" href="{{route('inicio')}}">.</a> --}}
@endif
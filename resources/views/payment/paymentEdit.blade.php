@php
    $html_tag_data = [];
    $title = 'Lista de usuarios';
    $description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/customers.list.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <!-- Customers List Start -->
        <h1>Editar Usuario</h1>
        <h1 class="success">{{$message}}</h1>
        <div class="row">
            <div class="col-12 mb-0">
                <div id="checkboxTable">
                    <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('payment.update',['id'=>$pg->id]) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <h2>Metodo<br><br>
                            <input class="form-control" type="text" name="name" value="{{$pg->name}}" placeholder="Nombre">
                            </h2>
                            <h2>ClientAppKey (Cliente llave)<br><br>
                                <input class="form-control" type="text" name="ClientAppKey" value="{{$pg->ClientAppKey}}" placeholder="ClientAppKey">
                                </h2>
                            <h2>ClientAppCode (Codigo de cliente)<br><br>
                                <input class="form-control" type="text" name="ClientAppCode" value="{{$pg->ClientAppCode}}" placeholder="ClientAppCode">
                            </h2>
                             <h2>Accountid (Id de cuenta)<br><br>
                             <input class="form-control" type="text" name="Accountid" value="{{$pg->Accountid}}" placeholder="Accountid">
                             </h2>
                                                    
                            <button class="btn_style" type="submit" class="form-submit">Guardar</button>
                        </form>
                    </div>
                </div>
                <script>
                </script>
                <style>
                                        .contenedor{
                        width: 80vw;
                        height: 70vh;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                    .contenedor .card{
                        width: 60vw;
                        height: 80vh;
                        background: none;
                        background: #1e1e1e;                        
                        padding-top: 0;
                        padding-right: 0%;
                        padding-left: 10%;
                        border-radius: 3%;
                        margin-top: 12vh;
                        place-content: center;
                    }
                    .contenedor .card form{
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 1%;
                        margin-top: 3vh;
                        justify-content: center;
                        align-items: center;
                        text-align: left;
                    }
                    .contenedor input{
                        width: 50%;
                        height: 22px;
                        margin-top: -2vh;
                    }
                    h2{
                        font-size: 1.5vh;
                        text-align: left;
                        display: flex;
                        flex-direction: column;
                        /* align-items: center; */
                    }
                    .btn_style{
                        height: 100%;
                    }
                    .btn_style:hover{
                        height: 100%;
                    }
                </style>

                </div>
            </div>
        </div>
        <!-- Customers List End -->

    
    </div>
@endsection

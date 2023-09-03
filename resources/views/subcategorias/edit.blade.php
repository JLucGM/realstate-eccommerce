@php
    $html_tag_data = [];
    $title = 'Categorias';
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
        <h1>Editar categoria</h1>
        <h1 class="success">{{$message}}</h1>
        <div class="row">
            <div class="col-12 mb-0">
                <div id="checkboxTable">
                    <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('subcat.update',['id'=>$subcat->id]) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <h2>Nombre<br><br>
                            <input class="form-control" type="text" name="name" value="{{$subcat->name}}" placeholder="Nombre" Required>
                            </h2>
                             <h2>Activo<br><br>
                                <input type="checkbox" name="status" id="status">
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

<script>
    let status = document.getElementById('status');
    console.log(@json($subcat->status));
    let statusServer = @json($subcat->status);
    if(statusServer==1){
        status.checked=true;
    }

</script>

@endsection

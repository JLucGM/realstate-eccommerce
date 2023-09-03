@php
    $html_tag_data = [];
    $title = 'Editar cupon';
    $description= 'Editar Cupones'
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
                        <form action="{{ route('cupon.update',['id'=>$cupon->id]) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <h2>Nombre<br><br>
                            <input class="form-control" type="text" name="name" value="{{$cupon->name}}" placeholder="Nombre" Required>
                            </h2>
                            <h2>Codigo<br><br>
                                <input class="form-control" type="text" name="codigo" value="{{$cupon->codigo}}" placeholder="Codigo" Required>
                                </h2>
                            <h2>Max. Canjes<br><br>
                                <input class="form-control" type="text" name="max_change" value="{{$cupon->max_change}}" placeholder="Max. Canjes" Required>
                            </h2>
                             <h2>Dia incial<br><br>
                                <input class="form-control" type="date" name="start_day" value="{{$cupon->start_day}}" placeholder="Dia inicial" Required>
                            </h2> 
                            <h2>Dia final<br><br>
                                <input class="form-control" type="date" name="final_day" value="{{$cupon->final_day}}" placeholder="Dia final" Required>
                            </h2>
                            <h2>Numeros de canjes<br><br>
                                <input class="form-control" type="text" name="number_exchange" value="{{$cupon->number_exchange}}" placeholder="N. Canjes" Required>
                             </h2>
                             <h2>Monto<br><br>
                                <input class="form-control" type="number" name="amount" step="any" value="{{$cupon->amount}}" placeholder="Monto" Required>
                             </h2>
                             <h2>Tipo<br><br>
                                <select name="type" id="tipo" class="form-control" Required>
                                    <option value="porcentage">Porcentaje</option>
                                    <option value="total_amount">Monto total</option>
                                </select>
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
                        height: 50%;
                    }
                    .btn_style:hover{
                        height: 50%;
                    }
                </style>

                </div>
            </div>
        </div>
        <!-- Customers List End -->

    
    </div>
@endsection

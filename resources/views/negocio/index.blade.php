@php
$html_tag_data = [];
$title = 'Lista de negocios';
$description= 'Ecommerce Product List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<!-- <script src="/js/cs/checkall.js"></script>
<script src="/js/pages/products.list.js"></script> -->
@endsection
<style>
    .fs-7 {
        line-height: 1;
        font-size: 0.8em;
        padding: 8px;
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <span id="card_title">
                        <h2>{{$title}}</h2>
                    </span>
                    <div class="float-end">
                        <a href="{{ route('negocios.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                            {{ __('Agregar Nuevo') }}
                        </a>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Status</th>
                                    <th>Presupues tototal</th>
                                    {{--<th>Cantidad de dormitorios</th>
                                    <th>Cantidad de baños</th>--}}
                                    <th>Contacto</th>
                                    <th>Propiedad</th>
                                    <th>Agente</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($negocios as $negocio)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $negocio->name }}</td>
                                    <td>{{ $negocio->status }}</td>
                                    <td>{{ number_format($negocio->presupuestoTotal, 2, ',', '.').' '.$SettingGeneral->moneda }}</td>
                                    {{--<td>{{ $negocio->cantidadDormitorios }}</td>
                                    <td>{{ $negocio->cantidadBaños }}</td>--}}
                                    <td>{{ $negocio->contacto->name.' '.$negocio->contacto->apellido }}</td>
                                    <td>{{ $negocio->product->name }}</td>
                                    <td>{{ $negocio->user->name.' '.$negocio->user->last_name }}</td>

                                    <td>
                                        <form action="{{ route('negocios.destroy',$negocio->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('negocios.show',$negocio->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                            <a class="btn btn-sm btn-success" href="{{ route('negocios.edit',$negocio->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



                {{--<div class="row">
                    <div class="col-sm-2">
                        <div class="card text-dark bg-light" style="margin-right: -25px;">
                            <div class="card-body">
                                <h4 class="card-title text-center rounded fs-7 text-white col-12 bg-primary">NUEVOS</h4>
                            </div>


                            @foreach ($negocios as $n)

                            @if ($n->status == "Nuevos")






                            <div class="card-body cardBoard">


                                <div style="margin-top: 0px;">
                                    <span class="text-start text-white">N°.{{ $n->id }}</span>
                                    <a data-bs-toggle="collapse" href="#collapseExample{{ $n->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="text-end" data-acorn-icon="plus" style="color:cyan;float:right" data-acorn-size="14" class="icon  mb-3 " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                    </a>

                                </div>
                                <div class="collapse" id="collapseExample{{ $n->id }}">

                                    <div class="dropdown text-center">
                                        <i data-acorn-icon="edit" style="color:cyan" data-acorn-size="14" class="dropdown-toggle icon mb-3  " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                        <ul class="dropdown-menu">
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Contactado','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Contactado</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Presentacion inmueble','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Presentacion</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Pre-seleccion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Pre-seleccion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Negociacion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Negociacion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Cierre','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Cierre</span>
                                                </a>

                                            </li>





                                        </ul>

                                        <a href="{{route('negocios.show',['negocio'=>$n->id])}}"> <i data-acorn-icon="eye" style="color:cyan" data-acorn-size="14" class="icon  mb-3 "> </i></a>





                                    </div>
                                    <h6 class="card-title">#.{{$n->id." ".$n->name }}</h6>




                                </div>
                            </div>
                            @endif


                            @endforeach


                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card text-dark bg-light" style="margin-right: -25px;">
                            <div class="card-header">
                                <h4 class="card-title text-center rounded fs-7 text-white col-12 bg-primary">CONTACTADO</h4>
                            </div>

                            @foreach ($negocios as $n)

                            @if ($n->status == "Contactado")


                            <div class="card-body cardBoard">


                                <div style="margin-top: 0px;">
                                    <span class="text-start text-white">N°.{{ $n->id }}</span>
                                    <span class="text-start text-white">{{ $n->name }}</span>
                                    <a data-bs-toggle="collapse" href="#collapseExample{{ $n->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="text-end" data-acorn-icon="plus" style="color:cyan;float:right" data-acorn-size="14" class="icon  mb-3 " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                    </a>

                                </div>
                                <div class="collapse" id="collapseExample{{ $n->id }}">

                                    <div class="dropdown text-center">
                                        <i data-acorn-icon="edit" style="color:cyan" data-acorn-size="14" class="dropdown-toggle icon mb-3  " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                        <ul class="dropdown-menu">
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Contactado','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Contactado</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Presentacion inmueble','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Presentacion</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Pre-seleccion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Pre-seleccion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Negociacion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Negociacion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Cierre','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Cierre</span>
                                                </a>

                                            </li>





                                        </ul>

                                        <a href="{{route('negocios.show',['negocio'=>$n->id])}}"> <i data-acorn-icon="eye" style="color:cyan" data-acorn-size="14" class="icon  mb-3 "> </i></a>




                                    </div>
                                    <h6 class="card-title">#.{{$n->id." ".$n->name }}</h6>




                                </div>
                            </div>


                            @endif


                            @endforeach







                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="card text-dark bg-light" style="margin-right: -25px;">
                            <div class="card-body">
                                <h6 class="card-title text-center rounded fs-7 text-white col-12 bg-primary">PRESENTACION INMUEBLE</h6>
                            </div>

                            @foreach ($negocios as $n)

                            @if ($n->status == "Presentacion inmueble")




                            <div class="card-body cardBoard">


                                <div style="margin-top: 0px;">
                                    <span class="text-start text-white">N°.{{ $n->id }}</span>
                                    <a data-bs-toggle="collapse" href="#collapseExample{{ $n->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="text-end" data-acorn-icon="plus" style="color:cyan;float:right" data-acorn-size="14" class="icon  mb-3 " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                    </a>

                                </div>
                                <div class="collapse" id="collapseExample{{ $n->id }}">

                                    <div class="dropdown text-center">
                                        <i data-acorn-icon="edit" style="color:cyan" data-acorn-size="14" class="dropdown-toggle icon mb-3  " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                        <ul class="dropdown-menu">
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Contactado','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Contactado</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Presentacion inmueble','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Presentacion</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Pre-seleccion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Pre-seleccion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Negociacion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Negociacion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Cierre','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Cierre</span>
                                                </a>

                                            </li>





                                        </ul>

                                        <a href="{{route('negocios.show',['negocio'=>$n->id])}}"> <i data-acorn-icon="eye" style="color:cyan" data-acorn-size="14" class="icon  mb-3 "> </i></a>




                                    </div>
                                    <h6 class="card-title">#.{{$n->id." ".$n->name }}</h6>




                                </div>
                            </div>
                            @endif


                            @endforeach







                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card text-dark bg-light" style="margin-right: -25px;">
                            <div class="card-body">
                                <h4 class="card-title text-center rounded fs-7 text-white col-12 bg-primary">PRE-SELECCION</h4>
                            </div>

                            @foreach ($negocios as $n)

                            @if ($n->status == "Pre-seleccion")




                            <div class="card-body cardBoard">


                                <div style="margin-top: 0px;">
                                    <span class="text-start text-white">N°.{{ $n->id }}</span>
                                    <a data-bs-toggle="collapse" href="#collapseExample{{ $n->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="text-end" data-acorn-icon="plus" style="color:cyan;float:right" data-acorn-size="14" class="icon  mb-3 " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                    </a>

                                </div>
                                <div class="collapse" id="collapseExample{{ $n->id }}">

                                    <div class="dropdown text-center">
                                        <i data-acorn-icon="edit" style="color:cyan" data-acorn-size="14" class="dropdown-toggle icon mb-3  " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                        <ul class="dropdown-menu">
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Contactado','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Contactado</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Presentacion inmueble','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Presentacion</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Pre-seleccion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Pre-seleccion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Negociacion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Negociacion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Cierre','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Cierre</span>
                                                </a>

                                            </li>





                                        </ul>

                                        <a href="{{route('negocios.show',['negocio'=>$n->id])}}"> <i data-acorn-icon="eye" style="color:cyan" data-acorn-size="14" class="icon  mb-3 "> </i></a>




                                    </div>
                                    <h6 class="card-title">#.{{$n->id." ".$n->name }}</h6>




                                </div>
                            </div>
                            @endif


                            @endforeach







                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card text-dark bg-light" style="margin-right: -25px;">
                            <div class="card-body">
                                <h4 class="card-title text-center rounded fs-7 text-white col-12 bg-primary">NEGOCIACION</h4>
                            </div>

                            @foreach ($negocios as $n)

                            @if ($n->status == "Negociacion")


                            <div class="card-body cardBoard">


                                <div style="margin-top: 0px;">
                                    <span class="text-start text-white">N°.{{ $n->id }}</span>
                                    <a data-bs-toggle="collapse" href="#collapseExample{{ $n->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="text-end" data-acorn-icon="plus" style="color:cyan;float:right" data-acorn-size="14" class="icon  mb-3 " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                    </a>

                                </div>
                                <div class="collapse" id="collapseExample{{ $n->id }}">

                                    <div class="dropdown text-center">
                                        <i data-acorn-icon="edit" style="color:cyan" data-acorn-size="14" class="dropdown-toggle icon mb-3  " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                        <ul class="dropdown-menu">
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Contactado','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Contactado</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Presentacion inmueble','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Presentacion</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Pre-seleccion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Pre-seleccion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Negociacion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Negociacion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Cierre','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Cierre</span>
                                                </a>

                                            </li>





                                        </ul>

                                        <a href="{{route('negocios.show',['negocio'=>$n->id])}}"> <i data-acorn-icon="eye" style="color:cyan" data-acorn-size="14" class="icon  mb-3 "> </i></a>




                                    </div>
                                    <h6 class="card-title">#.{{$n->id." ".$n->name }}</h6>




                                </div>
                            </div>


                            @endif


                            @endforeach







                        </div>
                    </div>


                    <div class="col-sm-2">
                        <div class="card text-dark bg-light">
                            <div class="card-body">
                                <h4 class="card-title text-center rounded fs-7 text-white col-12 bg-primary">CIERRE</h4>
                            </div>

                            @foreach ($negocios as $n)

                            @if ($n->status == "Cierre")




                            <div class="card-body cardBoard">


                                <div style="margin-top: 0px;">
                                    <span class="text-start text-white">N°.{{ $n->id }}</span>
                                    <a data-bs-toggle="collapse" href="#collapseExample{{ $n->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="text-end" data-acorn-icon="plus" style="color:cyan;float:right" data-acorn-size="14" class="icon  mb-3 " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                    </a>

                                </div>
                                <div class="collapse" id="collapseExample{{ $n->id }}">

                                    <div class="dropdown text-center">
                                        <i data-acorn-icon="edit" style="color:cyan" data-acorn-size="14" class="dropdown-toggle icon mb-3  " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        </i>
                                        <ul class="dropdown-menu">
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Contactado','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Contactado</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Presentacion inmueble','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Presentacion</span>
                                                </a>

                                            </li>
                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Pre-seleccion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Pre-seleccion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Negociacion','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Negociacion</span>
                                                </a>

                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{route('negocioStatus.edit',['status'=>'Cierre','negocioId'=>$n->id])}}">
                                                    <span class="align-middle d-inline-block">Cierre</span>
                                                </a>

                                            </li>





                                        </ul>

                                        <a href="{{route('negocios.show',['negocio'=>$n->id])}}"> <i data-acorn-icon="eye" style="color:cyan" data-acorn-size="14" class="icon  mb-3 "> </i></a>




                                    </div>
                                    <h6 class="card-title">#.{{$n->id." ".$n->name }}</h6>




                                </div>
                            </div>
                            @endif


                            @endforeach





                        </div>
                    </div>
                </div>--}}
            </div>
            {!! $negocios->links() !!}
        </div>
    </div>
</div>
@endsection
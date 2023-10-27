@php
$html_tag_data = [];
$title = 'Ciudades';
$description= 'Lista de ciudades'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
{{--<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/products.list.js"></script>--}}
@endsection




@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <h2>
                                {{"Ciudadades"}}
                            </h2>
                        </span>

                        <div class="float-right">
                            <a href="{{route('city.create')}}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{"Agregar Nuevo" }}
                            </a>
                        </div>
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
                                    <th>Nombre</th>
                                    <th>Estado perteneciente</th>
                                    <!-- <th>Estatus</th> -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ciudades as $city)

                                <tr>
                                    <td>{{ $city->name }}</td>
                                    <td>
                                        @if ($city->estados != null)
                                        {{ $city->estados->name }}
                                        @endif
                                    </td>
                                    {{-- <td>{{ isset($mensajesSoporte->product->name) ? $mensajesSoporte->product->name: 'No definido' }}</td> --}}
                                    {{--@if ($city->status == 0)
                                    <td><span class="badge bg-danger px-3">Inactivo</span></td>
                                    @else
                                    <td><span class="badge bg-success px-3">Activo</span></td>
                                    @endif--}}

                                    <td class="text-end">
                                        <form action="{{ route('city.delete',$city->id) }}" method="GET">
                                            <a class="btn btn-sm btn-success" href="{{ route('city.edit',$city->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @csrf

                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
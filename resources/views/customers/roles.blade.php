@php
$html_tag_data = [];
$title = 'Lista de roles';
$description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#tabla-role');
    });
</script>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Controls Start -->
    <div class="row mb-2">
        <!-- Search Start -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 id="card_title">{{$title}}</h2>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabla-role">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                <tr>
                                    <td>{{ $rol->id}}</td>
                                    <td>{{ $rol->name}}</td>
                                    <td class="text-end">

                                        <form action="{{route('roles.delete',['id'=>$rol->id])}}" method="GET">
                                            {{-- <a class="btn btn-sm btn-success" href="{{ route('roles.edit',$rol->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a> --}}
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
            <!-- Search End -->
        </div>
        <!-- Controls End -->

        <!-- Customers List Start -->

    </div>

    @endsection
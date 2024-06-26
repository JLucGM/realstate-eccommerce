@php
$html_tag_data = [];
$title = 'Lista de usuarios';
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
        new DataTable('#tabla-user');
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">

                    <h1>{{$title}}</h1>

                    @can('admin.user.create')
                    <a href="{{route('new.user') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                        {{"Crear" }}
                    </a>
                    @endcan
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabla-user">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Rol</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Estatus</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name.' '.$user->last_name }}</td>
                                    <td>{{implode(", ", $user->getRoleNames()->toArray())}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->whatsapp }}</td>

                                    @if ($user->status == 0)
                                    <td><span class="badge bg-danger px-3">Inactivo</span></td>
                                    @else
                                    <td><span class="badge bg-success px-3">Activo</span></td>
                                    @endif


                                    <td class="text-end">
                                        <form action="{{ route('user.delete',$user->id) }}" method="GET">
                                            @csrf
                                            @can('admin.user.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('user.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            
                                            @can('admin.user.delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                            @endcan
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
@php
$html_tag_data = [];
$title = 'Verificación de comodidades';
$description= 'Verificación de comodidades'
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
        new DataTable('#tabla-amenities-check');
    });
</script>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">

                        <h2>{{ $title }}</h2>

                        @can('admin.amenities-checks.create')
                        <a href="{{ route('amenities-checks.create') }}" class="btn btn-primary btn-sm">
                            Crear
                        </a>
                        @endcan
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabla-amenities-check">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Comodidades generales</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($amenitiesChecks as $amenitiesCheck)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $amenitiesCheck->name }}</td>
                                    <td>{{ $amenitiesCheck->amenitiess->name }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('amenities-checks.destroy',$amenitiesCheck->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('amenities-checks.show',$amenitiesCheck->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>--}}
                                            @csrf
                                            @can('admin.amenities-checks.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('amenities-checks.edit',$amenitiesCheck->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @method('DELETE')
                                            @can('admin.amenities-checks.delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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
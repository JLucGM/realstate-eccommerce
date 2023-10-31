@php
$html_tag_data = [];
$title = 'Lista de paises';
$description= 'Ecommerce Product List Page'
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
        new DataTable('#tabla-paises');
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">

                    <h2>{{$title}}</h2>

                    <div class="">
                        <a href="{{ route('paises.create') }}" class="btn btn-primary btn-sm">
                            {{ "Crear"}}
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
                        <table class="table table-striped table-hover" id="tabla-paises">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paises as $pais)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $pais->name }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('paises.destroy',$pais->id) }}" method="POST">
                                            {{--<a class="btn btn-sm btn-primary " href="{{ route('paises.show',$pais->id) }}"><i data-acorn-icon="eye" class="icon" data-acorn-size="10"></i></a>--}}
                                            
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-success" href="{{ route('paises.edit',$pais->id) }}"><i data-acorn-icon="edit" class="icon" data-acorn-size="10"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i data-acorn-icon="bin" class="icon" data-acorn-size="10"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{--!! $paises->links() !!--}}
        </div>
    </div>
</div>
@endsection